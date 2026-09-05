#!/usr/bin/env php
<?php
/**
 * Build a WordPress.org-ready theme zip.
 *
 * Usage: php tools/zip.php
 *
 * The archive root is always hapag/, regardless of the local folder name.
 *
 * @package Hapag
 */

if ( PHP_SAPI !== 'cli' ) {
	fwrite( STDERR, "Run this script from the command line.\n" );
	exit( 1 );
}

$root = dirname( __DIR__ );
$slug = 'hapag';

$style = file_get_contents( $root . '/style.css' );
if ( ! is_string( $style ) || ! preg_match( '/^Version:\s*(.+)$/mi', $style, $match ) ) {
	fwrite( STDERR, "Could not read Version from style.css.\n" );
	exit( 1 );
}

$version = trim( $match[1] );
$dist    = $root . '/dist';
$target  = $dist . '/' . $slug . '-' . $version . '.zip';

$skip_roots = array(
	'.git',
	'.impeccable',
	'dist',
	'docs',
	'HTML',
	'HTML2',
	'node_modules',
	'tools',
	'vendor',
);

$skip_names = array(
	'.DS_Store',
	'Thumbs.db',
	'desktop.ini',
	'__MACOSX',
);

$skip_extensions = array(
	'log',
	'sh',
	'sql',
	'zip',
);

/**
 * Whether a path relative to the theme root should stay out of the zip.
 *
 * @param string $relative Path using forward slashes.
 */
function hapag_zip_skip( $relative, $skip_roots, $skip_names, $skip_extensions ) {
	$parts = explode( '/', $relative );
	if ( in_array( $parts[0], $skip_roots, true ) ) {
		return true;
	}

	foreach ( $parts as $part ) {
		if ( '' === $part ) {
			continue;
		}
		if ( isset( $part[0] ) && '.' === $part[0] ) {
			return true;
		}
		if ( in_array( $part, $skip_names, true ) ) {
			return true;
		}
	}

	$base = basename( $relative );
	if ( preg_match( '/^\d{4}-\d{2}-\d{2}_/', $base ) ) {
		return true;
	}

	$ext = strtolower( (string) pathinfo( $relative, PATHINFO_EXTENSION ) );
	return in_array( $ext, $skip_extensions, true );
}

$files = array();
$iterator = new RecursiveIteratorIterator(
	new RecursiveDirectoryIterator( $root, FilesystemIterator::SKIP_DOTS )
);

foreach ( $iterator as $file ) {
	if ( ! $file->isFile() ) {
		continue;
	}

	$relative = substr( $file->getPathname(), strlen( $root ) + 1 );
	$relative = str_replace( DIRECTORY_SEPARATOR, '/', $relative );

	if ( hapag_zip_skip( $relative, $skip_roots, $skip_names, $skip_extensions ) ) {
		continue;
	}

	$files[] = $relative;
}

sort( $files, SORT_STRING );

if ( ! $files ) {
	fwrite( STDERR, "No theme files found to package.\n" );
	exit( 1 );
}

if ( ! class_exists( 'ZipArchive' ) ) {
	fwrite( STDERR, "PHP ZipArchive is required. Enable the zip extension and try again.\n" );
	exit( 1 );
}

if ( ! is_dir( $dist ) && ! mkdir( $dist, 0755, true ) ) {
	fwrite( STDERR, "Could not create dist/.\n" );
	exit( 1 );
}

if ( file_exists( $target ) && ! unlink( $target ) ) {
	fwrite( STDERR, "Could not replace {$target}.\n" );
	exit( 1 );
}

$zip = new ZipArchive();
if ( true !== $zip->open( $target, ZipArchive::CREATE ) ) {
	fwrite( STDERR, "Could not create {$target}.\n" );
	exit( 1 );
}

foreach ( $files as $relative ) {
	$zip->addFile( $root . '/' . $relative, $slug . '/' . $relative );
}

$zip->close();

$latest = $dist . '/' . $slug . '.zip';
if ( file_exists( $latest ) && ! unlink( $latest ) ) {
	fwrite( STDERR, "Could not refresh hapag.zip.\n" );
	exit( 1 );
}
if ( ! copy( $target, $latest ) ) {
	fwrite( STDERR, "Could not write hapag.zip.\n" );
	exit( 1 );
}

$size = filesize( $target );
printf(
	"Packed %d files (%s) into:\n  %s\n  %s\n",
	count( $files ),
	$size ? number_format( $size / 1024, 1 ) . ' KB' : '0 KB',
	$target,
	$latest
);

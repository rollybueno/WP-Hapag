<?php
/**
 * Hapag theme bootstrap.
 *
 * @package Hapag
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HAPAG_VERSION', '0.1.0' );

/**
 * Sets up theme defaults and registers support for WordPress features.
 */
function hapag_setup() {
	load_theme_textdomain( 'hapag', get_template_directory() . '/languages' );
	add_editor_style( 'assets/css/theme.css' );
}
add_action( 'after_setup_theme', 'hapag_setup' );

/**
 * Registers the theme pattern category used by homepage compositions.
 */
function hapag_register_pattern_category() {
	register_block_pattern_category(
		'hapag',
		array(
			'label' => __( 'Hapag', 'hapag' ),
		)
	);
}
add_action( 'init', 'hapag_register_pattern_category', 9 );

/**
 * Drops a stale theme pattern file cache when new pattern files appear.
 *
 * WordPress 6.6+ caches pattern headers in a site transient. Adding files
 * during development will not register them until that cache is cleared.
 */
function hapag_maybe_flush_pattern_cache() {
	$theme = wp_get_theme();
	$files = glob( get_template_directory() . '/patterns/*.php' );
	$files = is_array( $files ) ? $files : array();
	$cached = $theme->get_block_patterns();
	$stamp  = get_option( 'hapag_pattern_cache_version' );

	if ( $stamp === HAPAG_VERSION && count( $cached ) >= count( $files ) ) {
		return;
	}

	$theme->delete_pattern_cache();
	update_option( 'hapag_pattern_cache_version', HAPAG_VERSION );
}
add_action( 'init', 'hapag_maybe_flush_pattern_cache', 0 );

/**
 * Enqueues the thin layout stylesheet for compositions theme.json cannot express.
 */
function hapag_enqueue_styles() {
	wp_enqueue_style(
		'hapag-theme',
		get_template_directory_uri() . '/assets/css/theme.css',
		array(),
		HAPAG_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'hapag_enqueue_styles' );

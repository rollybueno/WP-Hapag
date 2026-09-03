<?php
/**
 * Hapag theme bootstrap.
 *
 * @package Hapag
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HAPAG_VERSION', '0.1.25' );

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

/**
 * Adds an optional cook-time pill on query-grid card media.
 *
 * Set the `hapag_cook_time` post meta (for example "25 min") to show it.
 */
function hapag_render_card_media( $content, $block ) {
	$class = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
	if ( ! $content || false === strpos( $class, 'hapag-card-media' ) ) {
		return $content;
	}

	$time = get_post_meta( get_the_ID(), 'hapag_cook_time', true );
	if ( ! is_string( $time ) || '' === trim( $time ) ) {
		return $content;
	}

	$badge = sprintf(
		'<span class="hapag-card-time">%s</span>',
		esc_html( $time )
	);

	return preg_replace( '/<\/div>\s*$/', $badge . '</div>', $content, 1 );
}
add_filter( 'render_block_core/group', 'hapag_render_card_media', 10, 2 );

/**
 * Whether a parsed block has a given class name.
 *
 * @param array  $block Parsed block.
 * @param string $class Class to match.
 */
function hapag_block_has_class( $block, $class ) {
	$from_attrs = preg_split( '/\s+/', isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '' );
	if ( in_array( $class, is_array( $from_attrs ) ? $from_attrs : array(), true ) ) {
		return true;
	}

	$html = isset( $block['innerHTML'] ) ? $block['innerHTML'] : '';
	return (bool) preg_match( '/\b' . preg_quote( $class, '/' ) . '\b/', $html );
}

/**
 * Whether the current render is a page (front or editor canvas).
 */
function hapag_is_page_context() {
	if ( is_page() ) {
		return true;
	}

	$post_id = get_the_ID();
	return $post_id && 'page' === get_post_type( $post_id );
}

/**
 * Appends the featured-image caption under the page hero figure.
 */
function hapag_render_page_featured( $content, $block ) {
	$class = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
	if ( ! $content || false === strpos( $class, 'hapag-page-featured' ) ) {
		return $content;
	}

	if ( ! has_post_thumbnail() ) {
		return '';
	}

	$caption = wp_get_attachment_caption( (int) get_post_thumbnail_id() );
	if ( ! is_string( $caption ) || '' === trim( $caption ) || false !== strpos( $content, '</figcaption>' ) ) {
		return $content;
	}

	$figcaption = '<figcaption>' . esc_html( $caption ) . '</figcaption>';
	$updated    = preg_replace( '/<\/figure>\s*$/', $figcaption . '</figure>', $content, 1 );

	return is_string( $updated ) ? $updated : $content;
}
add_filter( 'render_block_core/post-featured-image', 'hapag_render_page_featured', 10, 2 );

/**
 * Splits the last word of a page title so the hero can accent it.
 */
function hapag_render_page_title( $content, $block ) {
	if ( ! hapag_is_page_context() || ! $content || false !== strpos( $content, '<em>' ) ) {
		return $content;
	}

	$text  = trim( wp_strip_all_tags( $content ) );
	$parts = preg_split( '/\s+/', $text );
	if ( ! is_array( $parts ) || count( $parts ) < 2 ) {
		return $content;
	}

	$last  = array_pop( $parts );
	$first = implode( ' ', $parts );
	$inner = esc_html( $first ) . '<br><em>' . esc_html( $last ) . '</em>';
	$updated = preg_replace( '/>\s*' . preg_quote( $text, '/' ) . '\s*</', '>' . $inner . '<', $content, 1 );

	return is_string( $updated ) ? $updated : $content;
}
add_filter( 'render_block_core/post-title', 'hapag_render_page_title', 10, 2 );

/**
 * Splits the last word of an archive title so the hero can accent it.
 */
function hapag_render_archive_title( $content ) {
	if ( ( ! is_archive() && ! is_home() ) || ! $content || false !== strpos( $content, '<em>' ) ) {
		return $content;
	}

	$text  = trim( wp_strip_all_tags( $content ) );
	$parts = preg_split( '/\s+/', $text );
	if ( ! is_array( $parts ) || '' === $text ) {
		return $content;
	}

	if ( count( $parts ) < 2 ) {
		$inner = '<em>' . esc_html( $text ) . '</em>';
	} else {
		$last  = array_pop( $parts );
		$first = implode( ' ', $parts );
		$inner = esc_html( $first ) . '<br><em>' . esc_html( $last ) . '</em>';
	}
	$updated = preg_replace( '/>\s*' . preg_quote( $text, '/' ) . '\s*</', '>' . $inner . '<', $content, 1 );

	return is_string( $updated ) ? $updated : $content;
}
add_filter( 'render_block_core/query-title', 'hapag_render_archive_title' );

/**
 * Keeps the recipe index on a six-card page, matching the archive prototype.
 */
function hapag_archive_posts_per_page( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( $query->is_home() || $query->is_category() || $query->is_tag() || $query->is_author() || $query->is_date() ) {
		$query->set( 'posts_per_page', 6 );
	}
}
add_action( 'pre_get_posts', 'hapag_archive_posts_per_page' );

/**
 * Turns the archive card arrow into a permalink.
 */
function hapag_render_card_arrow( $content, $block ) {
	if ( ! $content || ! hapag_block_has_class( $block, 'hapag-card-arrow' ) || false !== strpos( $content, '<a ' ) ) {
		return $content;
	}

	$url = get_permalink();
	if ( ! is_string( $url ) || '' === $url ) {
		return $content;
	}

	$updated = preg_replace(
		'/(<p\b[^>]*>)(.*?)(<\/p>)/s',
		'$1<a href="' . esc_url( $url ) . '">$2</a>$3',
		$content,
		1
	);

	return is_string( $updated ) ? $updated : $content;
}
add_filter( 'render_block_core/paragraph', 'hapag_render_card_arrow', 10, 2 );

/**
 * Uses the prototype comments wording on pages.
 */
function hapag_render_comments_title( $content ) {
	if ( ! hapag_is_page_context() || ! $content ) {
		return $content;
	}

	return strtr(
		$content,
		array(
			'responses' => 'comments',
			'response'  => 'comment',
			'Responses' => 'Comments',
			'Response'  => 'Comment',
		)
	);
}
add_filter( 'render_block_core/comments-title', 'hapag_render_comments_title' );

/**
 * Matches the page comment form copy to the prototype.
 *
 * @param array $defaults Comment form defaults.
 */
function hapag_comment_form_defaults( $defaults ) {
	if ( ! hapag_is_page_context() ) {
		return $defaults;
	}

	$defaults['title_reply']  = __( 'Leave a comment', 'hapag' );
	$defaults['label_submit'] = __( 'Post comment →', 'hapag' );

	return $defaults;
}
add_filter( 'comment_form_defaults', 'hapag_comment_form_defaults' );

/**
 * Drops the website field from page comments.
 *
 * @param array $fields Comment form fields.
 */
function hapag_comment_form_fields( $fields ) {
	if ( hapag_is_page_context() ) {
		unset( $fields['url'] );
	}

	return $fields;
}
add_filter( 'comment_form_default_fields', 'hapag_comment_form_fields' );

/**
 * Collects recipe groups from the current post so they can render full-bleed.
 *
 * @return array<int, array>
 */
function hapag_post_recipe_blocks() {
	$post_id = get_the_ID();
	if ( ! $post_id ) {
		return array();
	}

	$recipes = array();
	$walk    = static function ( $blocks ) use ( &$walk, &$recipes ) {
		foreach ( $blocks as $block ) {
			if ( hapag_block_has_class( $block, 'hapag-recipe' ) ) {
				$recipes[] = $block;
				continue;
			}

			if ( ! empty( $block['innerBlocks'] ) ) {
				$walk( $block['innerBlocks'] );
			}
		}
	};

	$walk( parse_blocks( (string) get_post_field( 'post_content', $post_id ) ) );

	return $recipes;
}

/**
 * Leaves the after-article slot empty when the post already has a Recipe block.
 * Posts without one still get the kit pattern so demo singles match the prototype.
 */
function hapag_render_recipe_slot( $content, $block ) {
	$class = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
	if ( ! $content || false === strpos( $class, 'hapag-recipe-slot' ) ) {
		return $content;
	}

	if ( hapag_post_recipe_blocks() ) {
		return '';
	}

	$fallback = do_blocks( '<!-- wp:pattern {"slug":"hapag/recipe"} /-->' );
	return $fallback ? $fallback : $content;
}
add_filter( 'render_block_core/group', 'hapag_render_recipe_slot', 10, 2 );

/**
 * Serializes post content with recipe groups removed.
 *
 * @param string $content Raw post content.
 */
function hapag_post_content_without_recipe( $content ) {
	$keep = array();
	foreach ( parse_blocks( (string) $content ) as $block ) {
		if ( hapag_block_has_class( $block, 'hapag-recipe' ) ) {
			continue;
		}
		$keep[] = $block;
	}

	return serialize_blocks( $keep );
}

/**
 * Collects level-2 headings from the current post for the contents rail.
 *
 * @return array<int, array{text:string,anchor:string}>
 */
function hapag_post_heading_links() {
	$post_id = get_the_ID();
	if ( ! $post_id ) {
		return array();
	}

	$post = get_post( $post_id );
	if ( ! $post ) {
		return array();
	}

	$links = array();
	$walk  = static function ( $blocks ) use ( &$walk, &$links ) {
		foreach ( $blocks as $block ) {
			if ( hapag_block_has_class( $block, 'hapag-recipe' ) ) {
				continue;
			}

			$level = (int) ( $block['attrs']['level'] ?? 2 );
			if ( ( $block['blockName'] ?? '' ) === 'core/heading' && ( $level === 2 || $level === 3 ) ) {
				$text = trim( wp_strip_all_tags( $block['innerHTML'] ) );
				if ( '' === $text ) {
					continue;
				}

				$anchor = isset( $block['attrs']['anchor'] ) && is_string( $block['attrs']['anchor'] ) && '' !== $block['attrs']['anchor']
					? $block['attrs']['anchor']
					: sanitize_title( $text );

				$links[] = array(
					'text'   => $text,
					'anchor' => $anchor,
				);
			}

			if ( ! empty( $block['innerBlocks'] ) ) {
				$walk( $block['innerBlocks'] );
			}
		}
	};

	$walk( parse_blocks( $post->post_content ) );

	if ( $links ) {
		return $links;
	}

	$without_recipe = hapag_post_content_without_recipe( $post->post_content );
	if ( preg_match_all( '/<h([23])\b[^>]*>(.*?)<\/h\1>/is', $without_recipe, $matches, PREG_SET_ORDER ) ) {
		foreach ( $matches as $match ) {
			$text = trim( wp_strip_all_tags( $match[2] ) );
			if ( '' === $text ) {
				continue;
			}

			$links[] = array(
				'text'   => $text,
				'anchor' => sanitize_title( $text ),
			);
		}
	}

	return $links;
}

/**
 * Estimated reading time for the current post.
 */
function hapag_reading_time_label() {
	$post_id = get_the_ID();
	if ( ! $post_id ) {
		return '';
	}

	$words = str_word_count( wp_strip_all_tags( (string) get_post_field( 'post_content', $post_id ) ) );
	$mins  = max( 1, (int) ceil( $words / 200 ) );

	return sprintf(
		/* translators: %d: estimated minutes to read. */
		_n( '%d min read', '%d min read', $mins, 'hapag' ),
		$mins
	);
}

/**
 * Fills the decorative read-time slot on the single hero byline.
 */
function hapag_render_read_time( $content, $block ) {
	$class = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
	if ( ! $content || false === strpos( $class, 'hapag-read-time' ) ) {
		return $content;
	}

	$label = hapag_reading_time_label();
	if ( '' === $label ) {
		return '';
	}

	return '<p class="hapag-read-time">' . esc_html( $label ) . '</p>';
}
add_filter( 'render_block_core/paragraph', 'hapag_render_read_time', 10, 2 );

/**
 * Points the single-post “Visit the journal” button at the posts archive.
 */
function hapag_render_journal_cta( $content, $block ) {
	$class = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
	if ( ! $content || false === strpos( $class, 'is-style-single-action' ) ) {
		return $content;
	}

	$url = get_post_type_archive_link( 'post' );
	if ( ! $url ) {
		return $content;
	}

	return preg_replace(
		'/(<a\b[^>]*class="[^"]*wp-block-button__link[^"]*"[^>]*href=")[^"]*(")/',
		'$1' . esc_url( $url ) . '$2',
		$content,
		1
	);
}
add_filter( 'render_block_core/group', 'hapag_render_journal_cta', 10, 2 );

/**
 * Adds an id to heading 2s so the contents rail can link to them.
 */
function hapag_heading_anchor( $content, $block ) {
	$level = (int) ( $block['attrs']['level'] ?? 2 );
	if ( ! $content || ( $level !== 2 && $level !== 3 ) ) {
		return $content;
	}

	if ( ! empty( $block['attrs']['anchor'] ) || false !== strpos( $content, ' id=' ) ) {
		return $content;
	}

	$text = trim( wp_strip_all_tags( $content ) );
	if ( '' === $text ) {
		return $content;
	}

	$tag = 'h' . $level;

	return preg_replace(
		'/<h' . $level . '\b/',
		'<' . $tag . ' id="' . esc_attr( sanitize_title( $text ) ) . '"',
		$content,
		1
	);
}
add_filter( 'render_block_core/heading', 'hapag_heading_anchor', 10, 2 );

/**
 * Adds ids to classic h2/h3 markup so the contents rail can link to them.
 */
function hapag_classic_heading_ids( $content ) {
	if ( ! $content || false === strpos( $content, '<h' ) ) {
		return $content;
	}

	return preg_replace_callback(
		'/<h([23])(\b[^>]*)>(.*?)<\/h\1>/is',
		static function ( $match ) {
			if ( preg_match( '/\sid=/i', $match[2] ) ) {
				return $match[0];
			}

			$text = trim( wp_strip_all_tags( $match[3] ) );
			if ( '' === $text ) {
				return $match[0];
			}

			return sprintf(
				'<h%1$s%2$s id="%3$s">%4$s</h%1$s>',
				$match[1],
				$match[2],
				esc_attr( sanitize_title( $text ) ),
				$match[3]
			);
		},
		$content
	);
}
add_filter( 'the_content', 'hapag_classic_heading_ids', 8 );

/**
 * Prints the current site name in the footer copyright, not the theme name.
 *
 * @param string $content Block HTML.
 * @param array  $block   Parsed block.
 */
function hapag_render_site_copyright( $content, $block ) {
	if ( ! $content || ! hapag_block_has_class( $block, 'hapag-site-copyright' ) ) {
		return $content;
	}

	$name = wp_strip_all_tags( get_bloginfo( 'name' ) );
	if ( '' === $name ) {
		return $content;
	}

	$label = sprintf(
		/* translators: 1: copyright year, 2: site name. */
		__( '© %1$s %2$s', 'hapag' ),
		gmdate( 'Y' ),
		$name
	);

	return '<p class="hapag-site-copyright">' . esc_html( $label ) . '</p>';
}
add_filter( 'render_block_core/paragraph', 'hapag_render_site_copyright', 10, 2 );

/**
 * Adds front-end ARIA that Gutenberg’s save markup cannot store.
 */
function hapag_front_end_aria( $content, $block ) {
	if ( ! $content || ! is_array( $block ) ) {
		return $content;
	}

	$processor = new WP_HTML_Tag_Processor( $content );

	if ( hapag_block_has_class( $block, 'hapag-recipe' ) ) {
		if ( $processor->next_tag() ) {
			$processor->set_attribute( 'aria-labelledby', 'recipe-title' );
			return $processor->get_updated_html();
		}
	}

	if ( hapag_block_has_class( $block, 'hapag-term-pills' ) ) {
		if ( $processor->next_tag() ) {
			$processor->set_attribute( 'aria-label', __( 'Recipe filters', 'hapag' ) );
			return $processor->get_updated_html();
		}
	}

	$hidden = array( 'hapag-sticker', 'hapag-cta-star', 'hapag-card-rating', 'hapag-footer-word', 'hapag-error-art' );
	foreach ( $hidden as $class ) {
		if ( ! hapag_block_has_class( $block, $class ) ) {
			continue;
		}

		if ( $processor->next_tag() ) {
			$processor->set_attribute( 'aria-hidden', 'true' );
			return $processor->get_updated_html();
		}
	}

	return $content;
}
add_filter( 'render_block', 'hapag_front_end_aria', 10, 2 );

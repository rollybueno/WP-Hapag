<?php
/**
 * Title: Display hero (manifesto)
 * Slug: hapag/display-hero-manifesto
 * Categories: hapag
 * Viewport width: 1400
 * Block Types: core/post-content
 * Description: Oversized manifesto hero. Display hero, manifesto style.
 */
?>
<!-- wp:group {"tagName":"header","metadata":{"name":"Display hero"},"className":"hapag-display-hero is-style-manifesto","align":"full","layout":{"type":"default"}} -->
<header class="wp-block-group alignfull hapag-display-hero is-style-manifesto">
	<!-- wp:paragraph {"className":"hapag-eyebrow","fontSize":"eyebrow"} -->
	<p class="hapag-eyebrow has-eyebrow-font-size"><?php esc_html_e( 'The Hapag manifesto', 'hapag' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":1} -->
	<h1 class="wp-block-heading"><?php echo wp_kses_post( __( 'Eat well.<br><em>Stay curious.</em>', 'hapag' ) ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"hapag-intro"} -->
	<p class="hapag-intro"><?php esc_html_e( 'Food is daily life, memory, culture, comfort, and sometimes the very best excuse to get everybody in the same room.', 'hapag' ); ?></p>
	<!-- /wp:paragraph -->
</header>
<!-- /wp:group -->

<?php
/**
 * Title: Display hero
 * Slug: hapag/display-hero
 * Categories: hapag
 * Viewport width: 1400
 * Description: Oversized eyebrow, title, intro, and actions. Home style by default.
 */
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Display hero"},"className":"hapag-display-hero is-style-home","align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hapag-display-hero is-style-home">
	<!-- wp:paragraph {"className":"hapag-eyebrow","fontSize":"eyebrow"} -->
	<p class="hapag-eyebrow has-eyebrow-font-size"><?php esc_html_e( 'Food for every kind of day', 'hapag' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":1} -->
	<h1 class="wp-block-heading"><?php echo wp_kses_post( __( 'Pass the<br><em>good stuff.</em>', 'hapag' ) ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"hapag-intro","fontSize":"lead"} -->
	<p class="hapag-intro has-lead-font-size"><?php esc_html_e( 'Recipes to cook, stories to savor, and ridiculously good food when you’d rather let someone else handle dinner.', 'hapag' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#recipes"><?php esc_html_e( 'Find a recipe →', 'hapag' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"hapag-text-link"} -->
		<div class="wp-block-button hapag-text-link"><a class="wp-block-button__link wp-element-button" href="https://example.com"><?php esc_html_e( 'Order for pickup ↗', 'hapag' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</section>
<!-- /wp:group -->

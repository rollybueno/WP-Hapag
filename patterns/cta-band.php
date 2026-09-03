<?php
/**
 * Title: CTA band
 * Slug: hapag/cta-band
 * Categories: hapag
 * Viewport width: 1400
 * Description: Full-width color band with heading and an action. Form style by default.
 */
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"CTA band"},"className":"hapag-cta-band is-style-form","align":"full","backgroundColor":"yellow","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hapag-cta-band is-style-form has-yellow-background-color has-background">
	<!-- wp:paragraph {"className":"hapag-cta-star"} -->
	<p class="hapag-cta-star">✦</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"hapag-eyebrow","fontSize":"eyebrow"} -->
		<p class="hapag-eyebrow has-eyebrow-font-size"><?php esc_html_e( 'A little treat for your inbox', 'hapag' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'Stay for seconds.', 'hapag' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"hapag-intro"} -->
		<p class="hapag-intro"><?php esc_html_e( 'New recipes, good reads, and the occasional excellent lunch idea. No spam—unless it’s the crispy kind.', 'hapag' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php esc_html_e( 'Join the list →', 'hapag' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</section>
<!-- /wp:group -->

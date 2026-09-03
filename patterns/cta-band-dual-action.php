<?php
/**
 * Title: CTA band (dual action)
 * Slug: hapag/cta-band-dual-action
 * Categories: hapag
 * Viewport width: 1400
 * Block Types: core/post-content
 * Description: Two-button closer. CTA band, dual-action style.
 */
$hapag_recipes = get_post_type_archive_link( 'post' );
$hapag_recipes = $hapag_recipes ? $hapag_recipes : home_url( '/' );
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"CTA band"},"className":"hapag-cta-band is-style-dual-action","align":"full","backgroundColor":"green","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hapag-cta-band is-style-dual-action has-green-background-color has-background">
	<!-- wp:paragraph {"className":"hapag-eyebrow","fontSize":"eyebrow"} -->
	<p class="hapag-eyebrow has-eyebrow-font-size"><?php esc_html_e( 'Hungry yet?', 'hapag' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php echo wp_kses_post( __( 'Meet us<br>at the table.', 'hapag' ) ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"hapag-button-yellow"} -->
		<div class="wp-block-button hapag-button-yellow"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $hapag_recipes ); ?>"><?php esc_html_e( 'Start cooking →', 'hapag' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"hapag-button-outline is-style-outline"} -->
		<div class="wp-block-button hapag-button-outline is-style-outline"><a class="wp-block-button__link wp-element-button" href="https://example.com"><?php esc_html_e( 'Order online ↗', 'hapag' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</section>
<!-- /wp:group -->

<?php
/**
 * Title: Split media
 * Slug: hapag/split-media
 * Categories: hapag
 * Viewport width: 1400
 * Description: Copy beside a cover image. Overlay style by default.
 */
$hapag_uri       = get_template_directory_uri();
$hapag_cover_alt = esc_attr__( 'Fresh tacos ready for dinner', 'hapag' );
$hapag_cover_src = esc_url( $hapag_uri . '/assets/images/mexican-tacos.jpg' );
?>
<!-- wp:group {"tagName":"section","anchor":"about","metadata":{"name":"Split media"},"className":"hapag-split-media is-style-overlay","align":"full","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hapag-split-media is-style-overlay" id="about">
	<!-- wp:group {"className":"hapag-split-copy","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group hapag-split-copy">
		<!-- wp:paragraph {"className":"hapag-eyebrow","fontSize":"eyebrow"} -->
		<p class="hapag-eyebrow has-eyebrow-font-size"><?php esc_html_e( 'No time to cook?', 'hapag' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php echo wp_kses_post( __( 'We’ve got<br><em>dinner.</em>', 'hapag' ) ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Skip the prep, keep the pleasure. Order today’s favorites from our kitchen and collect them when you’re ready.', 'hapag' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"hapag-button-yellow"} -->
			<div class="wp-block-button hapag-button-yellow"><a class="wp-block-button__link wp-element-button" href="https://example.com"><?php esc_html_e( 'Order on our partner site ↗', 'hapag' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:cover {"url":"<?php echo $hapag_cover_src; ?>","alt":"<?php echo $hapag_cover_alt; ?>","dimRatio":20,"minHeight":650,"minHeightUnit":"px","className":"hapag-split-media-frame","layout":{"type":"constrained"}} -->
	<div class="wp-block-cover hapag-split-media-frame" style="min-height:650px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo $hapag_cover_alt; ?>" src="<?php echo $hapag_cover_src; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
		<!-- wp:paragraph {"className":"hapag-media-label"} -->
		<p class="hapag-media-label"><?php echo wp_kses_post( __( 'Tonight’s<br>good idea', 'hapag' ) ); ?></p>
		<!-- /wp:paragraph -->
	</div></div>
	<!-- /wp:cover -->
</section>
<!-- /wp:group -->

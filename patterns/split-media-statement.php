<?php
/**
 * Title: Split media (statement)
 * Slug: hapag/split-media-statement
 * Categories: hapag
 * Viewport width: 1400
 * Block Types: core/post-content
 * Description: Image beside a numbered statement. Split media, statement style.
 */
$hapag_uri       = get_template_directory_uri();
$hapag_cover_alt = esc_attr__( 'Waffles and berries on a breakfast table', 'hapag' );
$hapag_cover_src = esc_url( $hapag_uri . '/assets/images/waffles-breakfast.jpg' );
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Split media"},"className":"hapag-split-media is-style-statement","align":"full","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hapag-split-media is-style-statement">
	<!-- wp:cover {"url":"<?php echo $hapag_cover_src; ?>","alt":"<?php echo $hapag_cover_alt; ?>","dimRatio":0,"className":"hapag-split-media-frame","layout":{"type":"constrained"}} -->
	<div class="wp-block-cover hapag-split-media-frame"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo $hapag_cover_alt; ?>" src="<?php echo $hapag_cover_src; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph -->
	</div></div>
	<!-- /wp:cover -->

	<!-- wp:group {"className":"hapag-split-copy","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group hapag-split-copy">
		<!-- wp:paragraph {"className":"hapag-cta-number"} -->
		<p class="hapag-cta-number">02</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'There is always room for seconds.', 'hapag' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"hapag-intro"} -->
		<p class="hapag-intro"><?php esc_html_e( 'We cook generously because abundance is a kind of welcome. Pull up another chair. Tear off another piece of bread. Pass the good stuff.', 'hapag' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<?php
/**
 * Title: Cover statement
 * Slug: hapag/cover-statement
 * Categories: hapag
 * Viewport width: 1400
 * Description: Full-bleed photograph with a large overlay line.
 */
$hapag_uri       = get_template_directory_uri();
$hapag_cover_alt = esc_attr__( 'A colorful plate photographed from above', 'hapag' );
$hapag_cover_src = esc_url( $hapag_uri . '/assets/images/flatlay-plate.jpg' );
?>
<!-- wp:cover {"url":"<?php echo $hapag_cover_src; ?>","alt":"<?php echo $hapag_cover_alt; ?>","dimRatio":0,"contentPosition":"bottom left","className":"hapag-cover-statement","align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull hapag-cover-statement has-custom-content-position is-position-bottom-left"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo $hapag_cover_alt; ?>" src="<?php echo $hapag_cover_src; ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
	<!-- wp:paragraph {"align":"left","className":"hapag-cover-kicker"} -->
	<p class="has-text-align-left hapag-cover-kicker"><?php echo wp_kses_post( __( 'More at the table<br>means more to love.', 'hapag' ) ); ?></p>
	<!-- /wp:paragraph -->
</div></div>
<!-- /wp:cover -->

<?php
/**
 * Title: Content rail
 * Slug: hapag/content-rail
 * Categories: hapag
 * Viewport width: 1400
 * Description: Sticky contents rail beside Post Content. Article style by default.
 */
$hapag_headings  = hapag_post_heading_links();
$hapag_permalink = get_permalink();
$hapag_share     = $hapag_permalink ? rawurlencode( $hapag_permalink ) : '';
$hapag_is_page   = hapag_is_page_context();
$hapag_rail_style = $hapag_is_page ? 'is-style-page' : 'is-style-article';
$hapag_rail_label = $hapag_is_page
	? __( 'On this page', 'hapag' )
	: __( 'In this story', 'hapag' );
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Content rail"},"className":"hapag-content-rail <?php echo esc_attr( $hapag_rail_style ); ?>","align":"full","backgroundColor":"white","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hapag-content-rail <?php echo esc_attr( $hapag_rail_style ); ?> has-white-background-color has-background">
	<!-- wp:group {"tagName":"aside","className":"hapag-content-rail-nav","layout":{"type":"default"}} -->
	<aside class="wp-block-group hapag-content-rail-nav">
		<!-- wp:paragraph {"className":"hapag-eyebrow","fontSize":"eyebrow"} -->
		<p class="hapag-eyebrow has-eyebrow-font-size"><?php echo esc_html( $hapag_rail_label ); ?></p>
		<!-- /wp:paragraph -->

		<?php foreach ( $hapag_headings as $hapag_heading ) : ?>
			<!-- wp:paragraph {"className":"hapag-rail-link"} -->
			<p class="hapag-rail-link"><a href="<?php echo esc_url( '#' . $hapag_heading['anchor'] ); ?>"><?php echo esc_html( $hapag_heading['text'] ); ?></a></p>
			<!-- /wp:paragraph -->
		<?php endforeach; ?>

		<?php if ( ! $hapag_is_page ) : ?>
		<!-- wp:group {"className":"hapag-share-links","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group hapag-share-links">
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Share', 'hapag' ); ?></p>
			<!-- /wp:paragraph -->

			<?php if ( $hapag_share ) : ?>
				<!-- wp:paragraph -->
				<p><a href="#"><?php esc_html_e( 'IG', 'hapag' ); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><a href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . $hapag_share ); ?>"><?php esc_html_e( 'FB', 'hapag' ); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><a href="<?php echo esc_url( $hapag_permalink ); ?>"><?php echo esc_html_x( '↗', 'Share permalink', 'hapag' ); ?></a></p>
				<!-- /wp:paragraph -->
			<?php endif; ?>
		</div>
		<!-- /wp:group -->
		<?php endif; ?>
	</aside>
	<!-- /wp:group -->

	<!-- wp:post-content {"className":"hapag-entry-content"} /-->
</section>
<!-- /wp:group -->

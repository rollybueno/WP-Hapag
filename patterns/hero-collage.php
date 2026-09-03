<?php
/**
 * Title: Hero collage
 * Slug: hapag/hero-collage
 * Categories: hapag
 * Viewport width: 1400
 * Description: Three replaceable images and a decorative sticker.
 */
$hapag_uri = get_template_directory_uri();
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Hero collage"},"className":"hapag-hero-collage","align":"full","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hapag-hero-collage">
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-tall"} -->
	<figure class="wp-block-image size-full is-tall"><img src="<?php echo esc_url( $hapag_uri . '/assets/images/breakfast-eggs.jpg' ); ?>" alt="<?php esc_attr_e( 'Eggs Benedict and fresh greens on a breakfast table', 'hapag' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Slow mornings', 'hapag' ); ?></figcaption></figure>
	<!-- /wp:image -->

	<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $hapag_uri . '/assets/images/berry-pancakes.jpg' ); ?>" alt="<?php esc_attr_e( 'A stack of pancakes topped with berries', 'hapag' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Stack it high', 'hapag' ); ?></figcaption></figure>
	<!-- /wp:image -->

	<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="<?php echo esc_url( $hapag_uri . '/assets/images/mexican-tacos.jpg' ); ?>" alt="<?php esc_attr_e( 'Mexican tacos topped with onion and cilantro', 'hapag' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Taco night', 'hapag' ); ?></figcaption></figure>
	<!-- /wp:image -->

	<!-- wp:paragraph {"className":"hapag-sticker"} -->
	<p class="hapag-sticker"><?php echo wp_kses_post( __( 'YUM<br><small>× 100</small>', 'hapag' ) ); ?></p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

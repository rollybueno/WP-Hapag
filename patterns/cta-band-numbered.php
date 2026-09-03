<?php
/**
 * Title: CTA band (numbered)
 * Slug: hapag/cta-band-numbered
 * Categories: hapag
 * Viewport width: 1400
 * Block Types: core/post-content
 * Description: Numbered statement band. CTA band, numbered style.
 */
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"CTA band"},"className":"hapag-cta-band is-style-numbered","align":"full","backgroundColor":"yellow","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hapag-cta-band is-style-numbered has-yellow-background-color has-background">
	<!-- wp:paragraph {"className":"hapag-cta-number"} -->
	<p class="hapag-cta-number">01</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'We believe recipes belong to everyone.', 'hapag' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"hapag-intro"} -->
	<p class="hapag-intro"><?php esc_html_e( 'No secret handshakes. No impossible ingredients. Just thoughtful guidance, good instincts, and permission to make it your own.', 'hapag' ); ?></p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

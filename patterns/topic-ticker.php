<?php
/**
 * Title: Topic ticker
 * Slug: hapag/topic-ticker
 * Categories: hapag
 * Viewport width: 1400
 * Description: Full-width repeating topics. Readable without motion.
 */
$hapag_ticker_label = esc_attr__( 'Site topics', 'hapag' );
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Topic ticker"},"className":"hapag-topic-ticker","align":"full","ariaLabel":"<?php echo $hapag_ticker_label; ?>","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hapag-topic-ticker" aria-label="<?php echo $hapag_ticker_label; ?>">
	<!-- wp:paragraph {"className":"hapag-ticker-track"} -->
	<p class="hapag-ticker-track"><span><?php esc_html_e( 'Cook something', 'hapag' ); ?></span> · <span><?php esc_html_e( 'Read something', 'hapag' ); ?></span> · <span><?php esc_html_e( 'Order something', 'hapag' ); ?></span> · <span><?php esc_html_e( 'Cook something', 'hapag' ); ?></span> · <span><?php esc_html_e( 'Read something', 'hapag' ); ?></span> · <span><?php esc_html_e( 'Order something', 'hapag' ); ?></span> ·</p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<?php
/**
 * Title: Term pills
 * Slug: hapag/term-pills
 * Categories: hapag
 * Viewport width: 1400
 * Description: Category filter pills with post counts.
 */
$hapag_posts_url = get_post_type_archive_link( 'post' );
$hapag_posts_url = $hapag_posts_url ? $hapag_posts_url : home_url( '/' );
$hapag_all_count = isset( wp_count_posts( 'post' )->publish ) ? (int) wp_count_posts( 'post' )->publish : 0;
$hapag_is_all    = is_home() || is_post_type_archive( 'post' );
$hapag_terms     = get_categories(
	array(
		'hide_empty' => true,
	)
);
?>
<!-- wp:group {"tagName":"nav","metadata":{"name":"Term pills"},"className":"hapag-term-pills","align":"full","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<nav class="wp-block-group alignfull hapag-term-pills">
	<!-- wp:paragraph -->
	<p><?php
	if ( $hapag_is_all ) {
		echo '<a href="' . esc_url( $hapag_posts_url ) . '" aria-current="page">';
	} else {
		echo '<a href="' . esc_url( $hapag_posts_url ) . '">';
	}
	echo esc_html__( 'All recipes', 'hapag' );
	echo ' <small>' . esc_html( (string) $hapag_all_count ) . '</small></a>';
	?></p>
	<!-- /wp:paragraph -->

	<?php foreach ( $hapag_terms as $hapag_term ) : ?>
		<!-- wp:paragraph -->
		<p><?php
		$hapag_current = is_category( $hapag_term->term_id );
		if ( $hapag_current ) {
			echo '<a href="' . esc_url( get_category_link( $hapag_term ) ) . '" aria-current="page">';
		} else {
			echo '<a href="' . esc_url( get_category_link( $hapag_term ) ) . '">';
		}
		echo esc_html( $hapag_term->name );
		echo ' <small>' . esc_html( (string) $hapag_term->count ) . '</small></a>';
		?></p>
		<!-- /wp:paragraph -->
	<?php endforeach; ?>
</nav>
<!-- /wp:group -->

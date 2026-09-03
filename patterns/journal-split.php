<?php
/**
 * Title: Journal split
 * Slug: hapag/journal-split
 * Categories: hapag
 * Viewport width: 1400
 * Description: One featured post beside a compact list of recent posts.
 */
?>
<!-- wp:group {"tagName":"section","anchor":"stories","metadata":{"name":"Journal split"},"className":"hapag-journal-split","align":"full","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hapag-journal-split" id="stories">
	<!-- wp:group {"className":"hapag-journal-heading","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group hapag-journal-heading">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"hapag-eyebrow","fontSize":"eyebrow"} -->
			<p class="hapag-eyebrow has-eyebrow-font-size"><?php esc_html_e( 'Stories, people & places', 'hapag' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php echo wp_kses_post( __( 'From the<br>journal', 'hapag' ) ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"hapag-text-link"} -->
		<p class="hapag-text-link"><a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>"><?php esc_html_e( 'Visit the journal →', 'hapag' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"hapag-journal-grid","layout":{"type":"default"}} -->
	<div class="wp-block-group hapag-journal-grid">
		<!-- wp:query {"queryId":2,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"hapag-journal-main"} -->
		<div class="wp-block-query hapag-journal-main">
			<!-- wp:post-template -->
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/10"} /-->
				<!-- wp:post-terms {"term":"category","fontSize":"eyebrow"} /-->
				<!-- wp:post-title {"isLink":true,"level":3} /-->
				<!-- wp:post-excerpt /-->
			<!-- /wp:post-template -->
		</div>
		<!-- /wp:query -->

		<!-- wp:query {"queryId":3,"query":{"perPage":3,"pages":0,"offset":1,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"hapag-journal-list"} -->
		<div class="wp-block-query hapag-journal-list">
			<!-- wp:post-template -->
				<!-- wp:post-terms {"term":"category","fontSize":"eyebrow"} /-->
				<!-- wp:post-title {"isLink":true,"level":3} /-->
			<!-- /wp:post-template -->
		</div>
		<!-- /wp:query -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

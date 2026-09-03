<?php
/**
 * Title: Query grid
 * Slug: hapag/query-grid
 * Categories: hapag
 * Viewport width: 1400
 * Description: Section heading plus a Query Loop of recipe cards.
 */
?>
<!-- wp:group {"tagName":"section","anchor":"recipes","metadata":{"name":"Query grid"},"className":"hapag-query-grid is-style-featured","align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hapag-query-grid is-style-featured" id="recipes">
	<!-- wp:group {"className":"hapag-query-heading","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group hapag-query-heading">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"hapag-eyebrow","fontSize":"eyebrow"} -->
			<p class="hapag-eyebrow has-eyebrow-font-size"><?php esc_html_e( 'Made to be shared', 'hapag' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php echo wp_kses_post( __( 'What are we<br>cooking?', 'hapag' ) ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"className":"hapag-intro"} -->
		<p class="hapag-intro"><?php esc_html_e( 'Reliable recipes for real kitchens. Big flavor, forgiving methods, and plenty of reasons to invite somebody over.', 'hapag' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"namespace":"hapag/query-grid"} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"className":"hapag-card","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group hapag-card">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/5"} /-->
				<!-- wp:post-terms {"term":"category"} /-->
				<!-- wp:post-title {"isLink":true,"level":3} /-->
				<!-- wp:post-excerpt {"moreText":""} /-->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'No recipes on the table yet. Publish a few posts and they will land here.', 'hapag' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"hapag-button-outline is-style-outline"} -->
		<div class="wp-block-button hapag-button-outline is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>"><?php esc_html_e( 'See all recipes →', 'hapag' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</section>
<!-- /wp:group -->

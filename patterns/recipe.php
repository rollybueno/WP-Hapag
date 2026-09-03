<?php
/**
 * Title: Recipe
 * Slug: hapag/recipe
 * Categories: hapag
 * Viewport width: 1400
 * Description: Recipe title, facts, ingredients checklist, and numbered instructions.
 */
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Recipe"},"className":"hapag-recipe","align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull hapag-recipe" aria-labelledby="recipe-title">
	<!-- wp:group {"tagName":"header","className":"hapag-recipe-header","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
	<header class="wp-block-group hapag-recipe-header">
		<!-- wp:paragraph {"className":"hapag-eyebrow","fontSize":"eyebrow"} -->
		<p class="hapag-eyebrow has-eyebrow-font-size"><?php esc_html_e( 'Cook the story', 'hapag' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"anchor":"recipe-title"} -->
		<h2 class="wp-block-heading" id="recipe-title"><?php echo wp_kses_post( __( 'Jammy eggs with greens &amp; lemony toast', 'hapag' ) ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"hapag-recipe-deck"} -->
		<p class="hapag-recipe-deck"><?php esc_html_e( 'A bright, lazy breakfast—or dinner—built for two.', 'hapag' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"hapag-recipe-facts","layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group hapag-recipe-facts">
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Prep: 10 min', 'hapag' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Cook: 15 min', 'hapag' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Serves 2', 'hapag' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</header>
	<!-- /wp:group -->

	<!-- wp:group {"className":"hapag-recipe-body","layout":{"type":"default"}} -->
	<div class="wp-block-group hapag-recipe-body">
		<!-- wp:html -->
		<aside class="hapag-ingredients">
			<p class="hapag-eyebrow"><?php esc_html_e( 'What you’ll need', 'hapag' ); ?></p>
			<h2><?php esc_html_e( 'Ingredients', 'hapag' ); ?></h2>
			<label><input type="checkbox"> <?php esc_html_e( '4 large eggs', 'hapag' ); ?></label>
			<label><input type="checkbox"> <?php esc_html_e( '2 thick slices sourdough', 'hapag' ); ?></label>
			<label><input type="checkbox"> <?php esc_html_e( '2 handfuls tender greens', 'hapag' ); ?></label>
			<label><input type="checkbox"> <?php esc_html_e( '1 lemon, zest and juice', 'hapag' ); ?></label>
			<label><input type="checkbox"> <?php esc_html_e( '2 tbsp olive oil', 'hapag' ); ?></label>
			<label><input type="checkbox"> <?php esc_html_e( 'Chili flakes, salt and pepper', 'hapag' ); ?></label>
			<div class="hapag-recipe-note">
				<strong><?php esc_html_e( 'Cook’s note', 'hapag' ); ?></strong>
				<p><?php esc_html_e( 'Any leafy greens work here. Use what looks happiest at the market.', 'hapag' ); ?></p>
			</div>
		</aside>
		<!-- /wp:html -->

		<!-- wp:html -->
		<div class="hapag-method">
			<p class="hapag-eyebrow"><?php esc_html_e( 'Let’s make it', 'hapag' ); ?></p>
			<h2><?php esc_html_e( 'Instructions', 'hapag' ); ?></h2>
			<ol>
				<li><span>01</span><div><h3><?php esc_html_e( 'Start the eggs', 'hapag' ); ?></h3><p><?php esc_html_e( 'Bring a small pot of water to a gentle boil. Lower in the eggs and cook for seven minutes, then move them straight into cold water.', 'hapag' ); ?></p></div></li>
				<li><span>02</span><div><h3><?php esc_html_e( 'Wake up the greens', 'hapag' ); ?></h3><p><?php esc_html_e( 'Toss the greens with lemon juice, zest, olive oil, a pinch of salt, and plenty of black pepper.', 'hapag' ); ?></p></div></li>
				<li><span>03</span><div><h3><?php esc_html_e( 'Make excellent toast', 'hapag' ); ?></h3><p><?php esc_html_e( 'Toast the sourdough until deeply golden. Drizzle with olive oil while it is still warm.', 'hapag' ); ?></p></div></li>
				<li><span>04</span><div><h3><?php esc_html_e( 'Bring it together', 'hapag' ); ?></h3><p><?php esc_html_e( 'Peel and halve the eggs. Pile everything onto warm plates and finish with chili flakes.', 'hapag' ); ?></p></div></li>
			</ol>
		</div>
		<!-- /wp:html -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

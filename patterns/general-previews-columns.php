<?php
/**
 * Title: Latest news section with three posts.
 * Slug: tove/general-previews-columns
 * Categories: tove-general
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
<div class="wp-block-group alignwide">
	<!-- wp:columns {"verticalAlignment":"bottom","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-bottom"><!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:heading -->
			<h2>Latest News</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:paragraph {"fontSize":"large"} -->
			<p class="has-large-font-size">Stay up to date with the latest news at Niofika Café.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:query {"queryId":21,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"flex","columns":3},"align":"wide"} -->
	<div class="wp-block-query alignwide"><!-- wp:post-template -->
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true} /-->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:post-date {"style":{"typography":{"fontWeight":"700"}},"fontSize":"heading-6"} /-->

				<!-- wp:post-title {"level":3,"isLink":true} /-->

				<!-- wp:post-excerpt {"moreText":"","className":"no-margin"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
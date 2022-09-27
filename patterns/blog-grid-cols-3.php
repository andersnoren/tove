<?php
/**
 * Title: Three column grid with featured image, title, and post date
 * Slug: tove/blog-grid-cols-3
 * Categories: tove-blog
 */
?>
<!-- wp:group {"align":"wide","layout":{"inherit":true}} -->
<div class="wp-block-group alignwide">
	<!-- wp:query {"queryId":1,"query":{"perPage":"10","pages":"100","offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","sticky":"","inherit":true},"displayLayout":{"type":"flex","columns":3},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template -->
		<!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"bottom":"1em"}}}} /-->

		<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"bottom":"0.33em","top":"0em"}}},"fontSize":"large"} /-->

		<!-- wp:post-date {"isLink":true} /-->
		<!-- /wp:post-template -->

		<!-- wp:group {"layout":{"inherit":true}} -->
		<div class="wp-block-group">
			<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","className":"alignwide is-style-tove-vertical-separators","layout":{"type":"flex","justifyContent":"space-between"}} -->
			<!-- wp:query-pagination-previous {"fontSize":"large"} /-->

			<!-- wp:query-pagination-next {"fontSize":"large"} /-->
			<!-- /wp:query-pagination -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
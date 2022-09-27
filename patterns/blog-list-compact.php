<?php
/**
 * Title: Compact list with title and post date.
 * Slug: tove/blog-list-compact
 * Categories: tove-blog
 */
?>
<!-- wp:group {"align":"wide","layout":{"inherit":true}} -->
<div class="wp-block-group alignwide">
	<!-- wp:query {"queryId":1,"query":{"perPage":"3","pages":"100","offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","sticky":"","inherit":true},"displayLayout":{"type":"list","columns":3},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template -->
		<!-- wp:group {"layout":{"inherit":true}} -->
		<div class="wp-block-group">
			<!-- wp:group {"align":"wide"} -->
			<div class="wp-block-group alignwide">
				<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"margin":{"bottom":"2rem","top":"2rem"}}}} -->
				<div class="wp-block-columns alignwide are-vertically-aligned-center" style="margin-top:2rem;margin-bottom:2rem">
					<!-- wp:column {"verticalAlignment":"center"} -->
					<div class="wp-block-column is-vertically-aligned-center">
						<!-- wp:post-title {"isLink":true,"fontSize":"large"} /-->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"center"} -->
					<div class="wp-block-column is-vertically-aligned-center">
						<!-- wp:post-date {"textAlign":"right","isLink":true,"fontSize":"large"} /-->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->

				<!-- wp:separator {"className":"is-style-wide no-margin-vertical"} -->
				<hr class="wp-block-separator is-style-wide no-margin-vertical" />
				<!-- /wp:separator -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem"}}},"layout":{"inherit":true}} -->
		<div class="wp-block-group" style="padding-top:2rem">
			<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","className":"alignwide","layout":{"type":"flex","justifyContent":"space-between"}} -->
			<!-- wp:query-pagination-previous {"fontSize":"large"} /-->

			<!-- wp:query-pagination-next {"fontSize":"large"} /-->
			<!-- /wp:query-pagination -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
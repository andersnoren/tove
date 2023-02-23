<?php
/**
 * Title: Compact latest news section with three posts.
 * Slug: tove/general-previews-columns-small
 * Categories: tove-general
 */
?>
<!-- wp:group {"align":"wide"} -->
<div class="wp-block-group alignwide">
	<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}},"typography":{"textTransform":"uppercase"}},"fontSize":"tiny"} -->
	<h2 class="has-tiny-font-size" style="margin-bottom:var(--wp--preset--spacing--40);text-transform:uppercase">Latest
		News</h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":27,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"displayLayout":{"type":"flex","columns":3},"align":"wide","className":"no-margin-top"} -->
	<div class="wp-block-query alignwide no-margin-top"><!-- wp:post-template -->
		<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"radius":"16px"}},"backgroundColor":"senary"} -->
		<div class="wp-block-group alignwide has-senary-background-color has-background"
			style="border-radius:16px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-columns alignwide"><!-- wp:column {"width":"33.33%"} -->
				<div class="wp-block-column" style="flex-basis:33.33%">
					<!-- wp:post-featured-image {"isLink":true,"width":"","height":"170px"} /--></div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
				<div class="wp-block-column">
					<!-- wp:post-date {"style":{"typography":{"fontWeight":"700"}},"fontSize":"heading-6"} /-->

					<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->

					<!-- wp:post-excerpt {"className":"no-margin","fontSize":"small"} /-->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
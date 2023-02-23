<?php
/**
 * Title: Large featured section for the latest sticky post on the site.
 * Slug: tove/general-previews-featured
 * Categories: tove-general
 */
?>
<!-- wp:group {"align":"wide"} -->
<div class="wp-block-group alignwide">
	<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}},"typography":{"textTransform":"uppercase"}},"fontSize":"tiny"} -->
	<h2 class="has-tiny-font-size" style="margin-bottom:var(--wp--preset--spacing--40);text-transform:uppercase">
		Featured Post</h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":27,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"displayLayout":{"type":"list","columns":2},"align":"wide","className":"no-margin-top"} -->
	<div class="wp-block-query alignwide no-margin-top"><!-- wp:post-template -->
		<!-- wp:group {"align":"wide","style":{"border":{"radius":"16px"}},"backgroundColor":"senary"} -->
		<div class="wp-block-group alignwide has-senary-background-color has-background" style="border-radius:16px">
			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide"><!-- wp:column {"width":"50%"} -->
				<div class="wp-block-column" style="flex-basis:50%">
					<!-- wp:post-featured-image {"isLink":true,"width":"","height":""} /--></div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"50%"} -->
				<div class="wp-block-column" style="flex-basis:50%">
					<!-- wp:post-date {"style":{"typography":{"fontWeight":"700"}},"fontSize":"heading-6"} /-->

					<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0.75em","top":"0.75em"}}}} /-->

					<!-- wp:post-excerpt {"moreText":"Read More →","className":"no-margin"} /-->
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
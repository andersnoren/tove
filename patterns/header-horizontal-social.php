<?php
/**
 * Title: Header with site title, a menu and social icons.
 * Slug: tove/header-horizontal-social
 * Categories: tove-header
 */
?>
<!-- wp:group {"align":"wide","layout":{"inherit":true}} -->
<div class="wp-block-group alignwide">

	<!-- wp:columns {"verticalAlignment":null,"isStackedOnMobile":false,"align":"wide"} -->
	<div class="wp-block-columns alignwide is-not-stacked-on-mobile">

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:site-title {"level":0,"textAlign":"left","fontSize":"large"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"300px","className":"hide-tablet"} -->
		<div class="wp-block-column is-vertically-aligned-center hide-tablet" style="flex-basis:300px">

			<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#374AC8","className":"items-justified-center is-style-logos-only"} -->
			<ul class="wp-block-social-links has-icon-color items-justified-center is-style-logos-only">
				<!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->
				<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->
				<!-- wp:social-link {"url":"https://instagram.com","service":"instagram"} /-->
			</ul>
			<!-- /wp:social-links -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:navigation {"__unstableLocation":"primary","layout":{"type":"flex","setCascadingProperties":"true","justifyContent":"right","orientation":"horizontal","flexWrap":"wrap"},"fontSize":"large"} /-->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
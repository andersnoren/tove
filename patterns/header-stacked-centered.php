<?php
/**
 * Title: Header with site title, a menu and social icons stacked and centered.
 * Slug: tove/header-stacked-centered
 * Categories: tove-header
 */
?>
<!-- wp:group {"align":"wide","layout":{"inherit":true}} -->
<div class="wp-block-group alignwide">

	<!-- wp:group {"align":"wide"} -->
	<div class="wp-block-group alignwide">

		<!-- wp:site-title {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"heading-3"} /-->

		<!-- wp:navigation {"__unstableLocation":"primary","layout":{"type":"flex","setCascadingProperties":"true","justifyContent":"center","orientation":"horizontal","flexWrap":"wrap"}} /-->

		<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#374AC8","className":"items-justified-center is-style-logos-only"} -->
		<ul class="wp-block-social-links has-icon-color items-justified-center is-style-logos-only">
			<!-- wp:social-link {"url":"https://facebook.com","service":"facebook"} /-->
			<!-- wp:social-link {"url":"https://twitter.com","service":"twitter"} /-->
			<!-- wp:social-link {"url":"https://instagram.com","service":"instagram"} /-->
		</ul>
		<!-- /wp:social-links -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
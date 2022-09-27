<?php
/**
 * Title: Footer with site title, theme credit and social icons stacked and centered.
 * Slug: tove/footer-stacked-centered
 * Categories: tove-footer
 */
?>
<!-- wp:group {"align":"wide","layout":{"inherit":true}} -->
<div class="wp-block-group alignwide">

	<!-- wp:group {"align":"wide"} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"className":"theme-credits-row no-margin-bottom","layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-group theme-credits-row no-margin-bottom">
			<!-- wp:paragraph -->
			<p><strong>© 2021</strong> </p>
			<!-- /wp:paragraph -->

			<!-- wp:site-title {"level":0,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:spacer {"height":12} -->
		<div style="height:12px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:paragraph {"align":"center","fontSize":"tiny"} -->
		<p class="has-text-align-center has-tiny-font-size">Theme by <a href="https://andersnoren.se">Anders Norén</a></p>
		<!-- /wp:paragraph -->

		<!-- wp:separator {"align":"center"} -->
		<hr class="wp-block-separator aligncenter" />
		<!-- /wp:separator -->

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
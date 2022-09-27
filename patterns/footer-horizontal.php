<?php
/**
 * Title: Footer with site title and theme credit in a centered paragraph. This is the default footer in the theme.
 * Slug: tove/footer-horizontal
 * Categories: tove-footer
 */
?>
<!-- wp:group {"align":"wide","layout":{"inherit":true}} -->
<div class="wp-block-group alignwide">

	<!-- wp:group {"className":"theme-credits-row","layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-group theme-credits-row">
		<!-- wp:paragraph {"fontSize":"tiny"} -->
		<p class="has-tiny-font-size"><strong>© 2021</strong> </p>
		<!-- /wp:paragraph -->

		<!-- wp:site-title {"level":0,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"tiny"} /-->

		<!-- wp:paragraph {"fontSize":"tiny"} -->
		<p class="has-tiny-font-size">— Theme by <a href="https://andersnoren.se">Anders Norén</a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
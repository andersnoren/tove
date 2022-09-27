<?php
/**
 * Title: Header with site title and a menu. This is the default header in the theme.
 * Slug: tove/header-horizontal
 * Categories: tove-header
 */
?>
<!-- wp:group {"align":"wide","layout":{"inherit":true}} -->
<div class="wp-block-group alignwide">
	<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center is-not-stacked-on-mobile">
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:site-title {"fontSize":"large"} /-->
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
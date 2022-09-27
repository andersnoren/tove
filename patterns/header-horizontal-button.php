<?php
/**
 * Title: Header with site title, a menu and buttons.
 * Slug: tove/header-horizontal-button
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

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:navigation {"__unstableLocation":"primary","layout":{"type":"flex","setCascadingProperties":"true","justifyContent":"right","orientation":"horizontal","flexWrap":"wrap"},"fontSize":"large"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"163px","className":"hide-tablet-portrait"} -->
		<div class="wp-block-column is-vertically-aligned-center hide-tablet-portrait" style="flex-basis:163px">

			<!-- wp:buttons {"contentJustification":"right"} -->
			<div class="wp-block-buttons is-content-justification-right">
				<!-- wp:button {"backgroundColor":"primary","style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"16px","right":"16px"}}}} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background" style="padding-top:10px;padding-right:16px;padding-bottom:10px;padding-left:16px">08-123 45 67</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
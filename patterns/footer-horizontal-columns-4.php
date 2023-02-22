<?php
/**
 * Title: Footer with site title, contact information, and two menus.
 * Slug: tove/footer-horizontal-columns-4
 * Categories: tove-footer
 */
?>
<!-- wp:group {"align":"wide","layout":{"inherit":true}} -->
<div class="wp-block-group alignwide">
	<!-- wp:group {"align":"wide"} -->
	<div class="wp-block-group alignwide">
		<!-- wp:separator {"align":"wide","className":"is-style-wide"} -->
		<hr class="wp-block-separator alignwide is-style-wide" />
		<!-- /wp:separator -->

		<!-- wp:columns {"className":"is-style-tove-horizontal-separators"} -->
		<div class="wp-block-columns is-style-tove-horizontal-separators">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:site-title {"level":0,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"large"} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size">Hammarby Kaj 10<br>120 32 Stockholm</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size">hej@niofika.se<br>08-123 45 67</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:heading {"level":6,"style":{"typography":{"lineHeight":"2"}}} -->
				<h6 style="line-height:2">Info</h6>
				<!-- /wp:heading -->

				<!-- wp:navigation {"overlayMenu":"never","__unstableLocation":"primary","className":"no-margin-top","layout":{"type":"flex","setCascadingProperties":"true","orientation":"vertical","justifyContent":"left","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"0.5em"}}} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:heading {"level":6,"style":{"typography":{"lineHeight":"2"}}} -->
				<h6 style="line-height:2">Follow us</h6>
				<!-- /wp:heading -->

				<!-- wp:navigation {"overlayMenu":"never","className":"no-margin-top","layout":{"type":"flex","setCascadingProperties":"true","orientation":"vertical"},"fontSize":"small"} /-->
				<!-- wp:navigation-link {"label":"Twitter","url":"https://twitter.com","kind":"custom","isTopLevelLink":true} /-->
				<!-- wp:navigation-link {"label":"Facebook","url":"https://facebook.com","kind":"custom","isTopLevelLink":true} /-->
				<!-- wp:navigation-link {"label":"Instagram","url":"https://instagram.com","kind":"custom","isTopLevelLink":true} /-->
				<!-- /wp:navigation -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:separator {"align":"wide","className":"is-style-wide"} -->
		<hr class="wp-block-separator alignwide is-style-wide" />
		<!-- /wp:separator -->

		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"className":"theme-credits-row","layout":{"type":"flex"}} -->
				<div class="wp-block-group theme-credits-row">
					<!-- wp:paragraph {"fontSize":"tiny"} -->
					<p class="has-tiny-font-size"><strong>© 2023</strong> </p>
					<!-- /wp:paragraph -->

					<!-- wp:site-title {"level":0,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"tiny"} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"align":"right","fontSize":"small"} -->
				<p class="has-text-align-right has-small-font-size">Theme by <a href="https://andersnoren.se">Anders Norén</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
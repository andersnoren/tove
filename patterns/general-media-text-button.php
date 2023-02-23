<?php
/**
 * Title: Media and text with button.
 * Slug: tove/general-media-text-button
 * Categories: tove-general
 */
?>
<!-- wp:media-text {"mediaPosition":"right","mediaLink":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/illustrations/cup-illustration-square.png","mediaType":"image","mediaSizeSlug":"full","imageFill":true,"focalPoint":{"x":0,"y":"0.50"},"backgroundColor":"senary","className":"is-style-default"} -->
<div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile is-image-fill is-style-default has-senary-background-color has-background">
	<figure class="wp-block-media-text__media" style="background-image:url(<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/illustrations/cup-illustration-square.png);background-position:0% 50%"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/illustrations/cup-illustration-square.png" alt="" /></figure>
	<div class="wp-block-media-text__content">
		<!-- wp:heading {"level":6,"style":{"spacing":{"margin":{"bottom":"0","top":"0"}}},"backgroundColor":"secondary"} -->
		<h6 class="has-secondary-background-color has-background" style="margin-top:0;margin-bottom:0">Hammarby Kaj 10</h6>
		<!-- /wp:heading -->

		<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"500"},"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
		<h1 style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40);font-weight:500">Our Specials</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size">See our recommendations for the best experiences at Niofika in Hammarby Sjöstad.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link">Discover →</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
</div>
<!-- /wp:media-text -->
<?php
/**
 * Title: Testimonials section with three quotes.
 * Slug: tove/general-testimonials-columns
 * Categories: tove-general
 */
?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"backgroundColor":"senary"} -->
	<div class="wp-block-column has-senary-background-color has-background">
		<!-- wp:group {"backgroundColor":"senary"} -->
		<div class="wp-block-group has-senary-background-color has-background">
			<!-- wp:image {"align":"center","width":100,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
			<div class="wp-block-image is-style-rounded">
				<figure class="aligncenter size-full is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/illustrations/avatar-3.png" alt="" width="100" /></figure>
			</div>
			<!-- /wp:image -->

			<!-- wp:quote {"align":"center","className":"is-style-default"} -->
			<blockquote class="wp-block-quote has-text-align-center is-style-default"><!-- wp:paragraph -->
				<p>“Niofika Café serves the best coffee in Stockholm. It’s not even close.”</p>
				<!-- /wp:paragraph --><cite>Coffee Snob</cite>
			</blockquote>
			<!-- /wp:quote -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"backgroundColor":"senary"} -->
	<div class="wp-block-column has-senary-background-color has-background">
		<!-- wp:group {"backgroundColor":"senary"} -->
		<div class="wp-block-group has-senary-background-color has-background">
			<!-- wp:image {"align":"center","width":100,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
			<div class="wp-block-image is-style-rounded">
				<figure class="aligncenter size-full is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/illustrations/avatar-1.png" alt="" width="100" /></figure>
			</div>
			<!-- /wp:image -->

			<!-- wp:quote {"align":"center","className":"is-style-default"} -->
			<blockquote class="wp-block-quote has-text-align-center is-style-default"><!-- wp:paragraph -->
				<p>“Niofika Café serves the best coffee in Stockholm. It’s not even close.”</p>
				<!-- /wp:paragraph --><cite>Coffee Snob</cite>
			</blockquote>
			<!-- /wp:quote -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"backgroundColor":"senary"} -->
	<div class="wp-block-column has-senary-background-color has-background">
		<!-- wp:group {"backgroundColor":"senary"} -->
		<div class="wp-block-group has-senary-background-color has-background">
			<!-- wp:image {"align":"center","width":100,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
			<div class="wp-block-image is-style-rounded">
				<figure class="aligncenter size-full is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/illustrations/avatar-2.png" alt="" width="100" /></figure>
			</div>
			<!-- /wp:image -->

			<!-- wp:quote {"align":"center","className":"is-style-default"} -->
			<blockquote class="wp-block-quote has-text-align-center is-style-default"><!-- wp:paragraph -->
				<p>“Niofika Café serves the best coffee in Stockholm. It’s not even close.”</p>
				<!-- /wp:paragraph --><cite>Coffee Snob</cite>
			</blockquote>
			<!-- /wp:quote -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage TT1_Blocks
 * @since 0.1
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since 0.1
	 *
	 * @return void
	 */
	function twenty_twenty_one_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'twentytwentyone-columns-overlap',
				'label' => esc_html__( 'Overlap', 'tove' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'twentytwentyone-border',
				'label' => esc_html__( 'Borders', 'tove' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'twentytwentyone-border',
				'label' => esc_html__( 'Borders', 'tove' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'twentytwentyone-border',
				'label' => esc_html__( 'Borders', 'tove' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'twentytwentyone-image-frame',
				'label' => esc_html__( 'Frame', 'tove' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'twentytwentyone-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'tove' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'twentytwentyone-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'tove' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'twentytwentyone-border',
				'label' => esc_html__( 'Borders', 'tove' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'twentytwentyone-separator-thick',
				'label' => esc_html__( 'Thick', 'tove' ),
			)
		);
	}
	add_action( 'init', 'twenty_twenty_one_register_block_styles' );
}

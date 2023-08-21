<?php

/*	-----------------------------------------------------------------------------------------------
	THEME SUPPORTS
--------------------------------------------------------------------------------------------------- */

function tove_setup() {
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'tove_setup' );


/*	-----------------------------------------------------------------------------------------------
	ENQUEUE STYLES
--------------------------------------------------------------------------------------------------- */

function tove_styles() {
	wp_enqueue_style( 'tove-styles', get_theme_file_uri( '/style.css' ), array(), wp_get_theme( 'tove' )->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'tove_styles' );


/*	-----------------------------------------------------------------------------------------------
	BLOCK PATTERN CATEGORIES
	Register categories for the block patterns.
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_register_block_patterns' ) ) : 
	function tove_register_block_patterns() {

		// The block pattern categories included in Tove.
		$tove_block_pattern_categories = apply_filters( 'tove_block_pattern_categories', array(
			'tove-blog' => array(
				'label'			=> esc_html__( 'Tove Blog', 'tove' ),
			),
			'tove-cta'  => array(
				'label'			=> esc_html__( 'Tove Call to Action', 'tove' ),
			),
			'tove-footer' => array(
				'label'			=> esc_html__( 'Tove Footer', 'tove' ),
			),
			'tove-general' => array(
				'label'			=> esc_html__( 'Tove General', 'tove' ),
			),
			'tove-header' => array(
				'label'			=> esc_html__( 'Tove Header', 'tove' ),
			),
			'tove-hero' => array(
				'label'			=> esc_html__( 'Tove Hero', 'tove' ),
			),
			'tove-restaurant' => array(
				'label'			=> esc_html__( 'Tove Restaurant', 'tove' ),
			),
		) );

		// Sort the block pattern categories alphabetically based on the label value, to ensure alphabetized order when the strings are localized.
		uasort( $tove_block_pattern_categories, function( $a, $b ) { 
			return strcmp( $a["label"], $b["label"] ); }
		);

		// Register block pattern categories.
		foreach ( $tove_block_pattern_categories as $slug => $settings ) {
			register_block_pattern_category( $slug, $settings );
		}
	
	}
	add_action( 'init', 'tove_register_block_patterns' );
endif;


/*	-----------------------------------------------------------------------------------------------
	BLOCK STYLES
	Register theme specific block styles.
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_register_block_styles' ) ) :
	function tove_register_block_styles() {

		// Shared: Shaded.
		$supports_shaded_block_style = apply_filters( 'tove_supports_shaded_block_style', array( 'core/columns', 'core/group', 'core/image', 'core/media-text', 'core/social-links' ) );

		foreach ( $supports_shaded_block_style as $block_name ) {
			register_block_style( $block_name, array(
				'name'  	=> 'tove-shaded',
				'label' 	=> esc_html__( 'Shaded', 'tove' ),
			) );
		}

		// Button: Plain
		register_block_style( 'core/button', array(
			'name'  	=> 'tove-plain',
			'label' 	=> esc_html__( 'Plain', 'tove' ),
		) );

		// Query Pagination: Vertical separators
		register_block_style( 'core/query-pagination', array(
			'name'  	=> 'tove-vertical-separators',
			'label' 	=> esc_html__( 'Vertical Separators', 'tove' ),
		) );

		// Query Pagination: Top separator
		register_block_style( 'core/query-pagination', array(
			'name'  	=> 'tove-top-separator',
			'label' 	=> esc_html__( 'Top Separator', 'tove' ),
		) );

		// Table: Vertical borders
		register_block_style( 'core/table', array(
			'name'  	=> 'tove-vertical-borders',
			'label' 	=> esc_html__( 'Vertical Borders', 'tove' ),
		) );
		
	}
	add_action( 'init', 'tove_register_block_styles' );
endif;

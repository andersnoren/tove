<?php

/*	-----------------------------------------------------------------------------------------------
	THEME SUPPORTS
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_setup' ) ) :
	function tove_setup() {

		load_theme_textdomain( 'tove', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1792, 9999 );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( array( 
			'https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;0,700;1,500;1,700&display=swap',
			'./assets/css/editor.css',
			'./assets/css/blocks.css',
			'./assets/css/shared.css',
		) );

		// HTML5 semantic markup.
		add_theme_support( 'html5', array( 'comment-form', 'comment-list' ) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for custom units.
		add_theme_support( 'custom-units' );
	}
	add_action( 'after_setup_theme', 'tove_setup' );
endif;


/*	-----------------------------------------------------------------------------------------------
	ENQUEUE STYLES
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_styles' ) ) :
	function tove_styles() {

		wp_register_style( 'tove-styles-reset', get_template_directory_uri() . '/assets/css/reset.css', array(), wp_get_theme()->get( 'Version' ) );
		wp_register_style( 'tove-google-fonts', '//fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;0,700;1,500;1,700&display=swap' );
		wp_register_style( 'tove-styles-shared', get_template_directory_uri() . '/assets/css/shared.css', array(), wp_get_theme()->get( 'Version' ) );
		wp_register_style( 'tove-styles-blocks', get_template_directory_uri() . '/assets/css/blocks.css', array(), wp_get_theme()->get( 'Version' ) );
		wp_register_style( 'tove-styles-front-end', get_template_directory_uri() . '/assets/css/front-end.css', array(), wp_get_theme()->get( 'Version' ) );

		$dependiences = array( 'tove-styles-reset', 'tove-google-fonts', 'tove-styles-shared', 'tove-styles-blocks', 'tove-styles-front-end' );

		wp_enqueue_style( 'tove-style', get_template_directory_uri() . '/style.css', $dependiences, wp_get_theme()->get( 'Version' ) );

	}
	add_action( 'wp_enqueue_scripts', 'tove_styles', 1 );
endif;


/*	-----------------------------------------------------------------------------------------------
	BLOCK PATTERNS
	Register block patterns included in Tove.
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_register_block_patterns' ) ) : 
	function tove_register_block_patterns() {

		// Register block pattern categories.
		if ( function_exists( 'register_block_pattern_category' ) ) :
			register_block_pattern_category( 'tove', array( 
				'label' 	=> esc_html__( 'Tove', 'tove' ) 
			) );
		endif;

		// Register block patterns.
		if ( function_exists( 'register_block_pattern' ) ) :

			/*

			// Name.
			register_block_pattern(
				'tove/slug',
				array(
					'title'         => esc_html__( 'Name', 'tove' ),
					'categories'    => array( 'tove' ),
					'viewportWidth' => 1440,
					'content'       => '',
				)
			);

			*/

		endif;
	
	}
endif;


/*	-----------------------------------------------------------------------------------------------
	BLOCK STYLES
	Register block styles included in Tove.
--------------------------------------------------------------------------------------------------- */

if ( function_exists( 'register_block_style' ) && ! function_exists( 'tove_register_block_styles' ) ) :
	function tove_register_block_styles() {

		// Shared: Shaded.
		$shaded_style_supports = array( 'core/group', 'core/image' );

		foreach ( $shaded_style_supports as $block_name ) {
			register_block_style( $block_name, array(
				'name'  	=> 'tove-shaded',
				'label' 	=> esc_html__( 'Shaded', 'tove' ),
			) );
		}
		
	}
	add_action( 'init', 'tove_register_block_styles' );
endif;

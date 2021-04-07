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

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for custom spacing controls.
		add_theme_support( 'custom-spacing' );

	}
	add_action( 'after_setup_theme', 'tove_setup' );
endif;


/*	-----------------------------------------------------------------------------------------------
	ENQUEUE STYLES
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_styles' ) ) :
	function tove_styles() {

		wp_register_style( 'tove-google-fonts', 	'//fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;0,700;1,500;1,700&display=swap' );
		wp_register_style( 'tove-styles-reset', 	get_template_directory_uri() . '/assets/css/reset.css' );
		wp_register_style( 'tove-styles-shared', 	get_template_directory_uri() . '/assets/css/shared.css' );
		wp_register_style( 'tove-styles-blocks', 	get_template_directory_uri() . '/assets/css/blocks.css' );
		wp_register_style( 'tove-styles-front-end', get_template_directory_uri() . '/assets/css/front-end.css' );

		// TODO: Check if it's possible to check for DM Sans in the typography settings, and make the Google Fonts registraton conditional.

		$dependiences = apply_filters( 'tove_style_dependencies', array( 'tove-google-fonts', 'tove-styles-reset', 'tove-styles-shared', 'tove-styles-blocks', 'tove-styles-front-end' ) );

		wp_enqueue_style( 'tove-style', get_template_directory_uri() . '/style.css', $dependiences, wp_get_theme()->get( 'Version' ) );

	}
	add_action( 'wp_enqueue_scripts', 'tove_styles', 5 );
endif;


/*	-----------------------------------------------------------------------------------------------
	ENQUEUE SCRIPTS
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_scripts' ) ) :
	function tove_scripts() {

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
	add_action( 'wp_enqueue_scripts', 'tove_scripts' );
endif;


/*	-----------------------------------------------------------------------------------------------
	BLOCK PATTERNS
	Register theme specific block patterns.
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
	Register theme specific block styles.
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

		// Query Pagination: Vertical borders
		register_block_style( 'core/query-pagination', array(
			'name'  	=> 'tove-vertical-borders',
			'label' 	=> esc_html__( 'Vertical Borders', 'tove' ),
		) );
		
	}
	add_action( 'init', 'tove_register_block_styles' );
endif;

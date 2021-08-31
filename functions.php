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

		// HTML5 semantic markup.
		add_theme_support( 'html5', array( 'comment-form', 'comment-list' ) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

	}
	add_action( 'after_setup_theme', 'tove_setup' );
endif;


/*	-----------------------------------------------------------------------------------------------
	ENQUEUE STYLES
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_styles' ) ) :
	function tove_styles() {

		wp_register_style( 'tove-styles-google-fonts', 	tove_get_google_fonts_url() );
		wp_register_style( 'tove-styles-shared', 		get_template_directory_uri() . '/assets/css/shared.css' );
		wp_register_style( 'tove-styles-blocks', 		get_template_directory_uri() . '/assets/css/blocks.css' );
		wp_register_style( 'tove-styles-front-end', 	get_template_directory_uri() . '/assets/css/front-end.css' );

		$dependiences = apply_filters( 'tove_style_dependencies', array( 'tove-styles-shared', 'tove-styles-blocks', 'tove-styles-front-end', 'tove-styles-google-fonts' ) );
		wp_enqueue_style( 'tove-style', get_template_directory_uri() . '/style.css', $dependiences, wp_get_theme( 'Tove' )->get( 'Version' ) );

	}
	add_action( 'wp_enqueue_scripts', 'tove_styles' );
endif;


/*	-----------------------------------------------------------------------------------------------
	ENQUEUE EDITOR STYLES
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_editor_styles' ) ) :
	function tove_editor_styles() {

		add_editor_style( array( 
			'./assets/css/editor.css',
			'./assets/css/blocks.css',
			'./assets/css/shared.css',
			tove_get_google_fonts_url()
		) );

	}
	add_action( 'admin_init', 'tove_editor_styles' );
endif;


/*	-----------------------------------------------------------------------------------------------
	GET GOOGLE FONTS URL
	Builds a Google Fonts request URL from the Google Fonts families used in theme.json.
	Based on a solution in the Blockbase theme (see readme.txt for licensing info).
 
 	@return $fonts_url
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_get_google_fonts_url' ) ) : 
	function tove_get_google_fonts_url() {

		if ( ! class_exists( 'WP_Theme_JSON_Resolver_Gutenberg' ) ) return '';

		$theme_data = WP_Theme_JSON_Resolver_Gutenberg::get_merged_data()->get_settings();

		if ( empty( $theme_data['typography']['fontFamilies'] ) ) return '';

		$theme_families 	= ! empty( $theme_data['typography']['fontFamilies']['theme'] ) ? $theme_data['typography']['fontFamilies']['theme'] : array();
		$user_families 		= ! empty( $theme_data['typography']['fontFamilies']['user'] ) ? $theme_data['typography']['fontFamilies']['user'] : array();
		$font_families 		= array_merge( $theme_families, $user_families );

		if ( ! $font_families ) return '';

		$font_family_urls = array();

		foreach ( $font_families as $font_family ) {
			if ( ! empty( $font_family['google'] ) ) $font_family_urls[] = $font_family['google'];
		}

		if ( ! $font_family_urls ) return '';

		// Return a single request URL for all of the font families.
		return apply_filters( 'tove_google_fonts_url', esc_url_raw( 'https://fonts.googleapis.com/css2?' . implode( '&', $font_family_urls ) . '&display=swap' ) );

	}
endif;


/*	-----------------------------------------------------------------------------------------------
	BLOCK PATTERNS
	Register theme specific block patterns.
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_register_block_patterns' ) ) : 
	function tove_register_block_patterns() {

		if ( ! ( function_exists( 'register_block_pattern_category' ) && function_exists( 'register_block_pattern' ) ) ) return;

		// Register block pattern categories.
		register_block_pattern_category( 'tove', array( 
			'label' 	=> esc_html__( 'Tove', 'tove' ) 
		) );

		// Register block patterns.
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
	
	}
endif;


/*	-----------------------------------------------------------------------------------------------
	BLOCK STYLES
	Register theme specific block styles.
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_register_block_styles' ) ) :
	function tove_register_block_styles() {

		if ( ! function_exists( 'register_block_style' ) ) return;

		// Shared: Shaded.
		$supports_shaded_block_style = apply_filters( 'tove_supports_shaded_block_style', array( 'core/group', 'core/image', 'core/social-links' ) );

		foreach ( $supports_shaded_block_style as $block_name ) {
			register_block_style( $block_name, array(
				'name'  	=> 'tove-shaded',
				'label' 	=> esc_html__( 'Shaded', 'tove' ),
			) );
		}

		// Query Pagination: Vertical separators
		register_block_style( 'core/query-pagination', array(
			'name'  	=> 'tove-vertical-separators',
			'label' 	=> esc_html__( 'Vertical Separators', 'tove' ),
		) );

		// Columns: Separators
		register_block_style( 'core/columns', array(
			'name'  	=> 'tove-horizontal-separators',
			'label' 	=> esc_html__( 'Horizontal Separators', 'tove' ),
		) );
		
	}
	add_action( 'init', 'tove_register_block_styles' );
endif;

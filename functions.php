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

		// The block pattern categories included in Tove.
		$tove_block_pattern_categories = apply_filters( 'tove_block_pattern_categories', array(
			'tove-banner' => array(
				'label'			=> esc_html__( 'Tove Banner', 'tove' ),
			),
			'tove-cta'  => array(
				'label'			=> esc_html__( 'Tove Call to Action', 'tove' ),
			),
			'tove-footer' => array(
				'label'			=> esc_html__( 'Tove Footer', 'tove' ),
			),
			'tove-header' => array(
				'label'			=> esc_html__( 'Tove Header', 'tove' ),
			),
			'tove-hero' => array(
				'label'			=> esc_html__( 'Tove Hero', 'tove' ),
			),
			'tove-query' => array(
				'label'			=> esc_html__( 'Tove Post Template', 'tove' ),
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

		// The block patterns included in Tove.
		$tove_block_patterns = apply_filters( 'tove_block_patterns', array(
			'tove/footer-horizontal' => array(
				'title'         => esc_html__( 'Footer with site title and theme credit in a centered paragraph.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'footer-horizontal' ),
			),
			'tove/footer-horizontal-social' => array(
				'title'         => esc_html__( 'Footer with site title, theme credit and social icons.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'footer-horizontal-social' ),
			),
			'tove/footer-horizontal-columns-1' => array(
				'title'         => esc_html__( 'Footer with site title, menu, opening hours and contact information in four columns.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'footer-horizontal-columns-1' ),
			),
			'tove/footer-horizontal-columns-2' => array(
				'title'         => esc_html__( 'Footer with site title, menu, opening hours, contact information and social icons in two columns.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'footer-horizontal-columns-2' ),
			),
			'tove/footer-horizontal-columns-3' => array(
				'title'         => esc_html__( 'Footer with site title, information blocks for two business locations, menu and social icons.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'footer-horizontal-columns-3' ),
			),
			'tove/footer-stacked-centered' => array(
				'title'         => esc_html__( 'Footer with site title, theme credit and social icons stacked and centered.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'footer-stacked-centered' ),
			),
			'tove/cta-horizontal' => array(
				'title'         => esc_html__( 'Horizontal call to action.', 'tove' ),
				'categories'    => array( 'tove-cta' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'cta-horizontal' ),
			),
			'tove/cta-vertical' => array(
				'title'         => esc_html__( 'Vertical call to action.', 'tove' ),
				'categories'    => array( 'tove-cta' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'cta-vertical' ),
			),
			'tove/header-horizontal' => array(
				'title'         => esc_html__( 'Header with site title and a menu. This is the default header in the theme.', 'tove' ),
				'categories'    => array( 'tove-header' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'header-horizontal' ),
			),
			'tove/header-horizontal-button' => array(
				'title'         => esc_html__( 'Header with site title, a menu and buttons.', 'tove' ),
				'categories'    => array( 'tove-header' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'header-horizontal-button' ),
			),
			'tove/header-horizontal-social' => array(
				'title'         => esc_html__( 'Header with site title, a menu and social icons.', 'tove' ),
				'categories'    => array( 'tove-header' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'header-horizontal-social' ),
			),
			'tove/header-horizontal-double' => array(
				'title'         => esc_html__( 'Header with opening hours, button, site title and a menu.', 'tove' ),
				'categories'    => array( 'tove-header' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'header-horizontal-double' ),
			),
			'tove/header-horizontal-double-deluxe' => array(
				'title'         => esc_html__( 'Header with opening hours, site title, social icons, a menu and a "Call us" button.', 'tove' ),
				'categories'    => array( 'tove-header' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'header-horizontal-double-deluxe' ),
			),
			'tove/header-stacked-centered' => array(
				'title'         => esc_html__( 'Header with site title, a menu and social icons stacked and centered.', 'tove' ),
				'categories'    => array( 'tove-header' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'header-stacked-centered' ),
			),
			'tove/hero-cover' => array(
				'title'         => esc_html__( 'Hero with a background image and a heading, paragraph of text, and buttons.', 'tove' ),
				'categories'    => array( 'tove-hero' ),
				'viewportWidth' => 1440,
				'content'       => tove_get_block_pattern_markup( 'hero-cover' ),
			),
			'tove/restaurant-location' => array(
				'title'         => esc_html__( 'Information block for a restaurant or café location, with the restaurant name, contact information, opening hours and button.', 'tove' ),
				'categories'    => array( 'tove-restaurant' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'restaurant-location' ),
			),
			'tove/restaurant-menu' => array(
				'title'         => esc_html__( 'Restaurant menu with a header and columns for three different menu sections.', 'tove' ),
				'categories'    => array( 'tove-restaurant' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'restaurant-menu' ),
			),
			'tove/restaurant-menu-row' => array(
				'title'         => esc_html__( 'A row with three columns for the restaurant menu.', 'tove' ),
				'categories'    => array( 'tove-restaurant' ),
				'viewportWidth' => 1180,
				'content'       => tove_get_block_pattern_markup( 'restaurant-menu-row' ),
			),
			'tove/restaurant-opening-hours-table' => array(
				'title'         => esc_html__( 'A table with opening hours.', 'tove' ),
				'categories'    => array( 'tove-restaurant' ),
				'viewportWidth' => 288,
				'content'       => tove_get_block_pattern_markup( 'restaurant-opening-hours-table' ),
			),
			'tove/restaurant-pricing-table' => array(
				'title'         => esc_html__( 'Pricing table with three tiers.', 'tove' ),
				'categories'    => array( 'tove-restaurant' ),
				'viewportWidth' => 1312,
				'content'       => tove_get_block_pattern_markup( 'restaurant-pricing-table' ),
			),
		) );

		// Register block patterns.
		foreach ( $tove_block_patterns as $slug => $settings ) {
			register_block_pattern( $slug, $settings );
		}
	
	}
	add_action( 'init', 'tove_register_block_patterns' );
endif;


/*	-----------------------------------------------------------------------------------------------
	GET BLOCK PATTERN MARKUP
	Returns the markup of the block pattern at the specified theme path.
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'tove_get_block_pattern_markup' ) ) : 
	function tove_get_block_pattern_markup( $pattern_name ) {

		$path = 'inc/block-patterns/' . $pattern_name . '.php';

		if ( ! locate_template( $path ) ) return;

		ob_start();
		include( locate_template( $path ) );
		return ob_get_clean();

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

		// Columns: No Gutters
		register_block_style( 'core/columns', array(
			'name'  	=> 'tove-no-gutters',
			'label' 	=> esc_html__( 'No Gutters', 'tove' ),
		) );

		// Columns: Separators
		register_block_style( 'core/columns', array(
			'name'  	=> 'tove-horizontal-separators',
			'label' 	=> esc_html__( 'Horizontal Separators', 'tove' ),
		) );

		// Query Pagination: Vertical separators
		register_block_style( 'core/query-pagination', array(
			'name'  	=> 'tove-vertical-separators',
			'label' 	=> esc_html__( 'Vertical Separators', 'tove' ),
		) );

		// Table: Vertical borders
		register_block_style( 'core/table', array(
			'name'  	=> 'tove-vertical-borders',
			'label' 	=> esc_html__( 'Vertical Borders', 'tove' ),
		) );
		
	}
	add_action( 'init', 'tove_register_block_styles' );
endif;

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

		// viewportWidth values, determining the width of the preview in the Block Patterns drawer.
		$viewport = apply_filters( 'tove_block_patterns_viewport', array(
			'full'			=> 1440,
			'wide'			=> 1312,
			'wide_grouped'	=> 1180,
			'content'		=> 640
		) );

		// The block patterns included in Tove.
		$tove_block_patterns = apply_filters( 'tove_block_patterns', array(

			/* BLOG */

			'tove/blog-grid-compact-cols-3' => array(
				'title'         => esc_html__( 'Three column grid with featured image, title, and post date', 'tove' ),
				'categories'    => array( 'tove-blog' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'blog/blog-grid-compact-cols-3' ),
			),
			'tove/blog-list' => array(
				'title'         => esc_html__( 'List with featured image, title, excerpt, and post date.', 'tove' ),
				'categories'    => array( 'tove-blog' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'blog/blog-list' ),
			),
			'tove/blog-list-compact' => array(
				'title'         => esc_html__( 'Compact list with title and post date.', 'tove' ),
				'categories'    => array( 'tove-blog' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'blog/blog-list-compact' ),
			),
			'tove/blog-list-compact-media' => array(
				'title'         => esc_html__( 'Compact list with featured image, title, and post date.', 'tove' ),
				'categories'    => array( 'tove-blog' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'blog/blog-list-compact-media' ),
			),

			/* CALL TO ACTION */

			'tove/cta-horizontal' => array(
				'title'         => esc_html__( 'Horizontal call to action.', 'tove' ),
				'categories'    => array( 'tove-cta' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'cta/cta-horizontal' ),
			),
			'tove/cta-vertical' => array(
				'title'         => esc_html__( 'Vertical call to action.', 'tove' ),
				'categories'    => array( 'tove-cta' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'cta/cta-vertical' ),
			),

			/* FOOTER */

			'tove/footer-horizontal' => array(
				'title'         => esc_html__( 'Footer with site title and theme credit in a centered paragraph. This is the default footer in the theme.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'footer/footer-horizontal' ),
			),
			'tove/footer-horizontal-social' => array(
				'title'         => esc_html__( 'Footer with site title, theme credit and social icons.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'footer/footer-horizontal-social' ),
			),
			'tove/footer-horizontal-columns-1' => array(
				'title'         => esc_html__( 'Footer with site title, menu, opening hours and contact information in four columns.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'footer/footer-horizontal-columns-1' ),
			),
			'tove/footer-horizontal-columns-2' => array(
				'title'         => esc_html__( 'Footer with site title, menu, opening hours, contact information and social icons in two columns.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'footer/footer-horizontal-columns-2' ),
			),
			'tove/footer-horizontal-columns-3' => array(
				'title'         => esc_html__( 'Footer with site title, information blocks for two business locations, menu and social icons.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'footer/footer-horizontal-columns-3' ),
			),
			'tove/footer-horizontal-columns-4' => array(
				'title'         => esc_html__( 'Footer with site title, contact information, and two menus.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'footer/footer-horizontal-columns-4' ),
			),
			'tove/footer-stacked-centered' => array(
				'title'         => esc_html__( 'Footer with site title, theme credit and social icons stacked and centered.', 'tove' ),
				'categories'    => array( 'tove-footer' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'footer/footer-stacked-centered' ),
			),

			/* GENERAL */

			'tove/general-faq' => array(
				'title'         => esc_html__( 'Frequently Asked Questions (FAQ) section.', 'tove' ),
				'categories'    => array( 'tove-general' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'general/general-faq' ),
			),
			'tove/general-feature-large' => array(
				'title'         => esc_html__( 'Full-width feature section with headings, text, and buttons.', 'tove' ),
				'categories'    => array( 'tove-general' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'general/general-feature-large' ),
			),
			'tove/general-follow-us-vertical' => array(
				'title'         => esc_html__( 'Follow us section with a vertical layout.', 'tove' ),
				'categories'    => array( 'tove-general' ),
				'viewportWidth' => $viewport['content'],
				'content'       => tove_get_block_pattern_markup( 'general/general-follow-us-vertical' ),
			),
			'tove/general-follow-us-horizontal' => array(
				'title'         => esc_html__( 'Follow us section with a horizontal layout.', 'tove' ),
				'categories'    => array( 'tove-general' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'general/general-follow-us-horizontal' ),
			),
			'tove/general-information-banner' => array(
				'title'         => esc_html__( 'Information banner.', 'tove' ),
				'categories'    => array( 'tove-general' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'general/general-information-banner' ),
			),
			'tove/general-media-text-button' => array(
				'title'         => esc_html__( 'Media and text with button.', 'tove' ),
				'categories'    => array( 'tove-general' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'general/general-media-text-button' ),
			),
			'tove/general-previews-featured' => array(
				'title'         => esc_html__( 'Large featured section for the latest sticky post on the site.', 'tove' ),
				'categories'    => array( 'tove-general' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'general/general-previews-featured' ),
			),
			'tove/general-previews-columns' => array(
				'title'         => esc_html__( 'Latest news section with three posts.', 'tove' ),
				'categories'    => array( 'tove-general' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'general/general-previews-columns' ),
			),
			'tove/general-previews-columns-small' => array(
				'title'         => esc_html__( 'Compact latest news section with three posts.', 'tove' ),
				'categories'    => array( 'tove-general' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'general/general-previews-columns-small' ),
			),
			'tove/general-pricing-table' => array(
				'title'         => esc_html__( 'Pricing table with three tiers.', 'tove' ),
				'categories'    => array( 'tove-general' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'general/general-pricing-table' ),
			),
			'tove/general-testimonials-columns' => array(
				'title'         => esc_html__( 'Testimonials section with three quotes.', 'tove' ),
				'categories'    => array( 'tove-general', 'tove-restaurant' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'general/general-testimonials-columns' ),
			),

			/* HEADER */

			'tove/header-horizontal' => array(
				'title'         => esc_html__( 'Header with site title and a menu. This is the default header in the theme.', 'tove' ),
				'categories'    => array( 'tove-header' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'header/header-horizontal' ),
			),
			'tove/header-horizontal-button' => array(
				'title'         => esc_html__( 'Header with site title, a menu and buttons.', 'tove' ),
				'categories'    => array( 'tove-header' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'header/header-horizontal-button' ),
			),
			'tove/header-horizontal-social' => array(
				'title'         => esc_html__( 'Header with site title, a menu and social icons.', 'tove' ),
				'categories'    => array( 'tove-header' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'header/header-horizontal-social' ),
			),
			'tove/header-horizontal-double' => array(
				'title'         => esc_html__( 'Header with opening hours, button, site title and a menu.', 'tove' ),
				'categories'    => array( 'tove-header' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'header/header-horizontal-double' ),
			),
			'tove/header-horizontal-double-deluxe' => array(
				'title'         => esc_html__( 'Header with opening hours, site title, social icons, a menu and a Call us button.', 'tove' ),
				'categories'    => array( 'tove-header' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'header/header-horizontal-double-deluxe' ),
			),
			'tove/header-stacked-centered' => array(
				'title'         => esc_html__( 'Header with site title, a menu and social icons stacked and centered.', 'tove' ),
				'categories'    => array( 'tove-header' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'header/header-stacked-centered' ),
			),

			/* HERO */

			'tove/hero-cover' => array(
				'title'         => esc_html__( 'Hero with a background image, a heading and buttons.', 'tove' ),
				'categories'    => array( 'tove-hero' ),
				'viewportWidth' => $viewport['full'],
				'content'       => tove_get_block_pattern_markup( 'hero/hero-cover' ),
			),
			'tove/hero-cover-group-bg' => array(
				'title'         => esc_html__( 'Hero with a background image and a heading, paragraph of text, and buttons.', 'tove' ),
				'categories'    => array( 'tove-hero' ),
				'viewportWidth' => $viewport['full'],
				'content'       => tove_get_block_pattern_markup( 'hero/hero-cover-group-bg' ),
			),
			'tove/hero-text' => array(
				'title'         => esc_html__( 'Hero with headings, a paragraph of text, and buttons.', 'tove' ),
				'categories'    => array( 'tove-hero' ),
				'viewportWidth' => $viewport['content'],
				'content'       => tove_get_block_pattern_markup( 'hero/hero-text' ),
			),
			'tove/hero-text-displaced' => array(
				'title'         => esc_html__( 'Hero with a large heading to the left and text to the right.', 'tove' ),
				'categories'    => array( 'tove-hero' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'hero/hero-text-displaced' ),
			),

			/* RESTAURANT */

			'tove/restaurant-featured-dish' => array(
				'title'         => esc_html__( 'Promotional section for a featured dish.', 'tove' ),
				'categories'    => array( 'tove-restaurant' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'restaurant/restaurant-featured-dish' ),
			),
			'tove/restaurant-location' => array(
				'title'         => esc_html__( 'Information block for a restaurant or café location.', 'tove' ),
				'categories'    => array( 'tove-restaurant' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'restaurant/restaurant-location' ),
			),
			'tove/restaurant-menu' => array(
				'title'         => esc_html__( 'Restaurant menu with columns for three different menu sections.', 'tove' ),
				'categories'    => array( 'tove-restaurant' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'restaurant/restaurant-menu' ),
			),
			'tove/restaurant-menu-row' => array(
				'title'         => esc_html__( 'A row with three columns for the restaurant menu.', 'tove' ),
				'categories'    => array( 'tove-restaurant' ),
				'viewportWidth' => $viewport['wide_grouped'],
				'content'       => tove_get_block_pattern_markup( 'restaurant/restaurant-menu-row' ),
			),
			'tove/restaurant-opening-hours-table' => array(
				'title'         => esc_html__( 'A table with opening hours.', 'tove' ),
				'categories'    => array( 'tove-restaurant' ),
				'viewportWidth' => $viewport['content'],
				'content'       => tove_get_block_pattern_markup( 'restaurant/restaurant-opening-hours-table' ),
			),
			'tove/restaurant-reservation-big' => array(
				'title'         => esc_html__( 'A really big button for reservations.', 'tove' ),
				'categories'    => array( 'tove-restaurant' ),
				'viewportWidth' => $viewport['wide'],
				'content'       => tove_get_block_pattern_markup( 'restaurant/restaurant-reservation-big' ),
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

		// Table: Vertical borders
		register_block_style( 'core/table', array(
			'name'  	=> 'tove-vertical-borders',
			'label' 	=> esc_html__( 'Vertical Borders', 'tove' ),
		) );
		
	}
	add_action( 'init', 'tove_register_block_styles' );
endif;

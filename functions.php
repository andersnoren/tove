<?php

if ( ! function_exists( 'tove_setup' ) ) {
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
			'./assets/css/blocks.css',
			'./assets/css/style-shared.css'
		) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for custom units.
		add_theme_support( 'custom-units' );
	}
}
add_action( 'after_setup_theme', 'tove_setup' );


if ( ! function_exists( 'tove_styles' ) ) {
	function tove_styles() {

		wp_enqueue_style( 'tove-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
		wp_enqueue_style( 'tove-shared-styles', get_template_directory_uri() . '/assets/css/style-shared.css', wp_get_theme()->get( 'Version' ) );
		wp_enqueue_style( 'tove-block-styles', get_template_directory_uri() . '/assets/css/blocks.css', wp_get_theme()->get( 'Version' ) );
		wp_enqueue_style( 'tove-google-fonts', '//fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;0,700;1,500;1,700&display=swap' );


	}
	add_action( 'wp_enqueue_scripts', 'tove_styles', 1 );
}


// Block Patterns.
// require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
// require get_template_directory() . '/inc/block-styles.php';

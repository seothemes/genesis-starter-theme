<?php
/**
 * Genesis Starter.
 *
 * This file adds the default functionality to the Genesis Starter theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Set Localization (do not remove).
load_child_theme_textdomain( 'genesis-starter', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'genesis-starter' ) );

/**
 * Theme constants.
 *
 * @since 1.4.0
 */
// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'genesis-starter' );
define( 'CHILD_THEME_URL', 'http://www.seothemes.net/' );
define( 'CHILD_THEME_VERSION', '1.4.0' );

/**
 * Theme assets.
 *
 * @since 1.4.0
 */
function starter_enqueue_scripts_styles() {

	// Google fonts.
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto', array(), CHILD_THEME_VERSION );

	// Custom JS.
	wp_enqueue_script( 'genesis-starter', get_stylesheet_directory_uri() . '/js/min/starter.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Backstretch.
	wp_enqueue_script( 'backstretch', get_stylesheet_directory_uri() . '/js/min/backstretch.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'starter_enqueue_scripts_styles' );

/**
 * Theme supports.
 *
 * @since 1.4.0
 */

// Enable HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Enable Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Enable responsive viewport.
add_theme_support( 'genesis-responsive-viewport' );

// Enable automatic output of WordPress title tags.
add_theme_support( 'title-tag' );

// Enable selective refresh and Customizer edit icons.
add_theme_support( 'customize-selective-refresh-widgets' );

// Enable theme support for custom background image.
add_theme_support( 'custom-background' );

// Enable theme support for hero section.
add_theme_support( 'hero' );

// Enable theme support for custom header background image.
add_theme_support( 'custom-header', array(
	'header-selector' 	=> '.hero',
	'header_image'    	=> get_stylesheet_directory_uri() . '/images/hero.jpg',
	'header-text'     	=> false,
	'width'           	=> 1600,
	'height'          	=> 1200,
	'flex-height'     	=> true,
	'flex-width'		=> true,
	'wp-head-callback'	=> 'starter_custom_header',
) );

// Disable support for structural wraps except for menus and site inner.
add_theme_support( 'genesis-structural-wraps', array(
	'menu-primary',
	'menu-secondary',
	'site-inner',
) );

// Enable Logo option in Customizer > Site Identity.
add_theme_support( 'custom-logo', array(
	'height'      => 50,
	'width'       => 200,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( '.site-title', '.site-description' ),
) );

/**
 * Display the custom logo if one is set.
 */
function starter_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
add_action( 'genesis_site_title', 'starter_custom_logo', 0 );

// Enable excerpts on pages. This is just handy.
add_post_type_support( 'page', 'excerpt' );

/**
 * Custom theme features.
 *
 * Enable the custom theme features for the Genesis Starter theme.
 * The following are optional and can be removed or commented out
 * if functionality is not required.
 *
 * @since 1.4.0
 */
add_theme_support( 'clean-up' );
add_theme_support( 'hero-section' );
add_theme_support( 'custom-colors' );
add_theme_support( 'front_page_content' );
add_theme_support( 'widget-areas' );
add_theme_support( 'require-plugins' );
add_theme_support( 'compression' );

/**
 * Load theme files and features.
 *
 * @since 1.4.0
 */

// Theme defaults.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Clean up.
include_once( get_stylesheet_directory() . '/lib/clean-up.php' );

// Custom colors.
include_once( get_stylesheet_directory() . '/lib/custom-colors.php' );

// Widget areas.
include_once( get_stylesheet_directory() . '/lib/widget-areas.php' );

// Hero section.
include_once( get_stylesheet_directory() . '/lib/hero-section.php' );

// Required plugins.
include_once( get_stylesheet_directory() . '/lib/class-require-plugins.php' );

// HTML, CSS and JS compression.
include_once( get_stylesheet_directory() . '/lib/class-compression.php' );

<?php
/**
 * Genesis Starter Theme
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

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'genesis-starter' );
define( 'CHILD_THEME_URL', 'http://www.seothemes.net/' );
define( 'CHILD_THEME_VERSION', '1.3.1' );

/**
 * Enqueue Scripts and Styles.
 */
function starter_enqueue_scripts_styles() {

	// Google fonts.
	wp_enqueue_style( 'google-fonts', "//fonts.googleapis.com/css?family=Roboto", array(), CHILD_THEME_VERSION );

	// Load dashicons for front-end usage.
	wp_enqueue_style( 'dashicons' );

	// Minified custom scripts.
	wp_enqueue_script( 'genesis-starter', get_stylesheet_directory_uri() . '/js/min/starter.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'starter_enqueue_scripts_styles' );

/**
 * Emulate hover effects on mobile devices.
 *
 * @param  string $attributes On touch start attribute.
 * @return string
 */
function starter_add_ontouchstart( $attributes ) {
	$attributes['ontouchstart'] = ' ';
	return $attributes;
}
add_filter( 'genesis_attr_body', 'starter_add_ontouchstart' );

/**
 * Add CSS class of the post name to the body element for styling.
 *
 * @param  string $classes Body classes.
 * @return string
 */
function starter_page_body_class( $classes ) {
	global $post;
	if ( $post && 'page' === $post->post_type ) {
		$classes[] = $post->post_name . '-page';
	}
	return $classes;
}
add_filter( 'body_class', 'starter_page_body_class' );

/**
 * Theme Supports.
 *
 * Please note that this theme uses the custom-logo theme feature for displaying
 * a logo instead of the custom-header like most Genesis child themes.
 * This allows the custom-header image to be used for another purpose,
 * such as a hero or feature image at the top of a page.
 *
 * This theme does not include support for default Genesis Footer Widgets,
 * instead we recommend creating a footer widget area in widget-areas.php
 * which can then make use of the flexible widgets.
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

// Enable theme support for custom header background image.
add_theme_support( 'custom-header', array(
	'header-selector' => '.site-header',
	'header_image'    => get_stylesheet_directory_uri() . '/images/header.jpg',
	'header-text'     => false,
	'width'           => 1600,
	'height'          => 1200,
	'flex-height'     => true,
	'flex-width'      => true,
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

/**
 * Theme Extras.
 *
 * The following lines can be commented out if not required.
 * Commenting out these lines will not break your theme, but it
 * may cause it to look different to the Genesis Starter Demo.
 *
 * Available options are:
 *
 * - Clean Up
 * - Customizer
 * - Widget Areas
 * - Hero Section
 * - Compression
 */

// Remove unused/unnecessary features.
include_once( get_stylesheet_directory() . '/lib/clean-up.php' );

// Add default theme settings.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Add theme helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Customizer color & font settings.
include_once( get_stylesheet_directory() . '/lib/customizer.php' );

// Ouput Customizer color & font settings.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add Widget Areas.
include_once( get_stylesheet_directory() . '/lib/widget-areas.php' );

// Create a Hero section.
include_once( get_stylesheet_directory() . '/lib/hero-section.php' );

// Add Require Plugins.
include_once( get_stylesheet_directory() . '/lib/class-plugin-activation.php' );

// Compress HTML, inline CSS and inline JS.
include_once( get_stylesheet_directory() . '/lib/class-theme-compression.php' );

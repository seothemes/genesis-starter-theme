<?php
/**
 * Genesis Starter.
 *
 * This file adds the default functionality to the Genesis Starter
 * theme. It includes the following:
 * - theme setup
 * - theme constants
 * - theme supports
 * - theme includes
 * - theme assets
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

/**
 * Theme setup.
 */
// Start the engine (do not remove).
include_once( get_template_directory() . '/lib/init.php' );

// Set Localization (do not remove).
load_child_theme_textdomain( 'genesis-starter', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'genesis-starter' ) );

/**
 * Theme constants.
 */
// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'genesis-starter' );
define( 'CHILD_THEME_URL', 'http://www.seothemes.net/' );
define( 'CHILD_THEME_VERSION', '1.5.0' );

/**
 * Theme features.
 */
// Enable responsive viewport.
add_theme_support( 'genesis-responsive-viewport' );

// Enable automatic output of WordPress title tags.
add_theme_support( 'title-tag' );

// Enable selective refresh and Customizer edit icons.
add_theme_support( 'customize-selective-refresh-widgets' );

// Enable theme support for custom background image.
add_theme_support( 'custom-background' );

// Enable theme clean up.
add_theme_support( 'clean-up' );

// Enable hero section.
add_theme_support( 'hero-section' );

// Enable customizer settings.
add_theme_support( 'customize' );

// Enable custom widget areas.
add_theme_support( 'widget-areas' );

// Enable WooCommerce support.
add_theme_support( 'woocommerce' );

// Enable HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Enable Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus' , array(
	'primary' => __( 'Header Menu', 'genesis-starter' ),
	'secondary' => __( 'After Header Menu', 'genesis-starter' ),
) );

// Remove unused structural wraps.
add_theme_support( 'genesis-structural-wraps', array(
	'menu-primary',
	'menu-secondary',
	'site-inner',
	'footer',
) );

// Enable Logo option in Customizer > Site Identity.
add_theme_support( 'custom-logo', array(
	'height'      => 60,
	'width'       => 200,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( '.site-title', '.site-description' ),
) );

// Enable theme support for custom header background image.
add_theme_support( 'custom-header', array(
	'header-selector' 	=> '.hero',
	'header_image'    	=> get_stylesheet_directory_uri() . '/assets/images/hero.jpg',
	'header-text'     	=> false,
	'width'           	=> 1920,
	'height'          	=> 1080,
	'flex-height'     	=> true,
	'flex-width'		=> true,
	'video'				=> true,
	'wp-head-callback'	=> 'starter_custom_header',
) );

/**
 * Theme includes.
 */
// Load theme defaults.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Load one click demo import.
include_once( get_stylesheet_directory() . '/lib/demo-import.php' );

// Load header functions.
include_once( get_stylesheet_directory() . '/lib/header-functions.php' );

// Load required plugins.
include_once( get_stylesheet_directory() . '/lib/classes/class-require-plugins.php' );

// Load hero section.
require_if_theme_supports( 'hero-section', get_stylesheet_directory() . '/lib/classes/class-genesis-hero.php' );

// Load customizer settings.
require_if_theme_supports( 'customize', get_stylesheet_directory() . '/lib/customize/customize.php' );

// Load clean up functions.
require_if_theme_supports( 'clean-up', get_stylesheet_directory() . '/lib/clean-up/clean.php' );

// Load custom widget areas.
require_if_theme_supports( 'widget-areas', get_stylesheet_directory() . '/lib/widget-areas.php' );

// Load WooCommerce setup.
require_if_theme_supports( 'woocommerce', get_stylesheet_directory() . '/lib/woocommerce.php' );

/**
 * Theme assets.
 */
function starter_enqueue_scripts_styles() {

	// Google fonts.
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Muli:400,600', array(), CHILD_THEME_VERSION );

	// Enqueue scripts.
	wp_enqueue_script( 'genesis-starter', get_stylesheet_directory_uri() . '/assets/scripts/min/starter.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'starter_enqueue_scripts_styles' );

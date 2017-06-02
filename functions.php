<?php
/**
 * Genesis Starter Theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/themes/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// Child theme (do not remove).
include_once( get_template_directory() . '/lib/init.php' );

// Set Localization (do not remove).
load_child_theme_textdomain( 'starter', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'starter' ) );

// Theme constants.
define( 'CHILD_THEME_NAME', 'starter' );
define( 'CHILD_THEME_URL', 'http://www.seothemes.net/themes/genesis-starter' );
define( 'CHILD_THEME_VERSION', '1.6.0' );

// Remove unused functionality.
unregister_sidebar( 'sidebar' );
unregister_sidebar( 'sidebar-alt' );
unregister_sidebar( 'header-right' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Enable support for structural wraps.
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'menu-primary',
	'menu-secondary',
	'site-inner',
	'footer-widgets',
	'footer',
) );

// Enable Accessibility support.
add_theme_support( 'genesis-accessibility', array(
	'404-page',
	'drop-down-menu',
	'headings',
	'rems',
	'search-form',
	'skip-links',
) );

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus' , array(
	'primary' => __( 'Primary Menu', 'starter' ),
	'secondary' => __( 'Secondary Menu', 'starter' ),
) );

// Enable HTML5 markup structure.
add_theme_support( 'html5', array(
	'caption',
	'comment-form',
	'comment-list',
	'gallery',
	'search-form',
) );

// Add support for post formats.
add_theme_support( 'post-formats', array(
	'aside',
	'audio',
	'chat',
	'gallery',
	'image',
	'link',
	'quote',
	'status',
	'video',
) );

// Enable support for post thumbnails.
add_theme_support( 'post-thumbnails' );

// Enable automatic output of WordPress title tags.
add_theme_support( 'title-tag' );

// Enable selective refresh and Customizer edit icons.
add_theme_support( 'customize-selective-refresh-widgets' );

// Enable theme support for custom background image.
add_theme_support( 'custom-background' );

// Enable logo option in Customizer > Site Identity.
add_theme_support( 'custom-logo', array(
	'height'      => 60,
	'width'       => 200,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( '.site-title', '.site-description' ),
) );
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Enable support for custom header image or video.
add_theme_support( 'custom-header', array(
	'header-selector' 	=> '.front-page-1',
	'default_image'    	=> get_stylesheet_directory_uri() . '/assets/images/hero.jpg',
	'header-text'     	=> false,
	'width'           	=> 1920,
	'height'          	=> 1080,
	'flex-height'     	=> true,
	'flex-width'		=> true,
	'video'				=> true,
) );

// Register default header (just in case).
register_default_headers( array(
	'child' => array(
		'url'           => '%2$s/assets/images/hero.jpg',
		'thumbnail_url' => '%2$s/assets/images/hero.jpg',
		'description'   => __( 'Hero Image', 'starter' ),
	),
) );

// Add support for page excerpts.
add_post_type_support( 'page', 'excerpt' );

// Reposition navigation menus.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 10 );

/**
 * Enable features from Soil plugin if active.
 *
 * @link https://roots.io/plugins/soil/.
 *
 * If using Google Analytics, uncomment the following line and
 * replace `YOUR-GA-CODE` with your own unique tracking code:
 * add_theme_support( 'soil-google-analytics', 'YOUR-GA-CODE' );
 */
add_theme_support( 'soil-clean-up' );
add_theme_support( 'soil-disable-asset-versioning' );
add_theme_support( 'soil-disable-trackbacks' );
add_theme_support( 'soil-jquery-cdn' );
add_theme_support( 'soil-js-to-footer' );
add_theme_support( 'soil-nav-walker' );
add_theme_support( 'soil-nice-search' );
add_theme_support( 'soil-relative-urls' );

/**
 * Enqueue theme scripts and styles.
 */
function starter_scripts_styles() {

	// Remove default stylesheet.
	wp_deregister_style( 'starter' );
	wp_dequeue_style( 'starter' );

	// Register minified child theme stylesheet.
	wp_register_style( 'starter', get_stylesheet_directory_uri() . '/style.min.css', array(), CHILD_THEME_VERSION );

	// Enqueue minified stylesheet at late priority.
	add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 999 );

	// Google fonts.
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );

	// Fontawesome icons.
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );

	// Theme scripts.
	wp_enqueue_script( 'starter', get_stylesheet_directory_uri() . '/assets/scripts/scripts.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'starter_scripts_styles' );

// Load theme defaults.
include_once( get_stylesheet_directory() . '/includes/theme-defaults.php' );

// Load helper functions.
include_once( get_stylesheet_directory() . '/includes/helper-functions.php' );

// Load cleaner gallery class.
include_once( get_stylesheet_directory() . '/includes/class-clean-gallery.php' );

// Load TGM plugin activation.
include_once( get_stylesheet_directory() . '/includes/class-plugin-activation.php' );

// Load theme widget areas.
include_once( get_stylesheet_directory() . '/includes/widget-areas.php' );

// Load customizer controls and settings.
include_once( get_stylesheet_directory() . '/includes/customizer-settings.php' );

// Load customizer output functionality.
include_once( get_stylesheet_directory() . '/includes/customizer-output.php' );

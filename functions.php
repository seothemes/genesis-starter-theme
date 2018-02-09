<?php
/**
 * Genesis Starter Theme.
 *
 * @package      GenesisStarter
 * @link         https://seothemes.com/themes/genesis-starter
 * @author       SEO Themes
 * @copyright    Copyright © 2017 SEO Themes
 * @license      GPL-2.0+
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

// Child theme (do not remove).
include_once( get_template_directory() . '/lib/init.php' );

// Define theme constants.
define( 'CHILD_THEME_NAME', 'Genesis Starter' );
define( 'CHILD_THEME_URL', 'https://seothemes.com/themes/genesis-starter' );
define( 'CHILD_THEME_VERSION', '2.2.7' );

// Set Localization (do not remove).
load_child_theme_textdomain( 'genesis-starter', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'genesis-starter' ) );

// Remove secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Remove unused site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Enable support for page excerpts.
add_post_type_support( 'page', 'excerpt' );

// Enable shortcodes in text widgets.
add_filter( 'widget_text', 'do_shortcode' );

// Enable support for WooCommerce and WooCommerce features.
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// Enable support for structural wraps.
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'menu-primary',
	'menu-secondary',
	'footer-widgets',
	'footer',
) );

// Enable support for Accessibility enhancements.
add_theme_support( 'genesis-accessibility', array(
	'404-page',
	'drop-down-menu',
	'headings',
	'rems',
	'search-form',
	'skip-links',
) );

// Enable support for custom navigation menus.
add_theme_support( 'genesis-menus' , array(
	'primary'   => __( 'Header Menu', 'genesis-starter' ),
	'secondary' => __( 'After Header Menu', 'genesis-starter' ),
) );

// Enable support for viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Enable support for Genesis footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Enable support for Gutenberge wide images.
add_theme_support( 'gutenberg', array(
	'wide-images' => true,
) );

// Enable support for default posts and comments RSS feed links.
add_theme_support( 'automatic-feed-links' );

// Enable support for HTML5 markup structure.
add_theme_support( 'html5', array(
	'caption',
	'comment-form',
	'comment-list',
	'gallery',
	'search-form',
) );

// Enable support for post formats.
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

// Enable support for selective refresh and Customizer edit icons.
add_theme_support( 'customize-selective-refresh-widgets' );

// Enable support for custom background image.
add_theme_support( 'custom-background', array(
	'default-color' => 'f4f5f6',
) );

// Enable support for logo option in Customizer > Site Identity.
add_theme_support( 'custom-logo', array(
	'height'      => 60,
	'width'       => 240,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( '.site-title', '.site-description' ),
) );

// Display custom logo in site title area.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Enable support for custom header image or video.
add_theme_support( 'custom-header', array(
	'header-selector'    => '.hero',
	'default_image'      => get_stylesheet_directory_uri() . '/assets/images/hero.jpg',
	'header-text'        => true,
	'default-text-color' => '30353a',
	'width'              => 1920,
	'height'             => 1080,
	'flex-height'        => true,
	'flex-width'         => true,
	'uploads'            => true,
	'video'              => true,
	'wp-head-callback'   => 'genesis_starter_custom_header',
) );

// Register default header (just in case).
register_default_headers( array(
	'child' => array(
		'url'           => '%2$s/assets/images/hero.jpg',
		'thumbnail_url' => '%2$s/assets/images/hero.jpg',
		'description'   => __( 'Hero Image', 'genesis-starter' ),
	),
) );

// Register a custom layout.
genesis_register_layout( 'custom-layout', array(
	'label' => __( 'Custom Layout', 'genesis-starter' ),
	'img'   => get_stylesheet_directory_uri() . '/assets/images/custom-layout.gif',
) );

// Change order of main stylesheet to override plugin styles.
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 99 );

// Reposition primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_after_title_area', 'genesis_do_nav' );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_after_header_wrap', 'genesis_do_subnav' );

// Reposition footer widgets inside site footer.
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
add_action( 'genesis_before_footer_wrap', 'genesis_footer_widget_areas', 5 );

add_action( 'wp_enqueue_scripts', 'genesis_starter_scripts_styles', 99 );
/**
 * Enqueue theme scripts and styles.
 *
 * @return void
 */
function genesis_starter_scripts_styles() {

	// Remove Simple Social Icons CSS (included with theme).
	wp_dequeue_style( 'simple-social-icons-font' );

	// Google fonts.
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );

	// Conditionally load WooCommerce styles.
	if ( genesis_starter_is_woocommerce_page() ) {

		wp_enqueue_style( 'genesis-starter-woocommerce', get_stylesheet_directory_uri() . '/assets/styles/min/woocommerce.min.css', array(), CHILD_THEME_VERSION );

	}

	// Check if debugging is enabled.
	$suffix = defined( SCRIPT_DEBUG ) && SCRIPT_DEBUG ? '' : 'min.';
	$folder = defined( SCRIPT_DEBUG ) && SCRIPT_DEBUG ? '' : 'min/';

	// Enqueue responsive menu script.
	wp_enqueue_script( 'genesis-starter', get_stylesheet_directory_uri() . '/assets/scripts/' . $folder . 'scripts.' . $suffix . 'js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Localize responsive menu script.
	wp_localize_script( 'genesis-starter', 'genesis_responsive_menu', array(
		'mainMenu'         => __( 'Menu', 'genesis-starter' ),
		'subMenu'          => __( 'Menu', 'genesis-starter' ),
		'menuIconClass'    => null,
		'subMenuIconClass' => null,
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
				'.nav-secondary',
			),
		),
	) );
}

// Load helper functions.
include_once( get_stylesheet_directory() . '/includes/helpers.php' );

// Load miscellaneous functions.
include_once( get_stylesheet_directory() . '/includes/extras.php' );

// Load widget areas.
include_once( get_stylesheet_directory() . '/includes/widgets.php' );

// Load page header.
include_once( get_stylesheet_directory() . '/includes/header.php' );

// Load Customizer settings.
include_once( get_stylesheet_directory() . '/includes/customize.php' );

// Load default settings.
include_once( get_stylesheet_directory() . '/includes/defaults.php' );

// Load recommended plugins.
include_once( get_stylesheet_directory() . '/includes/plugins.php' );

<?php
/**
 * Genesis Starter Theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.com/themes/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
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
define( 'CHILD_THEME_VERSION', '2.2.2' );

// Set Localization (do not remove).
load_child_theme_textdomain( 'genesis-starter', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'genesis-starter' ) );

// Remove secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Remove unused site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Remove default titles.
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
remove_action( 'genesis_before_loop', 'genesis_do_blog_template_heading' );
remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
remove_action( 'genesis_before_loop', 'genesis_do_search_title' );

// Add custom titles.
add_action( 'genesis_after_header', 'genesis_do_posts_page_heading', 24 );
add_action( 'genesis_after_header', 'genesis_do_date_archive_title', 24 );
add_action( 'genesis_after_header', 'genesis_do_blog_template_heading', 24 );
add_action( 'genesis_after_header', 'genesis_do_taxonomy_title_description', 24 );
add_action( 'genesis_after_header', 'genesis_do_author_title_description', 24 );
add_action( 'genesis_after_header', 'genesis_do_cpt_archive_title_description', 24 );

// Remove search results and shop page titles.
add_filter( 'woocommerce_show_page_title', '__return_null' );
add_filter( 'genesis_search_title_output', '__return_false' );

// Change order of main stylesheet to override plugin styles.
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 99 );

// Reposition primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_after_header_wrap', 'genesis_do_subnav' );

// Reposition footer widgets inside site footer.
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
add_action( 'genesis_before_footer_wrap', 'genesis_footer_widget_areas', 5 );

// Enable shortcodes in text widgets.
add_filter( 'widget_text', 'do_shortcode' );

// Force Gravity Forms to disable CSS output.
add_filter( 'pre_option_rg_gforms_disable_css', '__return_true' );

// Enable support for page excerpts.
add_post_type_support( 'page', 'excerpt' );

// Enable support for WooCommerce.
add_theme_support( 'woocommerce' );

// Enable support for structural wraps.
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'menu-primary',
	'menu-secondary',
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

// Enable custom navigation menus.
add_theme_support( 'genesis-menus' , array(
	'primary'   => __( 'Header Menu', 'genesis-starter' ),
	'secondary' => __( 'After Header Menu', 'genesis-starter' ),
) );

// Enable viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Enable footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Enable HTML5 markup structure.
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

// Enable automatic output of WordPress title tags.
add_theme_support( 'title-tag' );

// Enable selective refresh and Customizer edit icons.
add_theme_support( 'customize-selective-refresh-widgets' );

// Enable theme support for custom background image.
add_theme_support( 'custom-background', array(
	'default-color' => 'f4f5f6',
) );

// Enable logo option in Customizer > Site Identity.
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
	'wp-head-callback'   => 'starter_custom_header_callback',
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

// Register front page widget areas.
genesis_register_sidebar( array(
	'id'           => 'front-page-1',
	'name'         => __( 'Front Page 1', 'genesis-starter' ),
	'description'  => __( 'Front page 1 widget area.', 'genesis-starter' ),
	'before_title' => '<h1 itemprop="headline">',
	'after_title'  => '</h1>',
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-2',
	'name'        => __( 'Front Page 2', 'genesis-starter' ),
	'description' => __( 'Front page 2 widget area.', 'genesis-starter' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-3',
	'name'        => __( 'Front Page 3', 'genesis-starter' ),
	'description' => __( 'Front page 3 widget area.', 'genesis-starter' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-4',
	'name'        => __( 'Front Page 4', 'genesis-starter' ),
	'description' => __( 'Front page 4 widget area.', 'genesis-starter' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-5',
	'name'        => __( 'Front Page 5', 'genesis-starter' ),
	'description' => __( 'Front page 5 widget area.', 'genesis-starter' ),
) );

/**
 * Enqueue theme scripts and styles.
 *
 * @return void
 */
function starter_scripts_styles() {

	// Conditionally load WooCommerce styles.
	if ( starter_is_woocommerce_page() ) {
		wp_enqueue_style( 'starter-woocommerce', get_stylesheet_directory_uri() . '/assets/styles/min/woocommerce.min.css', array(), CHILD_THEME_VERSION );
	}

	// Remove Simple Social Icons CSS (included with theme).
	wp_dequeue_style( 'simple-social-icons-font' );

	// Google fonts.
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );

	// Enqueue responsive menu script.
	wp_enqueue_script( 'starter-menus', get_stylesheet_directory_uri() . '/assets/scripts/min/menus.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Localize responsive menus script.
	wp_localize_script( 'starter-menus', 'genesis_responsive_menu', array(
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
add_action( 'wp_enqueue_scripts', 'starter_scripts_styles', 999 );

// Load helper functions.
include_once( get_stylesheet_directory() . '/includes/helpers.php' );

// Load Customizer settings.
include_once( get_stylesheet_directory() . '/includes/customize.php' );

// Load default settings.
include_once( get_stylesheet_directory() . '/includes/defaults.php' );

// Load recommended plugins.
include_once( get_stylesheet_directory() . '/includes/plugins.php' );

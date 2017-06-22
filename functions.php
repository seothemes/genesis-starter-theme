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

// Define theme constants.
define( 'CHILD_THEME_NAME', 'Genesis Starter' );
define( 'CHILD_THEME_URL', 'https://seothemes.net/themes/genesis-starter' );
define( 'CHILD_THEME_VERSION', '2.0.2' );

// Set Localization (do not remove).
load_child_theme_textdomain( 'starter', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'starter' ) );

// Remove unused layouts.
unregister_sidebar( 'sidebar' );
unregister_sidebar( 'sidebar-alt' );
unregister_sidebar( 'header-right' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Remove content-sidebar-wrap.
add_filter( 'genesis_markup_content-sidebar-wrap', '__return_null' );

// Enable menu wrap only, using custom wraps for everything else.
add_theme_support( 'genesis-structural-wraps', array( 'menu-secondary' ) );

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
	'header' 	   => __( 'Header Menu', 'starter' ),
	'after-header' => __( 'After Header Menu', 'starter' ),
	'footer'	   => __( 'Footer Menu', 'starter' ),
) );

// Enable viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

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
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Enable support for custom header image or video.
add_theme_support( 'custom-header', array(
	'header-selector' 	 => '.front-page-1',
	'default_image'    	 => get_stylesheet_directory_uri() . '/assets/images/hero.jpg',
	'header-text'        => true,
	'default-text-color' => '30353a',
	'width'           	 => 1920,
	'height'          	 => 1080,
	'flex-height'     	 => true,
	'flex-width'		 => true,
	'uploads'            => true,
	'video'				 => true,
) );

// Register default header (just in case).
register_default_headers( array(
	'child' => array(
		'url'           => '%2$s/assets/images/hero.jpg',
		'thumbnail_url' => '%2$s/assets/images/hero.jpg',
		'description'   => __( 'Hero Image', 'starter' ),
	),
) );

// Enable support for page excerpts.
add_post_type_support( 'page', 'excerpt' );

/**
 * Enable features from Soil plugin if active.
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

// Enable support for Cleaner Gallery.
add_theme_support( 'cleaner-gallery' );

// Enable support for WooCommerce.
add_theme_support( 'woocommerce' );

// Force Gravity Forms to disable CSS output.
add_filter( 'pre_option_rg_gforms_disable_css', '__return_true' );

/**
 * Enqueue theme scripts and styles.
 *
 * Add any custom scripts or styles by enqueueing them inside this
 * function. It looks like there is a lot happening here but it's
 * actually pretty simple. Here's what's going on:
 *
 * - Remove Lightbox functionality if not on gallery page.
 * - Remove Simple Social Icons styles, theme includes the CSS.
 * - Remove default style.css file from loading on the front-end.
 * - Add the minified style.css version instead of the default.
 * - Add Google Fonts. Replace this with your own custom fonts.
 * - Add minified version of the responsive menu script.
 * - Add theme settings to menu script by localizing it.
 */
function starter_scripts_styles() {

	global $post;

	// Remove WP Featherlight CSS & JS if no gallery.
	if ( $post && ! has_shortcode( $post->post_content, 'gallery' ) ) {
		wp_dequeue_style( 'wp-featherlight' );
		wp_dequeue_script( 'wp-featherlight' );
	}

	// Remove Simple Social Icons CSS (included with theme).
	wp_dequeue_style( 'simple-social-icons-font' );

	// Remove default stylesheet.
	wp_deregister_style( 'genesis-starter' );
	wp_dequeue_style( 'genesis-starter' );

	// Load minified child theme stylesheet.
	wp_register_style( 'genesis-starter', get_stylesheet_directory_uri() . '/assets/styles/min/style.min.css', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'genesis-starter' );

	// Google fonts.
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );

	// Enqueue responsive menu script.
	wp_enqueue_script( 'starter-menus', get_stylesheet_directory_uri() . '/assets/scripts/min/menus.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Localize responsive menus script.
	wp_localize_script( 'starter-menus', 'genesis_responsive_menu',	array(
		'mainMenu'         => __( 'Menu', 'starter' ),
		'subMenu'          => __( 'Menu', 'starter' ),
		'menuIconClass'    => null,
		'subMenuIconClass' => null,
		'menuClasses'      => array(
			'combine' => array(
				'.nav-header',
				'.nav-after-header',
			),
		),
	) );
}
add_action( 'wp_enqueue_scripts', 'starter_scripts_styles', 999 );

// Load theme includes.
include_once( get_stylesheet_directory() . '/includes/defaults.php' );
include_once( get_stylesheet_directory() . '/includes/helpers.php' );
include_once( get_stylesheet_directory() . '/includes/menus.php' );
include_once( get_stylesheet_directory() . '/includes/sidebars.php' );
include_once( get_stylesheet_directory() . '/includes/customize.php' );
include_once( get_stylesheet_directory() . '/includes/plugins.php' );

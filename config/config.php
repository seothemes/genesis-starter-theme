<?php
/**
 * Genesis Starter Theme
 *
 * This file registers the required plugins for the Genesis Starter theme.
 *
 * @package   SEOThemes\Core
 * @link      https://github.com/seothemes/seothemes-library
 * @author    SEO Themes
 * @copyright Copyright © 2017 SEO Themes
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

return [

	/*
	|--------------------------------------------------------------------------
	| Autoload
	|--------------------------------------------------------------------------
	*/
	'autoload' => [
		'/functions',
		'/structure',
		'/shortcodes',
		'/widgets',
		'/admin',
		'/css',
		'/js',
	],

	/*
	|--------------------------------------------------------------------------
	| Colors
	|--------------------------------------------------------------------------
	*/
	'colors' => [
		'link' => [
			'hex' => '#0073e5',
			'css' => [
				'rule' => [
					'selectors'  => [
						'a',
						'entry-title a:focus',
						'entry-title a:hover',
						'genesis-nav-menu a:focus',
						'genesis-nav-menu a:hover',
						'genesis-nav-menu .current-menu-item > a',
						'genesis-nav-menu .sub-menu .current-menu-item > a:focus',
						'genesis-nav-menu .sub-menu .current-menu-item > a:hover',
						'menu-toggle:focus',
						'menu-toggle:hover',
						'sub-menu-toggle:focus',
						'sub-menu-toggle:hover',
					],
					'properties' => [
						'color',
					],
				],
			],
		],
		'accent' => [
			'hex' => '#0073e5',
			'css' => [
				'rule' => [
					'selectors'  => [
						'button:focus',
						'button:hover',
						'input[type="button"]:focus',
						'input[type="button"]:hover',
						'input[type="reset"]:focus',
						'input[type="reset"]:hover',
						'input[type="submit"]:focus',
						'input[type="submit"]:hover',
						'input[type="reset"]:focus',
						'input[type="reset"]:hover',
						'input[type="submit"]:focus',
						'input[type="submit"]:hover',
						'.button:focus',
						'.button:hover',
						'.genesis-nav-menu > .menu-highlight > a:hover',
						'.genesis-nav-menu > .menu-highlight > a:focus',
						'.genesis-nav-menu > .menu-highlight.current-menu-item > a',
					],
					'properties' => [
						'color',
						'background-color',
					],
				],
			],
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Default Headers
	|--------------------------------------------------------------------------
	*/
	'default-headers' => [
		'child' => [
			'url'           => '%2$s/assets/images/hero.jpg',
			'thumbnail_url' => '%2$s/assets/images/hero.jpg',
			'description'   => __( 'Hero Image', CHILD_THEME_HANDLE ),
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Genesis Settings
	|--------------------------------------------------------------------------
	|
	| Controls the Genesis default settings. The commented out settings below
	| are the default settings currently in Genesis. To override a setting,
	| uncomment the setting's line and change the value to your liking.
	|
	*/
	'genesis-settings' => [
		// 'update'                    => 1,
		// 'update_email'              => 0,
		// 'update_email_address'      => '',
		// 'blog_title'                => 'text',
		// 'style_selection'           => '',
		// 'site_layout'               => genesis_get_default_layout(),
		// 'superfish'                 => 0,
		// 'nav_extras'                => '',
		// 'nav_extras_twitter_id'     => '',
		// 'nav_extras_twitter_text'   => __( 'Follow me on Twitter', 'genesis' ),
		// 'feed_uri'                  => '',
		// 'redirect_feed'             => 0,
		// 'comments_feed_uri'         => '',
		// 'redirect_comments_feed'    => 0,
		// 'adsense_id'                => '',
		// 'comments_pages'            => 0,
		// 'comments_posts'            => 1,
		// 'trackbacks_pages'          => 0,
		// 'trackbacks_posts'          => 1,
		// 'breadcrumb_home'           => 0,
		// 'breadcrumb_front_page'     => 0,
		// 'breadcrumb_posts_page'     => 0,
		// 'breadcrumb_single'         => 0,
		// 'breadcrumb_page'           => 0,
		// 'breadcrumb_archive'        => 0,
		// 'breadcrumb_404'            => 0,
		// 'breadcrumb_attachment'     => 0,
		'content_archive'           => 'excerpt',
		'content_archive_thumbnail' => 1,
		'image_size'                => 'large',
		'image_alignment'           => 'alignnone',
		// 'posts_nav'                 => 'numeric',
		// 'blog_cat'                  => '',
		// 'blog_cat_exclude'          => '',
		// 'blog_cat_num'              => 10,
		// 'header_scripts'            => '',
		// 'footer_scripts'            => '',
		// 'theme_version'             => PARENT_THEME_VERSION,
		// 'db_version'                => PARENT_DB_VERSION,
		// 'first_version'             => genesis_first_version(),
	],

	/*
	|--------------------------------------------------------------------------
	| Google Fonts
	|--------------------------------------------------------------------------
	|
	| Provides an easy way to load Google Fonts on the front-end of the site.
	| Multiple fonts can be added by creating additional array keys below.
	|
	*/
	'google-fonts' => [
		'Source+Sans+Pro:400,600,700',
	],

	/*
	|--------------------------------------------------------------------------
	| Image Sizes
	|--------------------------------------------------------------------------
	*/
	'image-sizes' => [
		'featured' => [
			'width'  => 620,
			'height' => 380,
			'crop'   => true,
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Layouts
	|--------------------------------------------------------------------------
	*/
	'layouts' => [
		'full-width-content',
		'content-sidebar',
		'sidebar-content',
		// 'content-sidebar-sidebar',
		// 'sidebar-sidebar-content',
		// 'sidebar-content-sidebar',
	],

	/*
	|--------------------------------------------------------------------------
	| Map Style
	|--------------------------------------------------------------------------
	*/
	'map-style' => [
		'id'    => '123456789',
		'name'  => 'Ultra Light',
		'style' => CHILD_THEME_DIR . '/map.json',
	],

	/*
	|--------------------------------------------------------------------------
	| Menu Settings
	|--------------------------------------------------------------------------
	*/
	'menu-settings' => [
		'mainMenu'         => __( 'Menu', CHILD_THEME_HANDLE ),
		'subMenu'          => __( 'Menu', CHILD_THEME_HANDLE ),
		'menuIconClass'    => null,
		'subMenuIconClass' => null,
		'menuClasses'      => [
			'combine' => [
				'.nav-primary',
				'.nav-secondary',
			],
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Page Templates
	|--------------------------------------------------------------------------
	*/
	'page-templates' => [
		'page-grid.php'    => __( 'Blog Grid', CHILD_THEME_HANDLE ),
		'page-blog.php'    => __( 'Blog Standard', CHILD_THEME_HANDLE ),
		'page-front.php'   => __( 'Front Page', CHILD_THEME_HANDLE ),
		'page-full.php'    => __( 'Full Width', CHILD_THEME_HANDLE ),
		'page-landing.php' => __( 'Landing Page', CHILD_THEME_HANDLE ),
		'page-sitemap.php' => __( 'Sitemap', CHILD_THEME_HANDLE ),
	],

	/*
	|--------------------------------------------------------------------------
	| Plugins
	|--------------------------------------------------------------------------
	*/
	'plugins' => [
		[
			'name'     => 'Genesis Widget Column Classes',
			'slug'     => 'genesis-widget-column-classes',
			'required' => false,
		],
		[
			'name'     => 'Simple Social Icons',
			'slug'     => 'simple-social-icons',
			'required' => false,
		],
		[
			'name'     => 'Widget Importer & Exporter',
			'slug'     => 'widget-importer-exporter',
			'required' => false,
		],
		[
			'name'     => 'WordPress Importer',
			'slug'     => 'wordpress-importer',
			'required' => false,
		],
		[
			'name'     => 'WP Featherlight',
			'slug'     => 'wp-featherlight',
			'required' => false,
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Post Type Supports
	|--------------------------------------------------------------------------
	*/
	'post-type-supports' => [
		'page'      => 'excerpt',
		'portfolio' => 'excerpt',
	],

	/*
	|--------------------------------------------------------------------------
	| Simple Social Icons
	|--------------------------------------------------------------------------
	*/
	'simple-social-icons' => [
		'alignment'              => 'alignleft',
		'background_color'       => '#eeeeee',
		'background_color_hover' => '#333333',
		'border_radius'          => 0,
		'border_color'           => '#ffffff',
		'border_color_hover'     => '#ffffff',
		'border_width'           => 0,
		'icon_color'             => '#333333',
		'icon_color_hover'       => '#ffffff',
		'size'                   => 40,
		'new_window'             => 1,
		'facebook'               => '#',
		'gplus'                  => '#',
		'instagram'              => '#',
		'dribbble'               => '#',
		'twitter'                => '#',
		'youtube'                => '#',
	],

	/*
	|--------------------------------------------------------------------------
	| Scripts
	|--------------------------------------------------------------------------
	*/
	'scripts' => [
		'theme' => [
			'handle'    => CHILD_THEME_HANDLE . '-script',
			'src'       => CHILD_THEME_ASSETS . '/js/script.js',
			'deps'      => [
				'jquery',
			],
			'ver'       => CHILD_THEME_VERSION,
			'in_footer' => true,
		],
		'menu' => [
			'handle'    => CHILD_THEME_HANDLE . '-menu',
			'src'       => CHILD_THEME_LIB . '/js/menu.js',
			'deps'      => [
				'jquery',
			],
			'ver'       => CHILD_THEME_VERSION,
			'in_footer' => true,
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Styles
	|--------------------------------------------------------------------------
	|
	| Loads additional stylesheets similar to the scripts config above.
	|
	*/
	'styles' => [
		'woocommerce' => [
			'handle' => CHILD_THEME_HANDLE . '-woocommerce',
			'src'    => CHILD_THEME_LIB . '/woocommerce.css',
			'deps'   => [],
			'ver'    => CHILD_THEME_VERSION,
			'media'  => null,
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Text Domain
	|--------------------------------------------------------------------------
	*/
	'textdomain' => [
		'domain' => CHILD_THEME_HANDLE,
		'path'   => apply_filters( 'child_theme_textdomain', CHILD_THEME_LIB . '/languages', CHILD_THEME_HANDLE ),
	],

	/*
	|--------------------------------------------------------------------------
	| Theme Supports
	|--------------------------------------------------------------------------
	*/
	'theme-supports' => [
		'align-wide'                      => null,
		'automatic-feed-links'            => null,
		'custom-background'               => [
			'default-color' => 'ffffff',
		],
		'custom-logo'                     => [
			'height'      => 100,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => [
				'.site-title',
				'.site-description',
			],
		],
		'custom-header'                   => [
			'header-selector'    => '.hero-section',
			'default_image'      => CHILD_THEME_DIR . '/assets/images/hero.jpg',
			'width'              => 1280,
			'height'             => 720,
			'flex-height'        => true,
			'flex-width'         => true,
			'uploads'            => true,
			'video'              => true,
			'wp-head-callback'   => 'child_theme_custom_header',
		],
		'genesis-accessibility'           => [
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links',
		],
		'genesis-after-entry-widget-area' => null,
		//'genesis-footer-widgets'          => 4,
		'genesis-menus'                   => [
			'primary'   => __( 'Header Menu', CHILD_THEME_HANDLE ),
			'secondary' => __( 'After Header Menu', CHILD_THEME_HANDLE ),
		],
		'genesis-responsive-viewport'     => null,
		'genesis-structural-wraps'        => [
			'header',
			'menu-primary',
			'menu-secondary',
			'footer-widgets',
			'footer',
		],
		'gutenberg'                       => [
			'wide-images' => true,
		],
		'html5'                           => [
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		],
		'post-formats'                    => [
			'aside',
			'audio',
			'chat',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video',
		],
		'post-thumbnails'                 => null,
		'woocommerce'                     => null,
		'wc-product-gallery-zoom'         => null,
		'wc-product-gallery-lightbox'     => null,
		'wc-product-gallery-slider'       => null,
	],

	/*
	|--------------------------------------------------------------------------
	| Widget Areas
	|--------------------------------------------------------------------------
	*/
	'widget-areas' => [

		// Genesis.
		// 'header-right',
		// 'after-entry',
		// 'sidebar',
		// 'sidebar-alt',
		'footer-1',
		'footer-2',
		'footer-3',
		'footer-4',

		// Custom.
		'before-header',
		'before-footer',
		'footer-credits',
	],

	/*
	|--------------------------------------------------------------------------
	| Widgets
	|--------------------------------------------------------------------------
	|
	| Provides an easy way to remove unused widgets from the dashboard.
	|
	*/
	'widgets' => [

		// Core.
		// 'WP_Widget_Pages',
		// 'WP_Widget_Calendar',
		// 'WP_Widget_Archives',
		// 'WP_Widget_Links',
		// 'WP_Widget_Media_Audio',
		// 'WP_Widget_Media_Image',
		// 'WP_Widget_Media_Gallery',
		// 'WP_Widget_Media_Video',
		// 'WP_Widget_Meta',
		// 'WP_Widget_Search',
		// 'WP_Widget_Text',
		// 'WP_Widget_Categories',
		// 'WP_Widget_Recent_Posts',
		// 'WP_Widget_Recent_Comments',
		// 'WP_Widget_RSS',
		// 'WP_Widget_Tag_Cloud',
		// 'WP_Nav_Menu_Widget',
		// 'WP_Widget_Custom_HTML',

		// Genesis.
		// 'Genesis_Featured_Page',
		// 'Genesis_Featured_Post',
		// 'Genesis_User_Profile_Widget',

		// WooCommerce.
		// 'WC_Widget_Products',
		// 'WC_Widget_Recent_Products',
		// 'WC_Widget_Featured_Products',
		// 'WC_Widget_Product_Categories',
		// 'WC_Widget_Product_Tag_Cloud',
		// 'WC_Widget_Cart',
		// 'WC_Widget_Layered_Nav',
		// 'WC_Widget_Layered_Nav_Filters',
		// 'WC_Widget_Price_Filter',
		// 'WC_Widget_Rating_Filter',
		// 'WC_Widget_Product_Search',
		// 'WC_Widget_Top_Rated_Products',
		// 'WC_Widget_Recent_Reviews',
		// 'WC_Widget_Recently_Viewed',
		// 'WC_Widget_Best_Sellers',
		// 'WC_Widget_Onsale',
		// 'WC_Widget_Random_Products',

	]

];

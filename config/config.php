<?php
/**
 * Genesis Starter Theme
 *
 * This file contains the config passed to the Child Theme Library.
 *
 * @package   SEOThemes\GenesisStarterTheme
 * @link      https://github.com/seothemes/genesis-starter-theme
 * @author    SEO Themes
 * @copyright Copyright © 2018 SEO Themes
 * @license   GPL-2.0-or-later
 */

namespace SEOThemes\GenesisStarterTheme;

return [

	/*
	|--------------------------------------------------------------------------
	| Autoload
	|--------------------------------------------------------------------------
	|
	| List of directories for the Child Theme Library to load automatically.
	| File names should be the file path from the theme's root directory,
	| not including the php extension, E.g: 'directory_name/file_name'.
	|
	*/
	'autoload'            => [
		'app/tgmpa/tgm-plugin-activation/class-tgm-plugin-activation',
	],

	/*
	|--------------------------------------------------------------------------
	| Colors
	|--------------------------------------------------------------------------
	|
	| Custom color config to be consumed by the Child Theme Library's logic
	| for the Customizer. Each color needs a name, value and an optional
	| array of CSS rules which are output on the frontend of the site.
	|
	*/
	'colors'              => [
		'background' => [
			'default' => '#ffffff',
			'output'  => [
				[
					'elements'   => [
						'body',
						'.site-container',
					],
					'properties' => [
						'background-color' => '%s',
					],
				],
			],
		],
		'link'       => [
			'default' => '#0073e5',
			'output'  => [
				[
					'elements'   => [
						'a',
						'.entry-title a:focus',
						'.entry-title a:hover',
						'.genesis-nav-menu a:focus',
						'.genesis-nav-menu a:hover',
						'.genesis-nav-menu .current-menu-item > a',
						'.genesis-nav-menu .sub-menu .current-menu-item > a:focus',
						'.genesis-nav-menu .sub-menu .current-menu-item > a:hover',
						'.menu-toggle:focus',
						'.menu-toggle:hover',
						'.sub-menu-toggle:focus',
						'.sub-menu-toggle:hover',
					],
					'properties' => [
						'color' => '%s',
					],
				],
			],
		],
		'accent'     => [
			'default' => '#0073e5',
			'output'  => [
				[
					'elements'   => [
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
						'background-color' => '%s',
					],
				],
			],
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Default Headers
	|--------------------------------------------------------------------------
	|
	| Defines the default header settings to be registered in the Customizer
	| Header Media section. This theme includes an example hero.jpg image
	| located in the theme's ./resources/img/ directory to be replaced.
	|
	*/
	'default-headers'     => [
		'child' => [
			'url'           => '%2$s/resources/img/hero.jpg',
			'thumbnail_url' => '%2$s/resources/img/hero.jpg',
			'description'   => __( 'Hero Image', 'child-theme-library' ),
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Demo Import
	|--------------------------------------------------------------------------
	|
	| These settings are passed to the One Click Demo Import plugin to tell
	| it where to look for the theme's sample content files - sample.xml,
	| widgets.wie and customizer.dat which are in the root by default.
	|
	*/
	'demo-import'         => [
		'local_import_file'            => get_stylesheet_directory() . '/resources/demo/sample.xml',
		'local_import_widget_file'     => get_stylesheet_directory() . '/resources/demo/widgets.wie',
		'local_import_customizer_file' => get_stylesheet_directory() . '/resources/demo/customizer.dat',
		'import_file_name'             => 'Demo Import',
		'categories'                   => false,
		'local_import_redux'           => false,
		'import_preview_image_url'     => false,
		'import_notice'                => false,
	],

	/*
	|--------------------------------------------------------------------------
	| Genesis Settings
	|--------------------------------------------------------------------------
	|
	| Controls the Genesis default settings. The commented out settings below
	| are the default settings currently in Genesis. To override a setting,
	| uncomment the setting's line and change the values to your liking.
	|
	*/
	'genesis-settings'    => [
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
	| Define font weights after the font family, e.g 'Lato:400,600,700;
	|
	*/
	'google-fonts'        => [
		'Source+Sans+Pro:400,600,700',
	],

	/*
	|--------------------------------------------------------------------------
	| Image Sizes
	|--------------------------------------------------------------------------
	|
	| Provides an easy way to add custom image sizes to your WordPress site.
	| Each item in this array will create a new custom image size, based
	| on the height, width & crop parameters that are specified below.
	|
	*/
	'image-sizes'         => [
		'featured' => [
			'width'  => 620,
			'height' => 380,
			'crop'   => true,
		],
		'hero'     => [
			'width'  => 1280,
			'height' => 720,
			'crop'   => true,
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Layouts
	|--------------------------------------------------------------------------
	|
	| Enable or disable the built in Genesis Framework layouts with this array.
	| If a custom layout is defined, such as narrow-content, the theme will
	| search for resources/img/narrow-content.gif as the thumbnail image.
	|
	*/
	'layouts'             => [
		'full-width-content',
		'content-sidebar',
		'sidebar-content',
		'center-content',
		// 'content-sidebar-sidebar',
		// 'sidebar-sidebar-content',
		// 'sidebar-content-sidebar',
	],

	/*
	|--------------------------------------------------------------------------
	| Modules
	|--------------------------------------------------------------------------
	|
	| List of Child Theme Library modules to enable/disable. Each module is
	| independent of other modules however please note that removing the
	| default modules can cause your site to not function as expected.
	|
	*/
	'modules'             => [
		'Setup',
		'Utilities',
		'Attributes',
		'Defaults',
		'DemoImport',
		'HeroSection',
		'Layout',
		'Markup',
		'Plugins',
		'Templates',
		'Enqueue',
		'Shortcodes',
		'WidgetAreas',
		'Admin',
		'Customizer',
		'Structure',
	],

	/*
	|--------------------------------------------------------------------------
	| Page Templates
	|--------------------------------------------------------------------------
	|
	| Allows the Child Theme Library to register custom page templates that
	| are located more than one level deep in the theme's file structure,
	| since WordPress only checks direct sub-directories of the theme.
	|
	*/
	'page-templates'      => [
		'page-blog.php'    => __( 'Blog', 'child-theme-library' ),
		'page-builder.php' => __( 'Page Builder', 'child-theme-library' ),
		'page-landing.php' => __( 'Landing Page', 'child-theme-library' ),
		'page-sitemap.php' => __( 'Sitemap', 'child-theme-library' ),
	],

	/*
	|--------------------------------------------------------------------------
	| Plugins
	|--------------------------------------------------------------------------
	|
	| Contains the configuration for an array of plugins to be installed and
	| activated by the TGM plugin activation script. Each plugin requires
	| values for the name, slug and if the theme depends on the plugin.
	|
	*/
	'plugins'             => [
		[
			'name'     => 'Genesis eNews Extended',
			'slug'     => 'genesis-enews-extended',
			'required' => false,
		],
		[
			'name'     => 'Genesis Simple FAQ',
			'slug'     => 'genesis-simple-faq',
			'required' => false,
		],
		[
			'name'     => 'Genesis Testimonial Slider',
			'slug'     => 'wpstudio-testimonial-slider',
			'required' => false,
		],
		[
			'name'     => 'Genesis Widget Column Classes',
			'slug'     => 'genesis-widget-column-classes',
			'required' => false,
		],
		[
			'name'     => 'Google Map',
			'slug'     => 'ank-google-map',
			'required' => false,
		],
		[
			'name'     => 'Icon Widget',
			'slug'     => 'icon-widget',
			'required' => false,
		],
		[
			'name'     => 'One Click Demo Import',
			'slug'     => 'one-click-demo-import',
			'required' => false,
		],
		[
			'name'     => 'Simple Social Icons',
			'slug'     => 'simple-social-icons',
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
	|
	| Registers support of certain feature(s) for a given post type. Default
	| features enabled are excerpts on pages and portfolio post types, to
	| be used as subtitles in the theme's hero section below the title.
	|
	*/
	'post-type-supports'  => [
		'page'      => 'excerpt',
		'portfolio' => 'excerpt',
	],

	/*
	|--------------------------------------------------------------------------
	| Responsive Menu
	|--------------------------------------------------------------------------
	|
	| Sets the responsive menu settings used for the Genesis Responsive Menu
	| script. This allows users to change the menu toggle button text and
	| choose which menu to combine into one when using a mobile device.
	|
	*/
	'responsive-menu'     => [
		'mainMenu'         => __( 'Menu', 'child-theme-library' ),
		'subMenu'          => __( 'Menu', 'child-theme-library' ),
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
	| Scripts
	|--------------------------------------------------------------------------
	|
	| Defines a list of scripts to enqueue. Each script requires a handle,
	| source URL, array of dependencies, version and whether or not to
	| load the script inside the header or the footer of your theme.
	|
	*/
	'scripts'             => [
		'menu'   => [
			'src'       => get_stylesheet_directory_uri() . '/resources/js/menus.js',
			'deps'      => 'jquery',
			'ver'       => wp_get_theme()->get( 'Version' ),
			'in_footer' => true,
		],
		'script' => [
			'src'       => get_stylesheet_directory_uri() . '/resources/js/script.js',
			'deps'      => 'jquery',
			'ver'       => wp_get_theme()->get( 'Version' ),
			'in_footer' => true,
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Simple Social Icons
	|--------------------------------------------------------------------------
	|
	| Sets the default values for widgets created by the Simple Social Icons
	| plugin. Uncomment then set a value to override the default settings
	| created by the plugin, e.g 'background_color_hover' => '#333333'.
	|
	*/
	'simple-social-icons' => [
		// 'title'                  => '',
		'new_window'             => 1,
		'size'                   => 40,
		// 'border_radius'          => 3,
		// 'border_width'           => 0,
		// 'border_color'           => '#ffffff',
		// 'border_color_hover'     => '#ffffff',
		'icon_color'             => '#333333',
		// 'icon_color_hover'       => '#ffffff',
		'background_color'       => '#f5f5f5',
		'background_color_hover' => '#333333',
		// 'alignment'              => 'alignleft',
		// 'behance'                => '',
		// 'bloglovin'              => '',
		// 'dribbble'               => '',
		// 'email'                  => '',
		// 'facebook'   => '#',
		// 'flickr'                 => '',
		// 'github'                 => '',
		// 'gplus'      => '#',
		// 'instagram'              => '',
		// 'linkedin'   => '#',
		// 'medium'                 => '',
		// 'periscope'              => '',
		// 'phone'                  => '',
		// 'pinterest'              => '',
		// 'rss'                    => '',
		// 'snapchat'               => '',
		// 'stumbleupon'            => '',
		// 'tumblr'                 => '',
		// 'twitter'    => '#',
		// 'vimeo'                  => '',
		// 'xing'                   => '',
		// 'youtube'    => '#',
	],

	/*
	|--------------------------------------------------------------------------
	| Styles
	|--------------------------------------------------------------------------
	|
	| Loads additional stylesheets similar to the scripts config above. Each
	| style requires a handle, source URL, array of dependencies, version
	| and an optional media query for which the style has been defined.
	|
	*/
	'styles'              => [
		'woocommerce' => [
			'src'   => get_stylesheet_directory_uri() . '/woocommerce.css',
			'deps'  => [],
			'ver'   => wp_get_theme()->get( 'Version' ),
			'media' => null,
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Testimonial Slider
	|--------------------------------------------------------------------------
	|
	| Defines the default settings for the Genesis Testimonial Slider plugin.
	| Included in the theme config by default since most themes recommend
	| this plugin during the plugin activation step in the theme setup.
	|
	*/
	'testimonial-slider'  => [
		'gts_autoplay' => 'yes',
		'gts_column'   => 'three',
		'gts_controls' => 'yes',
		'gts_loop'     => 'yes',
		'gts_effect'   => 'slide',
		'gts_pause'    => 'yes',
		'gts_speed'    => '6000',
	],

	/*
	|--------------------------------------------------------------------------
	| Text Domain
	|--------------------------------------------------------------------------
	|
	| Small config for defining the child theme's text domain. By default it
	| uses the child-theme-library handle which allows one translation to
	| be used by every child theme that shares the library's functions.
	|
	*/
	'textdomain'          => [
		'domain' => 'child-theme-library',
		'path'   => apply_filters( 'child_theme_textdomain', get_stylesheet_directory_uri() . '/resources/lang', 'child-theme-library' ),
	],

	/*
	|--------------------------------------------------------------------------
	| Theme Supports
	|--------------------------------------------------------------------------
	|
	| Registers theme support for given features. Each item accepts the name
	| of the feature and extra arguments for the feature. If no arguments
	| are required by the feature then no value is required by the key.
	|
	*/
	'theme-supports'      => [
		'align-wide',
		'automatic-feed-links',
		'custom-background'        => [
			'default-color' => 'ffffff',
		],
		'custom-logo'              => [
			'height'      => 100,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => [
				'.site-title',
				'.site-description',
			],
		],
		'custom-header'            => [
			'header-selector'  => '.hero-section',
			'default_image'    => get_stylesheet_directory_uri() . '/resources/img/hero.jpg',
			'header-text'      => false,
			'width'            => 1280,
			'height'           => 720,
			'flex-height'      => true,
			'flex-width'       => true,
			'uploads'          => true,
			'video'            => true,
			'wp-head-callback' => [
				'SEOThemes\ChildThemeLibrary\HeroSection',
				'custom_header',
			],
		],
		'genesis-accessibility'    => [
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links',
		],
		'genesis-after-entry-widget-area',
		'genesis-menus'            => [
			'primary' => __( 'Header Menu', 'child-theme-library' ),
			// 'secondary' => __( 'After Header Menu', 'child-theme-library' ),
		],
		'genesis-responsive-viewport',
		'genesis-structural-wraps' => [
			'header',
			'menu-secondary',
			'footer-widgets',
			'footer',
		],
		'gutenberg'                => [
			'wide-images' => true,
		],
		'hero-section',
		'html5'                    => [
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		],
		// 'post-formats'             => [
		// 'aside',
		// 'audio',
		// 'chat',
		// 'gallery',
		// 'image',
		// 'link',
		// 'quote',
		// 'status',
		// 'video',
		// ],
		'post-thumbnails',
		'woocommerce',
		'wc-product-gallery-zoom',
		'wc-product-gallery-lightbox',
		'wc-product-gallery-slider',
		'wp-block-styles',
	],

	/*
	|--------------------------------------------------------------------------
	| Widget Areas
	|--------------------------------------------------------------------------
	|
	| Provides an easy way to register and display widget areas. Adding a new
	| key will register the widget area, and if a value is entered for the
	| key, then it will be hooked to and display in that theme location.
	|
	*/
	'widget-areas'        => [
		// 'header-right'   => null,
		'sidebar'        => null,
		// 'sidebar-alt'    => null,
		'after-entry'    => null,
		'footer-1'       => null,
		'footer-2'       => null,
		'footer-3'       => null,
		// 'before-header'  => 'genesis_before_header_wrap',
		// 'before-footer'  => 'genesis_before_footer_wrap',
		'footer-credits' => 'genesis_footer',
		'front-page-1'   => 'child_theme_front_page_widgets',
		'front-page-2'   => 'child_theme_front_page_widgets',
		'front-page-3'   => 'child_theme_front_page_widgets',
		'front-page-4'   => 'child_theme_front_page_widgets',
		'front-page-5'   => 'child_theme_front_page_widgets',
	],

];

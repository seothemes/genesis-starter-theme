<?php
/**
 * Genesis Starter Theme
 *
 * @package   SEOThemes\GenesisStarterTheme
 * @link      https://seothemes.com/genesis-starter-theme
 * @author    SEO Themes
 * @copyright Copyright © 2018 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SEOThemes\GenesisStarterTheme;

use D2\Core\AssetLoader;
use D2\Core\Constants;
use D2\Core\CustomColors;
use D2\Core\GenesisLayout;
use D2\Core\GenesisSettings;
use D2\Core\GoogleFonts;
use D2\Core\Hooks;
use D2\Core\ImageSizes;
use D2\Core\PluginActivation;
use D2\Core\SimpleSocialIcons;
use D2\Core\TextDomain;
use D2\Core\ThemeSupport;
use D2\Core\WidgetArea;

$d2_assets = [
	AssetLoader::SCRIPTS => [
		[
			AssetLoader::HANDLE   => 'menus',
			AssetLoader::URL      => AssetLoader::path( '/resources/js/menus.js' ),
			AssetLoader::DEPS     => [ 'jquery' ],
			AssetLoader::VERSION  => wp_get_theme()->get( 'Version' ),
			AssetLoader::FOOTER   => true,
			AssetLoader::ENQUEUE  => true,
			AssetLoader::LOCALIZE => [
				AssetLoader::LOCALIZEVAR  => 'generico_menu_params',
				AssetLoader::LOCALIZEDATA => [
					'mainMenu'         => __( 'Menu', 'genesis-starter-theme' ),
					'subMenu'          => __( 'Sub Menu', 'genesis-starter-theme' ),
					'menuIconClass'    => null,
					'subMenuIconClass' => null,
					'menuClasses'      => [
						'combine' => [
							'.nav-primary',
							'.nav-secondary',
						],
					],
				]
			],
		],
		[
			AssetLoader::HANDLE  => 'script',
			AssetLoader::URL     => AssetLoader::path( '/resources/js/script.js' ),
			AssetLoader::DEPS    => [ 'jquery' ],
			AssetLoader::VERSION => wp_get_theme()->get( 'Version' ),
			AssetLoader::FOOTER  => true,
			AssetLoader::ENQUEUE => true,
		],
	],
];

$d2_constants = [
	Constants::DEFINE => [
		'CHILD_THEME_NAME'    => wp_get_theme()->get( 'Name' ),
		'CHILD_THEME_URL'     => wp_get_theme()->get( 'ThemeURI' ),
		'CHILD_THEME_VERSION' => wp_get_theme()->get( 'Version' ),
		'CHILD_THEME_HANDLE'  => wp_get_theme()->get( 'TextDomain' ),
		'CHILD_THEME_AUTHOR'  => wp_get_theme()->get( 'Author' ),
		'CHILD_THEME_DIR'     => get_stylesheet_directory(),
		'CHILD_THEME_URI'     => get_stylesheet_directory_uri(),
	],
];

$d2_custom_colors = [
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
];

$d2_genesis_settings = [
	GenesisSettings::DEFAULTS => [
		GenesisSettings::SITE_LAYOUT => 'full-width-content',
	],
];

$d2_google_fonts = [
	GoogleFonts::ENQUEUE => [
		'Source+Sans+Pro:400,600,700',
	],
];

$d2_hooks = [
	Hooks::ADD    => [
		[
			Hooks::TAG         => 'genesis_site_title',
			Hooks::CALLBACK    => 'the_custom_logo',
			Hooks::PRIORITY    => 0,
			Hooks::CONDITIONAL => function () {
				return has_custom_logo();
			}
		],
		[
			Hooks::TAG      => 'genesis_markup_title-area_close',
			Hooks::CALLBACK => function ( $close_html ) {
				if ( $close_html ) {
					ob_start();
					do_action( 'child_theme_after_title_area' );
					$close_html = $close_html . ob_get_clean();
				}

				return $close_html;
			}
		],
		[
			Hooks::TAG      => 'genesis_before',
			Hooks::CALLBACK => function () {
				$wraps = get_theme_support( 'genesis-structural-wraps' );
				foreach ( $wraps[0] as $context ) {
					add_filter( "genesis_structural_wrap-{$context}", function ( $output, $original ) use ( $context ) {
						$position = ( 'open' === $original ) ? 'before' : 'after';
						ob_start();
						do_action( "child_theme_{$position}_{$context}_wrap" );
						if ( 'open' === $original ) {
							return ob_get_clean() . $output;
						} else {
							return $output . ob_get_clean();
						}
					}, 10, 2 );
				}
			}
		],
		[
			Hooks::TAG      => 'child_theme_after_title_area',
			Hooks::CALLBACK => 'genesis_do_nav',
		],
		[
			Hooks::TAG      => 'child_theme_after_title_area',
			Hooks::CALLBACK => 'genesis_do_subnav',
		],
		[
			Hooks::TAG      => 'child_theme_before_footer_wrap',
			Hooks::CALLBACK => 'genesis_footer_widget_areas',
		],
	],
	Hooks::REMOVE => [
		[
			Hooks::TAG      => 'genesis_after_header',
			Hooks::CALLBACK => 'genesis_do_nav',
		],
		[
			Hooks::TAG      => 'genesis_after_header',
			Hooks::CALLBACK => 'genesis_do_subnav',
		],
		[
			Hooks::TAG      => 'genesis_before_footer',
			Hooks::CALLBACK => 'genesis_footer_widget_areas',
		],
	],
];

$d2_image_sizes = [
	ImageSizes::ADD => [
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
];

$d2_layouts = [
	GenesisLayout::UNREGISTER => [
		// GenesisLayout::CONTENT_SIDEBAR,
		// GenesisLayout::SIDEBAR_CONTENT,
		GenesisLayout::CONTENT_SIDEBAR_SIDEBAR,
		GenesisLayout::SIDEBAR_SIDEBAR_CONTENT,
		GenesisLayout::SIDEBAR_CONTENT_SIDEBAR,
		// GenesisLayout::FULL_WIDTH_CONTENT,
	]
];

$d2_plugins = [
	PluginActivation::REGISTER => [
		[
			PluginActivation::NAME     => 'Genesis Widget Column Classes',
			PluginActivation::SLUG     => 'genesis-widget-column-classes',
			PluginActivation::REQUIRED => false,
		],
		[
			PluginActivation::NAME     => 'Icon Widget',
			PluginActivation::SLUG     => 'icon-widget',
			PluginActivation::REQUIRED => false,
		],
		[
			PluginActivation::NAME     => 'One Click Demo Import',
			PluginActivation::SLUG     => 'one-click-demo-import',
			PluginActivation::REQUIRED => false,
		],
		[
			PluginActivation::NAME     => 'Simple Social Icons',
			PluginActivation::SLUG     => 'simple-social-icons',
			PluginActivation::REQUIRED => false,
		],
	],
];

$d2_simple_social_icons = [
	SimpleSocialIcons::DEFAULTS => [
		SimpleSocialIcons::NEW_WINDOW => 1,
		SimpleSocialIcons::SIZE       => 40,
	],
];

$d2_textdomain = [
	TextDomain::DOMAIN => 'genesis-starter-theme',
];

$d2_theme_support = [
	ThemeSupport::ADD => [
		'align-wide',
		'automatic-feed-links',
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
			'header-selector' => '.hero-section',
			'default_image'   => get_stylesheet_directory_uri() . '/resources/img/hero.jpg',
			'header-text'     => false,
			'width'           => 1280,
			'height'          => 720,
			'flex-height'     => true,
			'flex-width'      => true,
			'uploads'         => true,
			'video'           => true,
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
		'genesis-footer-widgets'   => 4,
		'genesis-menus'            => [
			'primary' => __( 'Header Menu', 'genesis-starter-theme' ),
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
		'html5'                    => [
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		],
		'post-thumbnails',
		'woocommerce',
		'wc-product-gallery-zoom',
		'wc-product-gallery-lightbox',
		'wc-product-gallery-slider',
		'wp-block-styles',
	],
];

$d2_widget_areas = [
	WidgetArea::UNREGISTER => [
		WidgetArea::HEADER_RIGHT,
		WidgetArea::SIDEBAR_ALT,
	],
];

return [
	AssetLoader::class        => $d2_assets,
	Constants::class          => $d2_constants,
	CustomColors::class       => $d2_custom_colors,
	GenesisLayout::class      => $d2_layouts,
	GenesisSettings::class    => $d2_genesis_settings,
	GoogleFonts::class        => $d2_google_fonts,
	Hooks::class              => $d2_hooks,
	ImageSizes::class         => $d2_image_sizes,
	PluginActivation::class   => $d2_plugins,
	SimpleSocialIcons::class  => $d2_simple_social_icons,
	TextDomain::class         => $d2_textdomain,
	ThemeSupport::class       => $d2_theme_support,
	WidgetArea::class         => $d2_widget_areas,
];

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
use D2\Core\DemoImport;
use D2\Core\GenesisAttributes;
use D2\Core\GenesisCustomizer;
use D2\Core\GenesisLayout;
use D2\Core\GenesisMetaBox;
use D2\Core\GenesisSettings;
use D2\Core\GoogleFonts;
use D2\Core\Hooks;
use D2\Core\ImageSizes;
use D2\Core\PageTemplate;
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
					'subMenu'          => __( 'Menu', 'genesis-starter-theme' ),
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

$d2_customizer_panels = [
	GenesisCustomizer::REMOVE => [
		GenesisCustomizer::UPDATES,
		GenesisCustomizer::HEADER,
		GenesisCustomizer::ADSENSE,
		GenesisCustomizer::COLORSCHEME,
		GenesisCustomizer::LAYOUT,
		GenesisCustomizer::BREADCRUMB,
		GenesisCustomizer::COMMENTS,
		GenesisCustomizer::ARCHIVES,
		GenesisCustomizer::SCRIPTS,
	],
];

$d2_demo_import = [
	DemoImport::IMPORT_SETTINGS => [
		DemoImport::LOCAL_IMPORT_FILE            => get_stylesheet_directory() . '/resources/demo/sample.xml',
		DemoImport::LOCAL_IMPORT_WIDGET_FILE     => get_stylesheet_directory() . '/resources/demo/widgets.wie',
		DemoImport::LOCAL_IMPORT_CUSTOMIZER_FILE => get_stylesheet_directory() . '/resources/demo/customizer.dat',
		DemoImport::IMPORT_FILE_NAME             => 'Demo Import',
		DemoImport::CATEGORIES                   => false,
		DemoImport::LOCAL_IMPORT_REDUX           => false,
		DemoImport::IMPORT_PREVIEW_IMAGE_URL     => false,
		DemoImport::IMPORT_NOTICE                => false,
	],
	DemoImport::PAGE_SETTINGS   => [
		DemoImport::SHOW_ON_FRONT            => 'page',
		DemoImport::PAGE_ON_FRONT            => 'Home',
		DemoImport::PAGE_FOR_POSTS           => 'Blog',
		DemoImport::WOOCOMMERCE_SHOP_PAGE_ID => 'Shop',
	],
	DemoImport::MENU_SETTINGS   => [
		[
			DemoImport::MENU_NAME     => 'Header Menu',
			DemoImport::MENU_LOCATION => 'primary',
		],
	],
];

$d2_genesis_attributes = [
	GenesisAttributes::ADD    => [
		[
			GenesisAttributes::CONTEXT    => 'site-container',
			GenesisAttributes::ATTRIBUTES => [
				'id' => 'top',
			],
			GenesisAttributes::CONDITION  => function () {
				return true;
			},
		],
	],
	GenesisAttributes::REMOVE => [
		[
			GenesisAttributes::CONTEXT    => 'body',
			GenesisAttributes::ATTRIBUTES => [
				'class' => 'blog',
			],
		],
	],
];

$d2_genesis_settings = [
	GenesisSettings::FORCE    => [
		GenesisSettings::POSTS_NAV         => 'numeric',
		GenesisSettings::SEMANTIC_HEADINGS => 0,
	],
	GenesisSettings::DEFAULTS => [
		GenesisSettings::SITE_LAYOUT => 'full-width-content',
	],
];

$d2_google_fonts = [
	GoogleFonts::ENQUEUE => [
		'Source+Sans+Pro:400,600,700',
		'Montserrat:400,600',
	],
];

$d2_hooks = [
	Hooks::ADD    => [
		[
			Hooks::TAG         => 'genesis_before',
			Hooks::CALLBACK    => function () {
				echo 'Is front page';
			},
			Hooks::PRIORITY    => 10,
			Hooks::CONDITIONAL => function () {
				if ( is_front_page() ) {
					return true;
				} else {
					return false;
				}
			}
		],
	],
	Hooks::REMOVE => [
		[
			Hooks::TAG      => 'genesis_after_header',
			Hooks::CALLBACK => 'genesis_do_nav',
			Hooks::PRIORITY => 10,
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
		GenesisLayout::CONTENT_SIDEBAR,
		GenesisLayout::SIDEBAR_CONTENT,
		GenesisLayout::CONTENT_SIDEBAR_SIDEBAR,
		GenesisLayout::SIDEBAR_SIDEBAR_CONTENT,
		GenesisLayout::SIDEBAR_CONTENT_SIDEBAR,
		GenesisLayout::FULL_WIDTH_CONTENT,
	]
];

$d2_meta_boxes = [
	GenesisMetaBox::REMOVE => [
		// GenesisMetaBox::VERSION,
		// GenesisMetaBox::STYLE,
		// GenesisMetaBox::FEEDS,
		// GenesisMetaBox::ADSENSE,
		// GenesisMetaBox::LAYOUT,
		// GenesisMetaBox::HEADER,
		// GenesisMetaBox::NAV,
		// GenesisMetaBox::BREADCRUMB,
		// GenesisMetaBox::COMMENTS,
		// GenesisMetaBox::POSTS,
		// GenesisMetaBox::BLOGPAGE,
		// GenesisMetaBox::SCRIPTS,
	],
];

$d2_page_templates = [
	PageTemplate::UNREGISTER => [
		PageTemplate::BLOG,
		PageTemplate::ARCHIVE,
	],
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
	TextDomain::DOMAIN => 'generico',
];

$d2_theme_support = [
	ThemeSupport::ADD => [
		'custom-logo'                 => [
			'height'      => 100,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => [
				'.site-title',
				'.site-description',
			],
		],
		'html5'                       => [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		],
		'genesis-accessibility'       => [
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links',
		],
		'genesis-menus'               => [
			'primary' => __( 'Primary Navigation Menu', 'generico' ),
		],
		'genesis-responsive-viewport' => '',
		'genesis-structural-wraps'    => [
			'header',
			'footer'
		],
	],
];

$d2_widget_areas = [
	WidgetArea::UNREGISTER => [
		WidgetArea::HEADER_RIGHT,
		//WidgetArea::SIDEBAR,
		WidgetArea::SIDEBAR_ALT,
	],
];

return [
	AssetLoader::class       => $d2_assets,
	Constants::class         => $d2_constants,
	CustomColors::class      => $d2_custom_colors,
	DemoImport::class        => $d2_demo_import,
	GenesisAttributes::class => $d2_genesis_attributes,
	GenesisCustomizer::class => $d2_customizer_panels,
	GenesisLayout::class     => $d2_layouts,
	GenesisMetaBox::class    => $d2_meta_boxes,
	GenesisSettings::class   => $d2_genesis_settings,
	GoogleFonts::class       => $d2_google_fonts,
	Hooks::class             => $d2_hooks,
	ImageSizes::class        => $d2_image_sizes,
	PageTemplate::class      => $d2_page_templates,
	PluginActivation::class  => $d2_plugins,
	SimpleSocialIcons::class => $d2_simple_social_icons,
	TextDomain::class        => $d2_textdomain,
	ThemeSupport::class      => $d2_theme_support,
	WidgetArea::class        => $d2_widget_areas,
];
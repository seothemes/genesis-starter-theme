<?php
/**
 * Genesis Starter Theme
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://seothemes.com/genesis-starter-theme
 * @author    SEO Themes
 * @copyright Copyright © 2018 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\GenesisStarterTheme;

use SeoThemes\Core\AssetLoader;
use SeoThemes\Core\Constants;
use SeoThemes\Core\CustomColors;
use SeoThemes\Core\Customizer;
use SeoThemes\Core\GenesisSettings;
use SeoThemes\Core\GoogleFonts;
use SeoThemes\Core\HeroSection;
use SeoThemes\Core\Hooks;
use SeoThemes\Core\ImageSizes;
use SeoThemes\Core\PageLayouts;
use SeoThemes\Core\PageTemplate;
use SeoThemes\Core\PluginActivation;
use SeoThemes\Core\PostTypeSupport;
use SeoThemes\Core\SimpleSocialIcons;
use SeoThemes\Core\TextDomain;
use SeoThemes\Core\ThemeSupport;
use SeoThemes\Core\WidgetArea;

$core_assets = [
	AssetLoader::SCRIPTS => [
		[
			AssetLoader::HANDLE   => 'menus',
			AssetLoader::URL      => AssetLoader::path( '/resources/js/menus.js' ),
			AssetLoader::DEPS     => [ 'jquery' ],
			AssetLoader::VERSION  => wp_get_theme()->get( 'Version' ),
			AssetLoader::FOOTER   => true,
			AssetLoader::ENQUEUE  => true,
			AssetLoader::LOCALIZE => [
				AssetLoader::LOCALIZEVAR  => 'genesis_responsive_menu',
				AssetLoader::LOCALIZEDATA => [
					'mainMenu'         => '<span class="hamburger"></span><span class="screen-reader-text">' . __( 'Menu', 'genesis-starter-theme' ) . '</span>',
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
			AssetLoader::HANDLE  => 'fitvids',
			AssetLoader::URL     => AssetLoader::path( '/resources/js/script.js' ),
			AssetLoader::DEPS    => [ 'jquery' ],
			AssetLoader::VERSION => wp_get_theme()->get( 'Version' ),
			AssetLoader::FOOTER  => true,
			AssetLoader::ENQUEUE => true,
		],
		[
			AssetLoader::HANDLE  => 'script',
			AssetLoader::URL     => AssetLoader::path( '/resources/js/jquery.fitvids.js' ),
			AssetLoader::DEPS    => [ 'fitvids' ],
			AssetLoader::VERSION => wp_get_theme()->get( 'Version' ),
			AssetLoader::FOOTER  => true,
			AssetLoader::ENQUEUE => true,
		],
	],
	AssetLoader::STYLES  => [
		[
			AssetLoader::HANDLE      => 'woocommerce',
			AssetLoader::URL         => AssetLoader::path( '/woocommerce.css' ),
			AssetLoader::VERSION     => wp_get_theme()->get( 'Version' ),
			AssetLoader::ENQUEUE     => true,
			AssetLoader::CONDITIONAL => function () {
				return class_exists( 'WooCommerce' );
			},
		],
	],
];

$core_constants = [
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

$core_customizer = [
	Customizer::SECTIONS => [
		[
			Customizer::ID    => 'single_posts',
			Customizer::TITLE => __( 'Single Posts', 'genesis-starter-theme' ),
			Customizer::PANEL => 'genesis',
		],
	],
	Customizer::FIELDS   => [
		[
			Customizer::CONTROL_TYPE  => 'checkbox',
			Customizer::SETTINGS      => 'single_post_featured_image',
			Customizer::LABEL         => __( 'Display featured image?', 'genesis-starter-theme' ),
			Customizer::SECTION       => 'single_posts',
			Customizer::DEFAULT_VALUE => true,
		],
	],
];

$core_custom_colors = [
	[
		CustomColors::ID            => 'background',
		CustomColors::DEFAULT_COLOR => '#ffffff',
		CustomColors::OUTPUT        => [
			[
				CustomColors::ELEMENTS   => [
					'body',
					'.site-container',
				],
				CustomColors::PROPERTIES => [
					'background-color' => '%s',
				],
			],
		],
	],
	[
		CustomColors::ID            => 'link',
		CustomColors::DEFAULT_COLOR => '#0077ee',
		CustomColors::OUTPUT        => [
			[
				CustomColors::ELEMENTS   => [
					'a',
					'.site-title a:focus',
					'.site-title a:hover',
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
				CustomColors::PROPERTIES => [
					'color' => '%s',
				],
			],
		],
	],
	[
		CustomColors::ID            => 'accent',
		CustomColors::DEFAULT_COLOR => '#0077ee',
		CustomColors::OUTPUT        => [
			[
				CustomColors::ELEMENTS   => [
					'button:focus',
					'button:hover',
					'[type="button"]:focus',
					'[type="button"]:hover',
					'[type="reset"]:focus',
					'[type="reset"]:hover',
					'[type="submit"]:focus',
					'[type="submit"]:hover',
					'[type="reset"]:focus',
					'[type="reset"]:hover',
					'[type="submit"]:focus',
					'[type="submit"]:hover',
					'.button:focus',
					'.button:hover',
				],
				CustomColors::PROPERTIES => [
					'background-color' => '%s',
				],
			],
		],
	],
];

$core_example = [
	Example::SUB_CONFIG => [
		Example::KEY => 'value',
	],
];

$core_genesis_settings = [
	GenesisSettings::DEFAULTS => [
		GenesisSettings::SITE_LAYOUT => 'full-width-content',
	],
];

$core_google_fonts = [
	GoogleFonts::ENQUEUE => [
		'Source+Sans+Pro:400,600,700',
	],
];

$core_hero_section = [
	HeroSection::ENABLE => [
		HeroSection::PAGE            => true,
		HeroSection::POST            => true,
		HeroSection::PRODUCT         => true,
		HeroSection::PORTFOLIO_ITEM  => true,
		HeroSection::FRONT_PAGE      => true,
		HeroSection::ATTACHMENT      => true,
		HeroSection::ERROR_404       => true,
		HeroSection::LANDING_PAGE    => false,
		HeroSection::BLOG_TEMPLATE   => true,
		HeroSection::SEARCH          => true,
		HeroSection::AUTHOR          => true,
		HeroSection::DATE            => true,
		HeroSection::LATEST_POSTS    => true,
		HeroSection::BLOG            => true,
		HeroSection::SHOP            => true,
		HeroSection::PORTFOLIO       => true,
		HeroSection::PORTFOLIO_TYPE  => true,
		HeroSection::PRODUCT_ARCHIVE => true,
		HeroSection::CATEGORY        => true,
		HeroSection::TAG             => true,
	],
];

$core_hooks = [
	Hooks::ADD    => [
		[
			Hooks::TAG      => 'template_include',
			Hooks::CALLBACK => function ( $template ) {
				if ( ! is_front_page() || 'posts' === get_option( 'show_on_front' ) ) {
					return $template;
				}

				return get_stylesheet_directory() . '/resources/views/page-front.php';
			}
		],
		[
			Hooks::TAG      => 'wp_enqueue_scripts',
			Hooks::CALLBACK => 'genesis_enqueue_main_stylesheet',
			Hooks::PRIORITY => 99,
		],
		[
			Hooks::TAG      => 'body_class',
			Hooks::CALLBACK => function ( $classes ) {
				if ( ! is_front_page() && is_home() || is_search() || is_author() || is_date() || is_category() || is_tag() || is_page_template( 'page_blog.php' ) ) {
					$classes[] = 'is-archive';
				}

				if ( ! is_front_page() && ! is_page_template( 'page_blog.php' ) && ! is_post_type_archive() && is_singular() || is_404() ) {
					$classes[] = 'is-singular';
				}

				if ( is_page_template( 'page-blog.php' ) ) {
					$classes[] = 'blog';
					$classes   = array_diff( $classes, [ 'page' ] );
				}

				if ( is_front_page() ) {
					$classes[] = 'front-page';
				}

				$classes[] = 'no-js';

				return $classes;
			},
		],
		[
			Hooks::TAG      => 'genesis_before',
			Hooks::CALLBACK => function () {
				?>
                <script>
                    //<![CDATA[
                    (function () {
                        var c = document.body.classList;
                        c.remove('no-js');
                        c.add('js');
                    })();
                    //]]>
                </script>
				<?php
			},
			Hooks::PRIORITY => 1,
		],
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
			Hooks::TAG      => 'genesis_attr_content-sidebar-wrap',
			Hooks::CALLBACK => function ( $atts ) {
				$atts['class'] = 'wrap';

				return $atts;
			},
		],
		[
			Hooks::TAG      => 'genesis_structural_wrap-footer',
			Hooks::CALLBACK => function ( $output, $original_output ) {
				if ( 'open' == $original_output ) {
					$output = '<div class="footer-credits">' . $output;
				} elseif ( 'close' == $original_output ) {
					$backtotop = '<a href="#" rel="nofollow" class="backtotop">' . __( 'Return to top', 'genesis-starter-theme' ) . '</a>';
					$output    = $backtotop . $output . $output;
				}

				return $output;
			},
			Hooks::PRIORITY => 10,
			Hooks::ARGS     => 2,
		],
		[
			Hooks::TAG      => 'genesis_before',
			Hooks::CALLBACK => function () {
				if ( 'center-content' === genesis_site_layout() ) {
					add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
				}
			}
		],
		[
			Hooks::TAG      => 'admin_init',
			Hooks::CALLBACK => function () {
				add_editor_style( 'editor.css' );
			},
		],
		[
			Hooks::TAG      => 'genesis_setup',
			Hooks::CALLBACK => function () {
				register_default_headers( [
					'child' => [
						'url'           => '%2$s/resources/img/hero.jpg',
						'thumbnail_url' => '%2$s/resources/img/hero.jpg',
						'description'   => __( 'Hero Image', 'corporate-pro' ),
					],
				] );
			},
			Hooks::PRIORITY => 20,
		],
		[
			Hooks::TAG      => 'genesis_entry_content',
			Hooks::CALLBACK => function () {
				if ( is_singular( 'post' ) && get_theme_mod( 'single_post_featured_image', true ) ) {
					printf( "<p>%s</p>", genesis_get_image( [
						'size' => 'hero',
					] ) );
				}
			},
			Hooks::PRIORITY => 0,
		],
		[
			Hooks::TAG      => 'child_theme_after_title_area',
			Hooks::CALLBACK => 'genesis_do_nav',
		],
		[
			Hooks::TAG      => 'child_theme_after_header_wrap',
			Hooks::CALLBACK => 'genesis_do_subnav',
		],
		[
			Hooks::TAG      => 'child_theme_before_footer_wrap',
			Hooks::CALLBACK => 'genesis_footer_widget_areas',
		],
		[
			Hooks::TAG      => 'genesis_widget_column_classes',
			Hooks::CALLBACK => function ( $column_classes ) {
				$column_classes[] = 'one-fifth';
				$column_classes[] = 'two-fifths';
				$column_classes[] = 'three-fifths';
				$column_classes[] = 'four-fifths';
				$column_classes[] = 'full-width';

				return $column_classes;
			},
		],
	],
	Hooks::REMOVE => [
		[
			Hooks::TAG         => 'genesis_doctype',
			Hooks::CALLBACK    => 'genesis_do_doctype',
			Hooks::CONDITIONAL => function () {
				return is_admin_bar_showing();
			}
		],
		[
			Hooks::TAG      => 'genesis_meta',
			Hooks::CALLBACK => 'genesis_load_stylesheet',
		],
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

$core_image_sizes = [
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

$core_layouts = [
	PageLayouts::REGISTER   => [
		[
			'id'    => 'center-content',
			'label' => __( 'Center Content', 'genesis-starter-theme' ),
			'img'   => get_stylesheet_directory_uri() . '/resources/img/center-content.gif',
		]
	],
	PageLayouts::UNREGISTER => [
		// PageLayouts::CONTENT_SIDEBAR,
		// PageLayouts::SIDEBAR_CONTENT,
		// PageLayouts::FULL_WIDTH_CONTENT,
		PageLayouts::CONTENT_SIDEBAR_SIDEBAR,
		PageLayouts::SIDEBAR_SIDEBAR_CONTENT,
		PageLayouts::SIDEBAR_CONTENT_SIDEBAR,
	],
];

$core_page_templates = [
	PageTemplate::REGISTER => [
		'/resources/views/page-full.php'    => 'Full Width',
		'/resources/views/page-landing.php' => 'Landing Page',
	],
];

$core_plugins = [
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

if ( class_exists( 'WooCommerce' ) ) {
	$core_plugins[ PluginActivation::REGISTER ][] = [
		PluginActivation::NAME     => 'Genesis Connect for WooCommerce',
		PluginActivation::SLUG     => 'genesis-connect-woocommerce',
		PluginActivation::REQUIRED => false,
	];
}

$core_post_type_support = [
	PostTypeSupport::ADD => [
		[
			PostTypeSupport::POST_TYPE => 'page',
			PostTypeSupport::SUPPORTS  => 'excerpt',
		],
	],
];

$core_simple_social_icons = [
	SimpleSocialIcons::DEFAULTS => [
		SimpleSocialIcons::NEW_WINDOW => 1,
		SimpleSocialIcons::SIZE       => 40,
	],
];

$core_textdomain = [
	TextDomain::DOMAIN => 'genesis-starter-theme',
];

$core_theme_support = [
	ThemeSupport::ADD => [
		'align-wide'                  => null,
		'automatic-feed-links'        => null,
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
		'custom-header'               => [
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
				'SeoThemes\Core\HeroSection',
				'custom_header',
			],
		],
		'genesis-accessibility'       => [
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links',
		],
		'genesis-after-entry-widget-area',
		'genesis-footer-widgets'      => 3,
		'genesis-menus'               => [
			'primary'   => __( 'Header Menu', 'genesis-starter-theme' ),
			'secondary' => __( 'After Header Menu', 'genesis-starter-theme' ),
		],
		'genesis-responsive-viewport' => null,
		'genesis-structural-wraps'    => [
			'header',
			'menu-secondary',
			'footer-widgets',
			'footer',
		],
		'gutenberg'                   => [
			'wide-images' => true,
		],
		'html5'                       => [
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		],
		'post-thumbnails',
		'woocommerce'                 => null,
		'wc-product-gallery-zoom'     => null,
		'wc-product-gallery-lightbox' => null,
		'wc-product-gallery-slider'   => null,
		'wp-block-styles'             => null,
	],
];

$core_widget_areas = [
	WidgetArea::REGISTER   => [
		[
			WidgetArea::ID           => 'front-page-1',
			WidgetArea::NAME         => __( 'Front Page 1', 'genesis-starter-theme' ),
			WidgetArea::DESCRIPTION  => __( 'Front Page 1 widget area.', 'genesis-starter-theme' ),
			WidgetArea::LOCATION     => 'genesis_loop',
			WidgetArea::BEFORE_TITLE => '<h1 itemprop="headline">',
			WidgetArea::AFTER_TITLE  => '</h1>',
			WidgetArea::BEFORE       => function () {
				ob_start();
				the_custom_header_markup();
				$custom_header = ob_get_clean();

				return '<div class="front-page-1 widget-area">' . $custom_header . '<div class="wrap">';
			},
			WidgetArea::CONDITIONAL  => function () {
				return is_front_page();
			},
		],
		[
			WidgetArea::ID          => 'front-page-2',
			WidgetArea::NAME        => __( 'Front Page 2', 'genesis-starter-theme' ),
			WidgetArea::DESCRIPTION => __( 'Front Page 2 widget area.', 'genesis-starter-theme' ),
			WidgetArea::LOCATION    => 'genesis_loop',
			WidgetArea::CONDITIONAL => function () {
				return is_front_page();
			},
		],
		[
			WidgetArea::ID          => 'front-page-3',
			WidgetArea::NAME        => __( 'Front Page 3', 'genesis-starter-theme' ),
			WidgetArea::DESCRIPTION => __( 'Front Page 3 widget area.', 'genesis-starter-theme' ),
			WidgetArea::LOCATION    => 'genesis_loop',
			WidgetArea::CONDITIONAL => function () {
				return is_front_page();
			},
		],
	],
	WidgetArea::UNREGISTER => [
		WidgetArea::SIDEBAR_ALT,
	],
];

return [
	AssetLoader::class       => $core_assets,
	Constants::class         => $core_constants,
	Customizer::class        => $core_customizer,
	CustomColors::class      => $core_custom_colors,
	Example::class           => $core_example,
	GenesisSettings::class   => $core_genesis_settings,
	GoogleFonts::class       => $core_google_fonts,
	HeroSection::class       => $core_hero_section,
	Hooks::class             => $core_hooks,
	ImageSizes::class        => $core_image_sizes,
	PageLayouts::class       => $core_layouts,
	PageTemplate::class      => $core_page_templates,
	PluginActivation::class  => $core_plugins,
	PostTypeSupport::class   => $core_post_type_support,
	SimpleSocialIcons::class => $core_simple_social_icons,
	TextDomain::class        => $core_textdomain,
	ThemeSupport::class      => $core_theme_support,
	WidgetArea::class        => $core_widget_areas,
];

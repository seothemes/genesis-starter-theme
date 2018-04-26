<?php
/**
 * Genesis Starter Theme
 *
 * This file registers the required plugins for the Genesis Starter theme.
 *
 * @package   SEOThemes\Library
 * @link      https://github.com/seothemes/seothemes-library
 * @author    SEO Themes
 * @copyright Copyright © 2017 SEO Themes
 * @license   GPL-2.0+
 */

namespace SEOThemes\Library\Config;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

return [

	/*
	|--------------------------------------------------------------------------
	| Autoload Files
	|--------------------------------------------------------------------------
	*/
	'autoload' => [
		'admin/css-handler',
		'admin/customizer',
		'classes/class-colors',
		'classes/class-plugins',
		'classes/class-rgba',
		'css/load-styles',
		'functions/general',
		'functions/head',
		'functions/utilities',
		'functions/layout',
		'functions/markup',
		'functions/setup',
		'functions/templates',
		'functions/upgrade',
		'functions/widgetize',
		'js/load-scripts',
		'structure/footer',
		'structure/header',
		'structure/hero',
		'structure/logo',
		'structure/menu',
	],

	/*
	|--------------------------------------------------------------------------
	| Colors
	|--------------------------------------------------------------------------
	*/
	'colors' => [
		'primary'   => '#b0b5ba',
		'secondary' => 'rgba(255, 255, 255, 0.95)',
	],

	/*
	|--------------------------------------------------------------------------
	| Genesis Defaults
	|--------------------------------------------------------------------------
	*/
	'genesis-settings' => [
		'blog_cat_num'              => 6,
		'content_archive'           => 'excerpt',
		'content_archive_limit'     => 300,
		'content_archive_thumbnail' => 1,
		'image_alignment'           => 'alignnone',
		'image_size'                => 'large',
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'content-sidebar',
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
	| Post Type Support
	|--------------------------------------------------------------------------
	*/
	'post-type-support' => [
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
	| Theme Supports
	|--------------------------------------------------------------------------
	*/
	'theme-support' => [
		'align-wide'                      => null,
		'automatic-feed-links'            => null,
		'custom-background'               => array(
			'default-color' => 'ffffff',
		),
		'custom-logo'                     => array(
			'height'      => 100,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( '.site-title', '.site-description' ),
		),
		'custom-header'                   => array(
			'header-selector'    => '.hero',
			'default_image'      => CHILD_THEME_DIR . '/assets/images/hero.jpg',
			'width'              => 1280,
			'height'             => 720,
			'flex-height'        => true,
			'flex-width'         => true,
			'uploads'            => true,
			'video'              => true,
			'wp-head-callback'   => 'SEOThemes\Library\Functions\Utils\custom_header',
		),
		'genesis-accessibility'           => array(
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links',
		),
		'genesis-after-entry-widget-area' => null,
		'genesis-footer-widgets'          => 4,
		'genesis-menus'                   => array(
			'primary'   => __( 'Header Menu', CHILD_THEME_HANDLE ),
			'secondary' => __( 'After Header Menu', CHILD_THEME_HANDLE ),
		),
		'genesis-responsive-viewport'     => null,
		'genesis-structural-wraps'        => array(
			'header',
			'menu-primary',
			'menu-secondary',
			'footer-widgets',
			'footer',
		),
		'gutenberg'                       => array(
			'wide-images' => true,
		),
		'html5'                           => [
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		],
		'post-formats'                    => array(
			'aside',
			'audio',
			'chat',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video',
		),
		'post-thumbnails'                 => null,
		'woocommerce'                     => null,
		'wc-product-gallery-zoom'         => null,
		'wc-product-gallery-lightbox'     => null,
		'wc-product-gallery-slider'       => null,
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
	| Widget Areas
	|--------------------------------------------------------------------------
	*/
	'widget-areas' => [
		'before-header',
		'header-right',
		'after-entry',
		'sidebar',
		// 'sidebar-alt',
		'before-footer',
		'footer-credits',
	],

];

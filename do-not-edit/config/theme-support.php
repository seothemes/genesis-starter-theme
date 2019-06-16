<?php

namespace SeoThemes\GenesisStarterTheme;

return [
	'add' => [
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
//		'header-selector'  => '.custom-header',
			'default_image' => get_stylesheet_directory_uri() . '/assets/img/custom-header.jpg',
			'header-text'   => false,
			'width'         => 1280,
			'height'        => 720,
			'flex-height'   => true,
			'flex-width'    => true,
			'uploads'       => true,
			'video'         => true,
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
		'genesis-footer-widgets'   => 3,
		'genesis-menus'            => [
			'primary'   => __( 'Header Menu', 'genesis-starter-theme' ),
			'secondary' => __( 'After Header Menu', 'genesis-starter-theme' ),
		],
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

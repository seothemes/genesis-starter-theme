<?php
/**
 * Genesis Starter Theme
 *
 * WARNING: This file should never be modified under any circumstances.
 * Customizations should be made in the form of a core-functionality
 * plugin so that the theme can be updated without losing changes.
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\GenesisStarterTheme;

return [
	'scripts' => [
		[
			'handle' => 'genesis-starter-theme-editor',
			'src'    => get_stylesheet_directory_uri() . '/do-not-edit/assets/js/editor.js',
			'deps'   => [ 'wp-blocks' ],
			'editor' => true,
		],
	],
	'styles'  => [
		[
			'handle' => 'genesis-starter-theme-main',
			'src'    => get_stylesheet_directory_uri() . '/do-not-edit/assets/css/main.css',
		],
		[
			'handle' => 'genesis-starter-theme-editor',
			'src'    => get_stylesheet_directory_uri() . '/do-not-edit/assets/css/editor.css',
			'editor' => true,
		],
		[
			'handle' => 'genesis-starter-theme',
			'src'    => get_stylesheet_directory_uri() . '/style.css',
		],
		[
			'handle'      => 'genesis-starter-theme-woocommerce',
			'src'         => get_stylesheet_directory_uri() . '/style.css',
			'conditional' => function () {
				return class_exists( 'WooCommerce' ) ? true : false;
			},
		],
	],
];

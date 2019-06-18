<?php

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
	],
	'menus'   => [
		'script' => [
			'mainMenu'         => '<span class="hamburger"></span><span class="screen-reader-text">' . __( 'Menu', 'genesis-starter-theme' ) . '</span>',
			'menuIconClass'    => null,
			'subMenuIconClass' => null,
			'menuClasses'      => [
				'combine' => [
					'.nav-primary',
					'.nav-secondary',
				],
			],
		],
		'extras' => [
			'media_query_width' => '896px',
		],
	],
];

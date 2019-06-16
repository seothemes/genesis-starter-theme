<?php

namespace SeoThemes\GenesisStarterTheme;

return [
	'header' => [
		'display-logo'    => true,
		'title-area-hook' => true,
		'default-headers' => [
			'child' => [
				'url'           => '%2$s/do-not-edit/assets/img/hero.jpg',
				'thumbnail_url' => '%2$s/do-not-edit/assets/img/hero.jpg',
				'description'   => __( 'Hero Image', 'genesis-starter-theme' ),
			],
		],
	],
	'wrap'   => [
		'wrap-hooks'           => true,
		'content-sidebar-wrap' => true,
	],
	'menus'  => [
		'reposition-primary'   => true,
		'reposition-secondary' => true,
	],
	'hero'   => [
		'enable' => true,
	],
	'footer' => [
		'reposition-widgets' => true,
		'footer-credits'     => [
			'back-to-top' => [
				'text'  => __( 'Return to top', 'genesis-starter-theme' ),
				'url'   => '#',
				'class' => 'back-to-top',
			],
		],
	],
];

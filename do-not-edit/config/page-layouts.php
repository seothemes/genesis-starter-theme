<?php

namespace SeoThemes\GenesisStarterTheme;

return [
	'register'   => [
		[
			'id'    => 'center-content',
			'label' => __( 'Center Content', 'genesis-starter-theme' ),
			'img'   => get_stylesheet_directory_uri() . '/do-not-edit/assets/img/center-content.gif',
		]
	],
	'unregister' => [
		'content-sidebar-sidebar',
		'sidebar-sidebar-content',
		'sidebar-content-sidebar',
	],
];

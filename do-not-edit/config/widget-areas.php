<?php

namespace SeoThemes\GenesisStarterTheme;

return [
	'register'             => [
		[
			'id'          => 'footer-credits',
			'name'        => __( 'Footer Credits', 'genesis-starter-theme' ),
			'description' => __( 'The Footer Credits widget area.', 'genesis-starter-theme' ),
			'location'    => 'genesis_after_footer_wrap',
		],
	],
	'unregister'=> [
		'sidebar-alt',
	],
];

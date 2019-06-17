<?php

namespace SeoThemes\GenesisStarterTheme;

$plugins = [];

if ( class_exists( 'WooCommerce' ) ) {
	$plugins[] = [
		'name'     => 'Genesis Connect for WooCommerce',
		'slug'     => 'genesis-connect-woocommerce',
		'required' => false,
	];
}

return [
	'register' => $plugins,
	'settings' => [
		'setting_has_notices' => true,
		'setting_dismissable' => false,
	],
];

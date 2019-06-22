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

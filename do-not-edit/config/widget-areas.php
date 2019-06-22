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

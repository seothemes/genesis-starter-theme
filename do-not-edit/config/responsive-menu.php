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
];
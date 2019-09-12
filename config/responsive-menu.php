<?php
/**
 * Genesis Starter Theme.
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-2.0-or-later
 */

namespace SeoThemes\GenesisStarterTheme;

return [
	'script' => [
		'mainMenu'         => sprintf( '<span class="hamburger"> </span><span class="screen-reader-text">%s</span>', __( 'Menu', 'genesis-starter-theme' ) ),
		'menuIconClass'    => null,
		'subMenuIconClass' => null,
		'menuClasses'      => [
			'combine' => [
				'.nav-primary',
				'.nav-secondary',
			],
		],
		'menuAnimation'    => [
			'effect'   => 'fadeToggle',
			'duration' => 'fast',
			'easing'   => 'swing',
		],
		'subMenuAnimation' => [
			'effect'   => 'slideToggle',
			'duration' => 'fast',
			'easing'   => 'swing',
		],
	],
	'extras' => [
		'media_query_width' => '896px',
	],
];

<?php
/**
 * Genesis Starter Theme
 *
 * WARNING: This file is should not be modified under any circumstances.
 * Customizations should be made in the form of a core-functionality
 * plugin so that the theme can be updated without losing changes.
 *
 * @package   SEOThemes\GenesisStarterTheme
 * @link      https://seothemes.com/genesis-starter-theme
 * @author    SEO Themes
 * @copyright Copyright © 2018 SEO Themes
 * @license   GPL-2.0-or-later
 */

namespace SEOThemes\GenesisStarterTheme;

use SEOThemes\ChildThemeLibrary\Theme as GenesisChildTheme;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {

	require_once __DIR__ . '/vendor/autoload.php';

	$child_theme = new GenesisChildTheme();
	$child_theme->init();

}

<?php
/**
 * Genesis Starter Theme
 *
 * This file contains the core functionality for this child theme.
 *
 * @package   SEOThemes\GenesisStarterTheme
 * @link      https://seothemes.com/genesis-starter-theme
 * @author    SEO Themes
 * @copyright Copyright © 2018 SEO Themes
 * @license   GPL-2.0-or-later
 */

// Load child theme (do not remove).
if ( file_exists( __DIR__ . '/app/autoload.php' ) ) {

	require_once __DIR__ . '/app/autoload.php';

	new SEOThemes\ChildThemeLibrary\Theme();

}

/*
|--------------------------------------------------------------------------
| Place any custom code below this line.
|--------------------------------------------------------------------------
*/

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
 * @license   GPL-3.0-or-later
 */

namespace SEOThemes\GenesisStarterTheme;

add_action( 'genesis_setup', __NAMESPACE__ . '\\child_theme_setup' );
/**
 * Child theme setup.
 *
 * Hooking to `genesis_setup` means we don't have to "start the engine"
 * by requiring the Genesis `lib/init.php` file, and it provides us
 * with access to all of Genesis functions once it's been loaded.
 *
 * @since  3.2.0
 *
 * @return void
 */
function child_theme_setup() {

	$vendor = require_once __DIR__ . '/vendor/autoload.php';
	$config = require_once __DIR__ . '/config/defaults.php';

	/**
	 * Set up child theme using d2/core.
	 *
	 * Passes all of the theme configuration over to d2/core, which is responsible
	 * for instantiating the components and injecting the correct configuration.
	 * Custom components can be created and loaded from the `app/` directory.
	 *
	 * @link  https://github.com/d2themes/core
	 *
	 * @uses  \D2\Core\Theme::setup()
	 *
	 * @since 3.2.0
	 */
	\D2\Core\Theme::setup( $config );

	/**
	 * Hook to execute code after child theme setup.
	 *
	 * @since  3.2.0
	 */
	do_action( 'child_theme_setup' );
}

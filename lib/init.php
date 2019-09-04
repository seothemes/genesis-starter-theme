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

array_map(
	function ( $file ) {
		$filename = __DIR__ . "/$file.php";

		if ( is_readable( $filename ) ) {
			require_once $filename;
		}
	},
	[
		// Composer.
		'../vendor/autoload',

		// Functions.
		'functions/helpers',
		'functions/setup',
		'functions/enqueue',
		'functions/markup',
		'functions/header',
		'functions/widgets',
		'functions/defaults',

		// Structure.
		'structure/archive',
		'structure/comments',
		'structure/footer',
		'structure/header',
		'structure/hero',
		'structure/home',
		'structure/menus',
		'structure/pagination',
		'structure/single',
		'structure/wrap',

		// Shortcodes.
		'shortcodes/hook',
		'shortcodes/search-form',
		'shortcodes/widget-area',

		// Plugins.
		'plugins/gravity-forms',
		'plugins/woocommerce',
	]
);

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

// Display custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

add_filter( 'genesis_markup_title-area_close', __NAMESPACE__ . '\title_area_hook', 10, 1 );
/**
 * Add custom hook after the title area.
 *
 * @since 3.4.0
 *
 * @param $close_html
 *
 * @return string
 */
function title_area_hook( $close_html ) {
	if ( $close_html ) {
		ob_start();
		do_action( 'genesis_after_title_area' );
		$close_html = $close_html . ob_get_clean();
	}

	return $close_html;
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\default_header' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function default_header() {
	register_default_headers( [
		'child' => [
			'url'           => '%2$s/do-not-edit/assets/img/hero.jpg',
			'thumbnail_url' => '%2$s/do-not-edit/assets/img/hero.jpg',
			'description'   => __( 'Hero Image', 'genesis-starter-theme' ),
		],
	] );
}

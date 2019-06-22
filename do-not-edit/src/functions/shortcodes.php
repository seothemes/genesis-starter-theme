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

add_shortcode( 'hook', __NAMESPACE__ . '\hook_shortcode' );
/**
 * Creates a hook shortcode.
 *
 * @since 3.4.0
 *
 * @param array $atts Shortcode arguments.
 *
 * @return mixed
 */
function hook_shortcode( $atts ) {
	if ( is_admin() ) {
		return false;
	}

	$atts = shortcode_atts(
		[
			'id' => 'custom',
		],
		$atts,
		'widget_area'
	);

	return do_action( $atts['id'] );
}

add_shortcode( 'search_form', __NAMESPACE__ . '\search_form_shortcode' );
/**
 * Displays a search form.
 *
 * @since 3.4.0
 *
 * @return string
 */
function search_form_shortcode() {
	if ( is_admin() ) {
		return false;
	}

	return get_search_form( false );
}

add_shortcode( 'widget_area', __NAMESPACE__ . '\widget_area_shortcode' );
/**
 * Displays a widget area.
 *
 * @since 3.4.0
 *
 * @param array $atts Shortcode arguments.
 *
 * @return mixed
 */
function widget_area_shortcode( $atts ) {
	if ( is_admin() ) {
		return false;
	}

	$atts = shortcode_atts(
		[
			'id' => 'footer-credits',
		],
		$atts,
		'widget_area'
	);

	ob_start();
	genesis_widget_area( $atts['id'], [
		'before' => '<div class="' . $atts['id'] . ' widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	] );

	return ob_get_clean();
}

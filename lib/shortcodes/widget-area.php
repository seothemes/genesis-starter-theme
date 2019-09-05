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

namespace SeoThemes\GenesisStarterTheme\Shortcodes;

\add_shortcode( 'widget_area', __NAMESPACE__ . '\widget_area_shortcode' );
/**
 * Displays a widget area.
 *
 * @since 3.5.0
 *
 * @param array $atts Shortcode arguments.
 *
 * @return mixed
 */
function widget_area_shortcode( $atts ) {
	if ( \is_admin() ) {
		return false;
	}

	$atts = \shortcode_atts(
		[
			'id' => 'footer-credits',
		],
		$atts,
		'widget_area'
	);

	\ob_start();
	\genesis_widget_area(
		$atts['id'],
		[
			'before' => '<div class="' . $atts['id'] . ' widget-area"><div class="wrap">',
			'after'  => '</div></div>',
		]
	);

	return \ob_get_clean();
}

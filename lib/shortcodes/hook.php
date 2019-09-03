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

add_shortcode( 'hook', __NAMESPACE__ . '\hook_shortcode' );
/**
 * Creates a hook shortcode.
 *
 * @since 3.5.0
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

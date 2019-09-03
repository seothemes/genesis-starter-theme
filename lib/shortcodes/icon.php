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

add_shortcode( 'icon', __NAMESPACE__ . '\icon_shortcode' );
/**
 * Creates a icon shortcode.
 *
 * @since 3.5.0
 *
 * @link  https://fontawesome.com/icons
 *
 * @param array $atts Shortcode arguments.
 *
 * @return string
 */
function icon_shortcode( $atts ) {
	if ( is_admin() ) {
		return '';
	}

	$atts = shortcode_atts(
		[
			'style'      => 's',
			'name'       => 'star',
			'size'       => 'sm',
			'rotate'     => null,
			'flip'       => null,
			'spin'       => null,
			'color'      => null,
			'background' => null,
			'align'      => null,
			'extra'      => null,
		],
		$atts,
		'icon'
	);

	$classes = array_filter(
		[
			'style'  => "fa${atts['style']}",
			'name'   => "fa-${atts['name']}",
			'size'   => "fa-${atts['size']}",
			'rotate' => $atts['rotate'] ? "fa-${atts['rotate']}" : '',
			'flip'   => $atts['flip'] ? "fa-${atts['flip']}" : '',
			'spin'   => $atts['spin'] ? "fa-${atts['spin']}" : '',
			'color'  => $atts['color'] ? "has-${atts['color']}-color" : '',
			'bg'     => $atts['background'] ? "has-${atts['background']}-background-color" : '',
			'align'  => $atts['align'] ? "align${atts['align']}" : '',
			'extra'  => $atts['extra'] ?: '',
		]
	);

	return sprintf(
		'<i class="%s"><span class="screen-reader-text">%s</span></i>',
		trim( implode( ' ', $classes ) ),
		ucwords( str_replace( '-', ' ', $atts['name'] ) )
	);
}

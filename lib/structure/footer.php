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

namespace SeoThemes\GenesisStarterTheme\Structure;

// Repositions the footer widgets.
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
add_action( 'genesis_footer', 'genesis_footer_widget_areas', 6 );

add_filter( 'genesis_footer_output', __NAMESPACE__ . '\footer_credits_wrap' );
/**
 * Outputs the footer credits markup.
 *
 * @since 3.5.0
 *
 * @param string $output Footer credits output.
 *
 * @return string
 */
function footer_credits_wrap( $output ) {
	$open = \genesis_markup(
		[
			'open'    => '<div class="footer-credits"><div class="wrap">',
			'context' => 'footer-credits',
			'echo'    => false,
		]
	);

	$close = \genesis_markup(
		[
			'close'   => '</div></div>',
			'context' => 'footer-credits',
			'echo'    => false,
		]
	);

	return $open . $output . $close;
}

add_action( 'genesis_footer', __NAMESPACE__ . '\before_footer_widget', 5 );
/**
 * Displays before footer widget area.
 *
 * @since 3.5.0
 *
 * @return void
 */
function before_footer_widget() {
	\genesis_widget_area(
		'before-footer',
		[
			'before' => '<div class="before-footer"><div class="wrap">',
			'after'  => '</div></div>',
		]
	);
}

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

add_filter( 'genesis_markup_title-area_close', __NAMESPACE__ . '\title_area_hook', 10, 1 );
/**
 * Add custom hook after the title area.
 *
 * @since 3.5.0
 *
 * @param string $close_html Closing html markup.
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

add_action( 'genesis_before_header_wrap', __NAMESPACE__ . '\before_header_widget' );
/**
 * Displays the before header widget area.
 *
 * @since 3.5.0
 *
 * @return void
 */
function before_header_widget() {
	\genesis_widget_area(
		'before-header',
		[
			'before' => '<div class="before-header"><div class="wrap">',
			'after'  => '</div></div>',
		]
	);
}

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

// Reposition footer widgets.
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
add_action( 'genesis_before_footer_wrap', 'genesis_footer_widget_areas' );

add_action('genesis_before', __NAMESPACE__ . '\footer_credits_widget');
/**
 * Description of expected behavior.
 *
 * @since 3.4.0
 *
 * @return void
 */
function footer_credits_widget() {
	if ( is_active_sidebar( 'footer-credits' ) ) {
		remove_action( 'genesis_footer', 'genesis_do_footer' );

	} else {
		add_filter( 'genesis_structural_wrap-footer', __NAMESPACE__ . '\footer_credits', 10, 2 );
	}
}

/**
 * Description of expected behavior.
 *
 * @since 3.4.0
 *
 * @param string $output          New output.
 * @param string $original_output Original output.
 *
 * @return string
 */
function footer_credits( $output, $original_output ) {
	if ( 'open' == $original_output ) {
		$output = '<div class="footer-credits">' . $output;

	} elseif ( 'close' == $original_output ) {
		$backtotop = '<a href="#" rel="nofollow" class="back-to-top">' . __( 'Return to top', 'genesis-starter-theme' ) . '</a>';
		$output    = $backtotop . $output . $output;
	}

	return $output;
}

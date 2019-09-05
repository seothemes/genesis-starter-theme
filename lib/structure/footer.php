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

\add_action( 'genesis_footer', __NAMESPACE__ . '\before_footer_widget', 5 );
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

// Repositions the footer widgets.
\remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
\add_action( 'genesis_footer', 'genesis_footer_widget_areas', 6 );

// Remove default footer.
\remove_action( 'genesis_footer', 'genesis_do_footer' );

\add_action( 'genesis_footer', __NAMESPACE__ . '\do_footer_credits' );
/**
 * Output custom footer credits.
 *
 * @since 1.0.0
 *
 * @return void
 */
function do_footer_credits() {
	\genesis_markup(
		[
			'open'    => '<div class="footer-credits"><div class="wrap"><p>',
			'context' => 'footer-credits',
		]
	);

	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- sanitized already.
	echo \do_shortcode( \genesis_strip_p_tags( \wp_kses_post( \genesis_get_option( 'footer_text' ) ) ) );

	\genesis_markup(
		[
			'close'   => '</p></div></div>',
			'context' => 'footer-credits',
		]
	);
}

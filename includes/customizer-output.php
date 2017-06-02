<?php
/**
 * This file adds customizer output to the Genesis Starter theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/themes/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Checks the settings for the header, link, accent and footer colors.
 * If any of these value are set the appropriate CSS is output.
 *
 * @var   array $starter_colors Global theme colors.
 */
function starter_customizer_output() {

	// Set in customizer-settings.php.
	global $starter_colors;

	// Shorten the name for legibility.
	$color = $starter_colors;

	/**
	 * Loop though each color in the global array of theme colors
	 * and create a new variable for each.
	 *
	 * @var array $starter_colors See customizer-settings.php
	 */
	foreach ( $color as $id => $hex ) {
		${"$id"} = get_theme_mod( "starter_{$id}_color",  $hex );
	}

	// Start building CSS.
	$css = '';

	$css .= ( $color['accent'] !== $accent ) ? sprintf( '

		a:hover,
		.entry-title a:hover,
		.site-title a:hover,
		.breadcrumb a:hover,
		.site-footer a:hover,
		.site-footer .back-to-top:hover,
		.genesis-nav-menu .mega-menu .menu-description span:hover,
		.woocommerce div.product p.price,
		.woocommerce div.product span.price,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
		.woocommerce ul.products li.product h3:hover,
		.woocommerce ul.products li.product .price,
		.woocommerce .woocommerce-breadcrumb a:hover,
		.woocommerce .widget_layered_nav ul li.chosen a::before,
		.woocommerce .widget_layered_nav_filters ul li a::before,
		.woocommerce .widget_rating_filter ul li.chosen a::before,
		.woocommerce-error::before,
		.woocommerce-info::before,
		.woocommerce-message::before {
			color: %1$s;
		}

		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.button,
		.archive-pagination a:hover,
		.archive-pagination .active a,
		.before-header,
		.before-header .fa-close,
		.cart-count,
		.woocommerce a.button:hover,
		.woocommerce a.button,
		.woocommerce button.button:hover,
		.woocommerce button.button,
		.woocommerce input.button:hover,
		.woocommerce input.button,
		.woocommerce input[type="submit"]:hover,
		.woocommerce input[type="submit"],
		.woocommerce span.onsale,
		.woocommerce #respond input#submit:hover,
		.woocommerce #respond input#submit,
		.woocommerce input.button[type=submit],
		.woocommerce input.button[type=submit]:hover,
		.woocommerce.widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce.widget_price_filter .ui-slider .ui-slider-range,
		.woocommerce .woocommerce-pagination .page-numbers .active a,
		.woocommerce .woocommerce-pagination .page-numbers a:hover {
			background-color: %1$s;
			color: %2$s;
		}

		@media (min-width: 768px) {

			.genesis-nav-menu .current-menu-item>a,
			.genesis-nav-menu .sub-menu .current-menu-item>a:hover,
			.genesis-nav-menu a:hover,
			.nav-primary .menu-item a:hover {
				color: %1$s;
			}
		}

		', $accent, starter_color_contrast( $accent ) ) : '';

	$css .= ( $color['links'] !== $links ) ? sprintf( '

		a,
		.breadcrumb a,
		.site-footer a,
		.archive-pagination a {
			color: %s;
		}

		', $links ) : '';

	$css .= ( $color['body'] !== $body ) ? sprintf( '

		body,
		input,
		select,
		textarea,
		button:disabled,
		input[type="button"]:disabled,
		input[type="reset"]:disabled,
		input[type="submit"]:disabled,
		.button:disabled,
		.breadcrumb,
		.search-form:before,
		.search-toggle,
		.search-toggle:hover,
		.site-header .fa-shopping-cart,
		.genesis-nav-menu .mega-menu .menu-description p,
		.genesis-nav-menu .mega-menu .menu-description span,
		.woocommerce ul.products li.product .price {
			color: %1$s;
		}

		::-moz-placeholder {
			color: %1$s;
		}

		::-webkit-input-placeholder {
			color: %1$s;
		}

		@media (min-width: 768px) {

			.genesis-nav-menu a,
			.nav-primary .menu-item a {
				color: %1$s;
			}
		}

		button.secondary,
		.button.secondary,
		button.secondary:hover,
		.button.secondary:hover,
		.woocommerce #respond input#submit.alt,
		.woocommerce #respond input#submit.alt:hover,
		.woocommerce a.button.alt,
		.woocommerce a.button.alt:hover,
		.woocommerce button.button.alt,
		.woocommerce button.button.alt:hover,
		.woocommerce input.button.alt,
		.woocommerce input.button.alt:hover,
		.woocommerce input.button[type=submit].alt,
		.woocommerce input.button[type=submit].alt:hover,
		.menu-toggle .hamburger,
		.menu-toggle .hamburger:after,
		.menu-toggle .hamburger:before {
			background-color: %1$s;
			color: %2$s;
		}

		', $body, starter_color_contrast( $body )  ) : '';

	$css .= ( $color['headings'] !== $headings ) ? sprintf( '

		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		.site-title a,
		.entry-title a,
		.widget-title {
			color: %1$s;
		}

		.pricing-table>div.featured h2,
		.pricing-table>div.featured h3,
		.pricing-table>div.featured h4,
		.pricing-table>div.featured h5,
		.pricing-table>div.featured h6 {
			background-color: %1$s;
		}

		', $headings ) : '';

	$css .= ( $color['light'] !== $light ) ? sprintf( '

		.nav-secondary,
		.before-footer,
		.pricing-table>div ul li:nth-of-type(2n),
		.pricing-table>div h2,
		.pricing-table>div h3,
		.pricing-table>div h4,
		.pricing-table>div h5,
		.pricing-table>div h6 {
			background-color: %s;
		}

		', $light ) : '';

	// Inline CSS handle.
	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	// Only output CSS if not empty.
	if ( $css ) {
		wp_add_inline_style( $handle, starter_minify_css( $css ) );
	}

}
add_action( 'wp_enqueue_scripts', 'starter_customizer_output', 100 );

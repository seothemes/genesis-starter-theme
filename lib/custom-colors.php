<?php
/**
 * This file adds customizer settings to the Genesis Starter theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Check for theme support.
 */
if ( ! current_theme_supports( 'custom-colors' ) ) {
	return;
}

/**
 * Get default link color for Customizer.
 * Abstracted here since at least two functions use it.
 *
 * @since 1.3
 *
 * @return string Hex color code for link color.
 */
function starter_default_text_color() {
	return '#333333';
}

/**
 * Get default accent color for Customizer.
 * Abstracted here since at least two functions use it.
 *
 * @since 1.3
 *
 * @return string Hex color code for accent color.
 */
function starter_default_link_color() {
	return '#dddddd';
}

/**
 * Get default accent color for Customizer.
 * Abstracted here since at least two functions use it.
 *
 * @since 1.3
 *
 * @return string Hex color code for accent color.
 */
function starter_default_button_color() {
	return '#555555';
}

/**
 * Get default accent color for Customizer.
 * Abstracted here since at least two functions use it.
 *
 * @since 1.3
 *
 * @return string Hex color code for accent color.
 */
function starter_default_outline_color() {
	return '#eeeeee';
}

// Create array of default colors.
$starter_default_colors = array(
	'color_text'	=> starter_default_text_color(),
	'color_link' 	=> starter_default_link_color(),
	'color_button'  => starter_default_button_color(),
	'color_outline'	=> starter_default_outline_color(),
);

/**
 * Register settings and controls with the Customizer.
 */
function starter_customizer_register() {

	// Global variables required.
	global $wp_customize;
	global $starter_default_colors;

	/**
	 * Customizer Color Settings
	 *
	 * Loop through each color variable set in `$starter_default_colors`
	 * and create a new setting and control.
	 */
	foreach ( $starter_default_colors as $key => $value ) {

		$wp_customize->add_setting( $key , array(
		    'default' => $value,
		    'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$key,
				array(
					'label'      => ucwords( str_replace( 'color_', '', $key ) ) . ' Color',
					'section'    => 'colors',
					'settings'   => $key,
				)
			)
		);
	}
}
add_action( 'customize_register', 'starter_customizer_register' );

/**
 * Checks the settings for the text, link, button & outline color.
 * If any of these value are set the appropriate CSS is output.
 *
 * @since 1.3
 */
function starter_custom_css() {

	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	$color_text = get_theme_mod( 'color_text', starter_default_text_color() );
	$color_link = get_theme_mod( 'color_link', starter_default_link_color() );
	$color_button = get_theme_mod( 'color_button', starter_default_button_color() );
	$color_outline = get_theme_mod( 'color_outline', starter_default_outline_color() );

	$css = '';

	$css .= ( starter_default_text_color() !== $color_text ) ? sprintf( '
		body,
		a:hover,
		a:focus,
		input,
		select,
		textarea,
		.archive-pagination a,
		.screen-reader-text:focus,
		.screen-reader-shortcut:focus,
		.genesis-nav-menu .search input[type="submit"]:focus,
		.widget_search input[type="submit"]:focus,
		.site-title a,
		.genesis-nav-menu a,
		.menu-toggle,
		.menu-toggle:focus,
		.menu-toggle:active,
		.menu-toggle:hover,
		.sidebar .widget-title a {
			color: %1$s;
		}
		.menu-toggle span {
			background-color: %1$s;
		}
		.sub-menu-toggle:before {
			border-top-color: %1$s;
		}
		.sub-menu-toggle.activated:before {
			border-top-color: %1$s;
		}
		', $color_text ) : '';

	$css .= ( starter_default_link_color() !== $color_link ) ? sprintf( '
		a,
		.entry-title a,
		.entry-title a:hover,
		button:disabled,
		input[type="button"]:disabled,
		input[type="reset"]:disabled,
		input[type="submit"]:disabled,
		.button:disabled,
		.site-title a:hover,
		.site-title a:focus,
		.genesis-nav-menu a:hover,
		.genesis-nav-menu a:focus,
		.genesis-nav-menu .current-menu-item > a,
		.genesis-nav-menu .sub-menu .current-menu-item > a:hover,
		.genesis-nav-menu .sub-menu .current-menu-item > a:focus {
			color: %1$s;
		}
		button.secondary,
		input[type="button"].secondary,
		input[type="reset"].secondary,
		input[type="submit"].secondary,
		.button.secondary {
			background-color: %1$s;
		}
		input:focus,
		select:focus,
		textarea:focus {
			border-color: %1$s;
		}
		', $color_link ) : '';

	$css .= ( starter_default_button_color() !== $color_button ) ? sprintf( '
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.button,
		.archive-pagination a:hover,
		.archive-pagination a:focus,
		.archive-pagination .active a {
			background-color: %1$s;
			color: %2$s;
		}
		.sidebar .enews-widget {
			background-color: %1$s;
		}
		.sidebar .enews-widget input[type="submit"],
		.sidebar .enews-widget input[type="submit"]:hover,
		.sidebar .enews-widget input[type="submit"]:focus {
			color: %1$s;
		}
		', $color_button, starter_color_contrast( $color_button ) ) : '';

	$css .= ( starter_default_outline_color() !== $color_outline ) ? sprintf( '
		.entry-content code {
			background-color: %1$s;
		}
		hr,
		td,
		.before-footer,
		.footer-widgets {
			border-top-color: %1$s;
		}
		tbody,
		.front-page-1,
		.front-page-2,
		.front-page-3,
		.front-page-4,
		.front-page-5,
		.before-header,
		.navbar,
		.hero,
		.nav-secondary {
			border-bottom-color: %1$s;
		}
		input,
		select,
		textarea {
			border-color: %1$s;
		}
		button:disabled,
		input[type="button"]:disabled,
		input[type="reset"]:disabled,
		input[type="submit"]:disabled,
		.button:disabled,
		.sidebar .enews-widget input[type="submit"],
		.sidebar .enews-widget input[type="submit"]:hover,
		.sidebar .enews-widget input[type="submit"]:focus {
			background-color: %1$s;
		}
		@media screen and (max-width:860px) {
			.genesis-nav-menu .sub-menu {
				border-top-color: %1$s;
			}
			.genesis-nav-menu .sub-menu a {
				border-color: %1$s;
			}
		}
		', $color_outline ) : '';

	// Output CSS if any customizations are made.
	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}
}
add_action( 'wp_enqueue_scripts', 'starter_custom_css', 9999 );



<?php
/**
 * This file adds customizer settings to the Genesis Starter theme.
 *
 * @package   GenesisStarter
 * @link      https://seothemes.com/themes/genesis-starter
 * @author    SEO Themes
 * @copyright Copyright © 2017 SEO Themes
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

/*
 * Add any theme custom colors here.
 */
$genesis_starter_colors = array(
	'primary'   => '#b0b5ba',
	'secondary' => 'rgba(255, 255, 255, 0.95)',
);

add_action( 'customize_register', 'genesis_starter_customize_register' );
/**
 * Sets up the theme customizer sections, controls, and settings.
 *
 * @access public
 * @param  object $wp_customize Global customizer object.
 *
 * @return void
 */
function genesis_starter_customize_register( $wp_customize ) {

	// Globals.
	global $wp_customize, $genesis_starter_colors;

	// Load RGBA Customizer control.
	include_once( get_stylesheet_directory() . '/includes/rgba.php' );

	/**
	 * Custom colors.
	 *
	 * Loop through the global variable array of colors and
	 * register a customizer setting and control for each.
	 * To add additional color settings, do not modify this
	 * function, instead add your color name and hex value to
	 * the $genesis_starter_colors` array at the start of this file.
	 */
	foreach ( $genesis_starter_colors as $id => $rgba ) {

		// Format ID and label.
		$setting = "genesis_starter_{$id}_color";
		$label   = ucwords( str_replace( '_', ' ', $id ) ) . __( ' Color', 'genesis-starter' );

		// Add color setting.
		$wp_customize->add_setting(
			$setting,
			array(
				'default'           => $rgba,
				'sanitize_callback' => 'sanitize_rgba_color',
			)
		);

		// Add color control.
		$wp_customize->add_control(
			new RGBA_Customize_Control(
				$wp_customize,
				$setting,
				array(
					'section'      => 'colors',
					'label'        => $label,
					'settings'     => $setting,
					'show_opacity' => true,
					'palette'      => array(
						'#000000',
						'#ffffff',
						'#dd3333',
						'#dd9933',
						'#eeee22',
						'#81d742',
						'#1e73be',
						'#8224e3',
					),
				)
			)
		);
	}
}

add_action( 'wp_enqueue_scripts', 'genesis_starter_customizer_output', 100 );
/**
 * Output customizer styles.
 *
 * Checks the settings for the colors defined in the settings.
 * If any of these value are set the appropriate CSS is output.
 *
 * @var   array $genesis_starter_colors Global theme colors.
 */
function genesis_starter_customizer_output() {

	// Set in customizer-settings.php.
	global $genesis_starter_colors;

	/**
	 * Loop though each color in the global array of theme colors
	 * and create a new variable for each. This is just a shorthand
	 * way of creating multiple variables that we can reuse. The
	 * benefit of using a foreach loop over creating each variable
	 * manually is that we can just declare the colors once in the
	 * `$genesis_starter_colors` array, and they can be used in multiple ways.
	 */
	foreach ( $genesis_starter_colors as $id => $hex ) {

		${"$id"} = get_theme_mod( "genesis_starter_{$id}_color",  $hex );

	}

	// Ensure $css var is empty.
	$css = '';

	/**
	 * Build the CSS.
	 *
	 * We need to concatenate each one of our colors to the $css
	 * variable, but first check if the color has been changed by
	 * the user from the theme customizer. If the theme mod is not
	 * equal to the default color then the string is appended to $css.
	 */
	$css .= ( $genesis_starter_colors['primary'] !== $primary ) ? sprintf( '

		.button:hover,
		button:hover,
		input[type="button"]:hover,
		input[type="reset"]:hover,
		input[type="submit"]:hover,
		.button.secondary,
		button.secondary,
		.archive-pagination a:hover,
		.archive-pagination .active a,
		.sidebar-primary .widget:first-of-type input[type="button"],
		.sidebar-primary .widget:first-of-type input[type="submit"] {
			background-color: %1$s;
		}

		a,
		.entry-title a:hover,
		.menu-item a:hover,
		.menu-item.current-menu-item > a {
			color: %1$s;
		}		

		', $primary ) : '';

	$css .= ( $genesis_starter_colors['secondary'] !== $secondary ) ? sprintf( '

		.page-header:before {
			background-color: %1$s;
		}

		', $secondary ) : '';

	// Style handle is the name of the theme.
	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	// Output CSS if not empty.
	if ( ! empty( $css ) ) {

		// Add the inline styles, also minify CSS first.
		wp_add_inline_style( $handle, genesis_starter_minify_css( $css ) );

	}

}

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

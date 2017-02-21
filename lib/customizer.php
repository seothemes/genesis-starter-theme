<?php
/**
 * This file adds customizer settings to the Genesis Starter theme.
 *
 * Requires WP SCSS
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// Update the default paths to match theme.
$wp_scss_options = get_option( 'wpscss_options' );

if ( '/sass/' !== $wp_scss_options['scss_dir'] || '/' !== $wp_scss_options['css_dir'] ) {

	// Alter the options array appropriately.
	$wp_scss_options['scss_dir'] = '/sass/';
	$wp_scss_options['css_dir'] = '/';

	// Update entire array.
	update_option( 'wpscss_options', $wp_scss_options );
}

// Create array of default colors.
$starter_default_colors = array(

	'color-text'	=> '#333333',
	'color-link' 	=> '#dddddd',
	'color-button'  => '#555555',
	'color-outline'	=> '#eeeeee',

);

// Set the default font family.
$starter_default_font_family = 'Roboto';

// Create array of default font settings.
$starter_default_fonts = array(

	'font-heading'		  => $starter_default_font_family,
	'font-body'			  => $starter_default_font_family,
	'font-size-heading'	  => '20',
	'font-size-body'	  => '15',
	'font-weight-heading' => '500',
	'font-weight-body'	  => '300',
	'line-height-heading' => '1.382',
	'line-height-body'	  => '1.618',

);

/**
 * Google Fonts
 *
 * This will be updated to use the Google Fonts API in a future version. E.g:
 * `$url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=YOUR_API_KEY';
 *  $json = json_decode( file_get_contents( $url ), true );`
 *
 * Also need to use something other than `file_get_contents` to comply
 * with WordPress Coding Standards.
 */

// Temporary Google Fonts file.
$json = json_decode( file_get_contents( get_stylesheet_directory() . '/lib/google-fonts.json' ), true );

// Create an array of font families with their variants.
foreach ( $json['items'] as $font ) {

	$starter_font_families[ $font['family'] ] = $font['family'];
	$starter_font_variants[ $font['family'] ] = $font['variants'];
}

/**
 * Update SCSS variables
 *
 * Store SCSS variables in an array that is passed to the `wp_scss_variables`
 * filter. If any customizations have been made then the theme_mod will be
 * used to override it's corresponding default variable.
 *
 * @return array $variables Contains all font variables.
 */
function wp_scss_set_font_variables() {

	// Get the defaults.
	global $starter_default_fonts;
	global $starter_default_colors;

	// Create array of color variables.
	$variables = [];

	foreach ( $starter_default_colors as $key => $value ) {

		$variables[ $key ] = get_theme_mod( $key, $value );

	}

	// Create array of font variables.
	foreach ( $starter_default_fonts as $key => $value ) {

		if ( 'font-size-body' === $key || 'font-size-heading' === $key ) {

			// Add px to value if variable is font-size.
			$variables[ $key ] = sprintf( '%spx', get_theme_mod( $key, $value ) );

		} elseif ( 'font-weight-body' === $key || 'font-weight-heading' === $key ) {

			// Convert 'regular' to 400 for valid CSS.
			if ( 'regular' === get_theme_mod( $key ) ) {
				$variables[ $key ] = '400';
			} else {
				$variables[ $key ] = get_theme_mod( $key, $value );
			}
		} else {

			// All other variables.
			$variables[ $key ] = get_theme_mod( $key, $value );

		}
	}
	return $variables;

}
add_filter( 'wp_scss_variables', 'wp_scss_set_font_variables' );

/**
 * Register settings and controls with the Customizer.
 */
function starter_customizer_fonts_register() {

	// Ensure Wp-Scss is active.
	if ( ! class_exists( 'Wp_Scss' ) ) {
		return;
	}

	// Global variables required.
	global $wp_customize;
	global $starter_default_colors;
	global $starter_default_fonts;
	global $starter_default_font_family;
	global $starter_font_families;
	global $starter_font_variants;

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
					'label'      => ucwords( str_replace( 'color-', '', $key ) ) . ' Color',
					'section'    => 'colors',
					'settings'   => $key,
				)
			)
		);
	}

	/**
	 * Customizer Font Settings
	 *
	 * Add a new Customizer section named Typography for all of the custom
	 * typography settings. There are 4 setting types in total, each has
	 * 2 settings, one for the body and one for headings:
	 *
	 * - Font Family
	 * - Font Size
	 * - Font Weight
	 * - Line Height
	 */
	$wp_customize->add_section( 'typography' , array(
	    'title'      => __( 'Typography', 'genesis-starter' ),
	    'description' => 'Please refresh the page after selecting a font family to update the available font weights.',
	    'priority'   => 20,
	) );

	// Counter.
	$i = 1;

	foreach ( $starter_default_fonts as $key => $value ) {

		// Capitalize words and replace characters in key.
		$label = ucwords( str_replace( array( '_', '-' ), array( ' ', ' ' ), $key ) );

		// Add settings.
		$wp_customize->add_setting( $key , array(
		    'default' => $value,
		) );

		// Add controls.
		if ( $i <= 2 ) {

			// Font family.
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$key,
					array(
						'label'      => $label,
						'section'    => 'typography',
						'settings'   => $key,
						'type'       => 'select',
						'choices'    => $starter_font_families,
					)
				)
			);

		} elseif ( $i <= 4 ) {

			// Font size.
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$key,
					array(
						'label'    	  => $label,
						'description' => sprintf( 'Default font size is %spx', $value ),
						'section'  	  => 'typography',
						'settings' 	  => $key,
						'type'     	  => 'number',
						'input_attrs' => array(
					        'min'   => 0,
					        'max'   => 100,
					        'step'  => 1,
					    ),
					)
				)
			);

		} elseif ( $i <= 6 ) {

			// Font weight.
			$font_family = get_theme_mod( str_replace( '-weight', '', $key ), $starter_default_font_family );

			// Get font family variants in array.
			$starter_font_family_variants = [];

			foreach ( $starter_font_variants[ $font_family ] as $keys => $value ) {

				// Remove italic options.
				if ( strpos( $value, 'italic' ) === false ) {

					if ( 'regular' === $value ) {
						$starter_font_family_variants[ $value ] = '400';
					} else {
						$starter_font_family_variants[ $value ] = $value;
					}
				}
			}

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$key,
					array(
						'label'    => $label,
						'section'  => 'typography',
						'settings' => $key,
						'type'     => 'select',
						'choices'  => $starter_font_family_variants,
					)
				)
			);
		} else {

			// Line height.
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$key,
					array(
						'label'       => $label,
						'description' => sprintf( 'Default line height is %s', $value ),
						'section'     => 'typography',
						'settings'    => $key,
						'type'     	  => 'number',
						'input_attrs' => array(
					        'min'   => 0,
					        'max'   => 10,
					        'step'  => .01,
					    ),
					)
				)
			);
		} // End if().
		$i++;
	} // End foreach().
}
add_action( 'customize_register', 'starter_customizer_fonts_register' );

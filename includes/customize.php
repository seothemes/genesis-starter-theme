<?php
/**
 * This file adds customizer settings to the Genesis Starter theme.
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

// Theme Customizer setup.
add_action( 'customize_register', 'starter_customize_register' );

/**
 * Sets up the theme customizer sections, controls, and settings.
 *
 * @access public
 * @param  object $wp_customize Global customizer object.
 * @return void
 */
function starter_customize_register( $wp_customize ) {

	// Load JavaScript files.
	add_action( 'customize_preview_init', 'starter_enqueue_customizer_scripts' );

	// Enable live preview for WordPress theme features.
	$wp_customize->get_setting( 'blogname' )->transport              = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport       = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'header_image' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'background_image' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'background_position_x' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_repeat' )->transport     = 'postMessage';
	$wp_customize->get_setting( 'background_attachment' )->transport = 'postMessage';
}

/**
 * Loads theme customizer JavaScript.
 *
 * @access public
 * @return void
 */
function starter_enqueue_customizer_scripts() {
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script(
		'starter-customize',
		get_stylesheet_directory_uri() . "/assets/scripts/min/customize{$suffix}.js",
		array( 'jquery' ),
		null,
		true
	);
}

// Add theme customizer colors here.
$starter_colors = array(
	'primary' => '#b0b5ba',
);

/**
 * Register customizer settings and controls.
 *
 * This loops through the global variable array of colors and
 * registers a customizer setting and control for each. To add
 * additional color settings, do not modify this function, instead
 * add your color name and hex value to the `$starter_colors` array
 * at the beginning of this file.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function starter_customizer_register( $wp_customize ) {

	// Globals.
	global $wp_customize, $starter_colors;

	// Loop through array and display colors.
	foreach ( $starter_colors as $id => $hex ) {

		$setting = "starter_{$id}_color";
		$label	 = ucwords( str_replace( '_', ' ', $id ) ) . __( ' Color', 'starter' );

		// Add color setting.
		$wp_customize->add_setting(
			$setting,
			array(
				'default'           => $hex,
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'			=> 'postMessage',
			)
		);

		// Add color control.
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$setting,
				array(
					'section'     => 'colors',
					'label'       => $label,
					'settings'    => $setting,
				)
			)
		);
	}

	// Footer widget areas.
	$wp_customize->add_setting(
		'starter_footer_widgets',
		array(
			'default'           => 3,
			'sanitize_callback' => 'starter_sanitize_number',
			'type'				=> 'option',
			'transport'   		=> 'refresh',
		)
	);

	$wp_customize->add_control(
		'starter_footer_widgets',
		array(
			'type'		  => 'number',
			'label'       => __( 'Footer Widget Areas', 'starter' ),
			'description' => __( 'Select the number of widget areas to display in the footer section.', 'starter' ),
			'section'     => 'genesis_layout',
			'settings'    => 'starter_footer_widgets',
			'priority'	  => 20,
		)
	);

	// Add front page setting to the Customizer.
	$wp_customize->add_setting(
		'starter_frontpage_content',
		array(
		    'default'           => 'true',
		    'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'starter_frontpage_content',
		array(
			'label'       => __( 'Front Page Content', 'starter' ),
			'description' => __( 'Show or hide the front page content.', 'starter' ),
			'section'     => 'static_front_page',
			'settings'    => 'starter_frontpage_content',
			'type'        => 'radio',
			'choices'     => array(
				'true'    => __( 'Show content', 'starter' ),
				'false'   => __( 'Hide content', 'starter' ),
			),
	    )
	);

	// Front page widget areas.
	$wp_customize->add_setting(
		'starter_frontpage_widgets',
		array(
			'default'           => 1,
			'sanitize_callback' => 'starter_sanitize_number',
			'type'				=> 'option',
			'transport'   		=> 'refresh',
		)
	);

	$wp_customize->add_control(
		'starter_frontpage_widgets',
		array(
			'type'		  => 'number',
			'label'       => __( 'Front Page Widget Areas', 'starter' ),
			'description' => __( 'Select the number of widget areas to display on the home page.', 'starter' ),
			'section'     => 'static_front_page',
			'settings'    => 'starter_frontpage_widgets',
		)
	);
}
add_action( 'customize_register', 'starter_customizer_register' );

/**
 * Output customizer styles.
 *
 * Checks the settings for the colors defined in the settings.
 * If any of these value are set the appropriate CSS is output.
 *
 * @var   array $starter_colors Global theme colors.
 */
function starter_customizer_output() {

	// Set in customizer-settings.php.
	global $starter_colors;

	/**
	 * Loop though each color in the global array of theme colors
	 * and create a new variable for each. This is just a shorthand
	 * way of creating multiple variables that we can reuse. The
	 * benefit of using a foreach loop over creating each variable
	 * manually is that we can just declare the colors once e.g the
	 * `$starter_colors` array, and they can be used in multiple ways.
	 */
	foreach ( $starter_colors as $id => $hex ) {
		${"$id"} = get_theme_mod( "starter_{$id}_color",  $hex );
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
	$css .= ( $starter_colors['primary'] !== $primary ) ? sprintf( '

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

	// Style handle is the name of the theme.
	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	// Output CSS if not empty.
	if ( ! empty( $css ) ) {

		// Add the inline styles, also minify CSS first.
		wp_add_inline_style( $handle, starter_minify_css( $css ) );
	}
}
add_action( 'wp_enqueue_scripts', 'starter_customizer_output', 100 );

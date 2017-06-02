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

// Global array of theme colors.
$starter_colors = array(
	'accent' 			=> '#2c2d33',
	'links' 			=> '#2c2d33',
	'body' 				=> '#55575d',
	'headings'			=> '#43454b',
	'light'				=> '#f5f6f7',
);

/**
 * Register settings and controls with the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function starter_customizer_register( $wp_customize ) {

	// Make sure preview refreshes on change.
	$wp_customize->get_setting( 'header_image' )->transport = 'refresh';

	// Globals.
	global $wp_customize, $starter_colors;

	// Loop through array and display colors.
	foreach ( $starter_colors as $id => $hex ) {

		$section = 'colors';
		$setting = "starter_{$id}_color";
		$label	 = ucwords( str_replace( '_', ' ', $id ) );

		// Add color setting.
		$wp_customize->add_setting(
			$setting,
			array(
				'default'           => $hex,
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		// Add color control.
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$setting,
				array(
					'label'       => $label,
					'section'     => $section,
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
			'sanitize_callback' => 'sanitize_text_field',
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

	// Front page widget areas.
	$wp_customize->add_setting(
		'starter_frontpage_widgets',
		array(
			'default'           => 1,
			'sanitize_callback' => 'sanitize_text_field',
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

	// Add front page setting to the Customizer.
	$wp_customize->add_setting(
		'starter_frontpage_content',
		array(
		    'default'           => 'true',
		    'type'              => 'option',
		)
	);

	$wp_customize->add_control(
		'starter_frontpage_content',
		array(
			'label'       => __( 'Front Page Content', 'starter' ),
			'description' => __( 'Show or hide the front page content.', 'starter' ),
			'section'     => 'static_front_page',
			'settings'    => 'starter_frontpage_content',
			'type'        => 'select',
			'choices'     => array(
				'false'   => __( 'Hide content', 'starter' ),
				'true'    => __( 'Show content', 'starter' ),
			),
	    )
	);

	// Front page content order.
	$wp_customize->add_setting(
		'starter_frontpage_order',
		array(
		    'default'           => 'true',
		    'type'              => 'option',
		)
	);

	$wp_customize->add_control(
		'starter_frontpage_order',
		array(
			'label'       => __( 'Front Page Order', 'starter' ),
			'description' => __( 'Show the front page widgets before or after the page content.', 'starter' ),
			'section'     => 'static_front_page',
			'settings'    => 'starter_frontpage_order',
			'type'        => 'select',
			'choices'     => array(
				'true'    => __( 'Before content', 'starter' ),
				'false'   => __( 'After content', 'starter' ),
			),
	    )
	);
}
add_action( 'customize_register', 'starter_customizer_register' );

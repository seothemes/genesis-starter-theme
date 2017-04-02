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
 * Modify default customizer settings.
 *
 * @since 1.5.0
 * @param array $wp_customize Customizer defaults.
 */
function starter_customize_register( $wp_customize ) {

	global $wp_customize;

	// Remove background color setting.
	$wp_customize->remove_setting( 'background_color' );

	// Rename header image section.
	$wp_customize->get_section( 'header_image' )->title = __( 'Hero Image', 'genesis-starter' );

}
add_action( 'customize_register', 'starter_customize_register' );

/**
 * Display notice to include Kirki Toolkit.
 *
 * @link https://github.com/aristath/kirki-helpers
 */
require_once( get_stylesheet_directory() . '/lib/customize/include-kirki.php' );

/**
 * Ensure that output works when Kirki is not installed.
 *
 * @link https://aristath.github.io/kirki/
 */
require_once get_stylesheet_directory() . '/lib/customize/class-starter-kirki.php';

// Kirki output config.
if ( class_exists( 'Starter_Kirki' ) ) {
	Starter_Kirki::add_config( 'starter', array() );
}

// Customize header.
include_once( get_stylesheet_directory() . '/lib/customize/customize-header.php' );

// Customize colors.
include_once( get_stylesheet_directory() . '/lib/customize/customize-colors.php' );

// Customize typography.
include_once( get_stylesheet_directory() . '/lib/customize/customize-typography.php' );

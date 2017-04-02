<?php
/**
 * This file adds widget areas to the Genesis Starter theme.
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
 * Genesis Starter widget areas.
 *
 * Moved to a lower priority so that page widgets
 * are shown above site-wide widget areas.
 */
function starter_register_widget_areas() {

	// Register before header widget area.
	genesis_register_sidebar( array(
		'id'          => 'before-header',
		'name'        => __( 'Before Header', 'genesis-starter' ),
		'description' => __( 'This is the before header section.', 'genesis-starter' ),
	) );

	// Register header-right widget area.
	genesis_register_sidebar( array(
		'id'          => 'header-right',
		'name'        => __( 'Header Right', 'genesis-starter' ),
		'description' => __( 'This is the header right section.', 'genesis-starter' ),
	) );

	// Register header-right widget area.
	genesis_register_sidebar( array(
		'id'          => 'sidebar',
		'name'        => __( 'Sidebar', 'genesis-starter' ),
		'description' => __( 'This is the sidebar section.', 'genesis-starter' ),
	) );

	// Register before footer widget area.
	genesis_register_sidebar( array(
		'id'          => 'before-footer',
		'name'        => __( 'Before Footer', 'genesis-starter' ),
		'description' => __( 'This is the before footer section.', 'genesis-starter' ),
	) );

	// Register before footer widgets area.
	genesis_register_sidebar( array(
		'id'          => 'footer-widgets',
		'name'        => __( 'Footer Widgets', 'genesis-starter' ),
		'description' => __( 'This is the footer widgets section.', 'genesis-starter' ),
	) );
}
add_action( 'widgets_init', 'starter_register_widget_areas', 99 );

/**
 * Display before-header widget area.
 */
function starter_before_footer_widget_area() {

	genesis_widget_area( 'before-footer', array(
	    'before' => '<div class="before-footer"><div class="wrap">',
	    'after'	=> '</div></div>',
	) );
}
add_action( 'genesis_before_footer', 'starter_before_footer_widget_area', 5 );

/**
 * Display before-header widget area.
 */
function starter_footer_widgets_area() {

	genesis_widget_area( 'footer-widgets', array(
	    'before' => '<div class="footer-widgets">',
	    'after' => '</div>',
	) );
}
add_action( 'genesis_footer', 'starter_footer_widgets_area', 6 );

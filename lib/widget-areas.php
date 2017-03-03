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
 * Check for theme support.
 */
if ( ! current_theme_supports( 'widget-areas' ) ) {
	return;
}

// Create array of widget area IDs and locations.
$starter_widget_areas = array(

	'before-footer'  => 'genesis_footer',
	'footer-widgets' => 'genesis_footer',
	'after-footer'   => 'genesis_footer',
	'front-page-1'   => 'front_page_widgets',
	'front-page-2'   => 'front_page_widgets',
	'front-page-3'   => 'front_page_widgets',
	'front-page-4'   => 'front_page_widgets',
	'front-page-5'   => 'front_page_widgets',

);

/**
 * Register widget areas.
 */
// Loop through widget areas in array.
foreach ( $starter_widget_areas as $id => $location ) {

	// Format ID for use as widget name.
	$name = ucwords( str_replace( '-', ' ', $id ) );

	// Register sidebar.
	genesis_register_sidebar( array(
		'id'            => $id,
		'name'          => $name,
		'description'   => sprintf( 'This is the %1$s widget area which will appear in the %2$s section.', strtolower( $name ), str_replace( '_', ' ', $location ) ),
	) );
}

/**
 * Display footer widget areas.
 */
function starter_footer_widget_areas() {

	global $starter_widget_areas;

	// Loop through all widget areas.
	foreach ( $starter_widget_areas as $id => $location ) {

		// Display if location is `genesis_footer`.
		if ( 'genesis_footer' === $location ) {
			genesis_widget_area( $id, array(
				'before' => sprintf( '<div class="%s%s"><div class="wrap">', $id, starter_widgets_flex_class( $id ) ),
				'after' => '</div></div>',
			) );
		}
	}
}
add_action( 'genesis_footer', 'starter_footer_widget_areas', 8 );

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

/**
 * Setup widget counts.
 *
 * @param  string $id Widget area ID.
 * @return int Number of widgets inside.
 */
function starter_count_widgets( $id ) {

	global $sidebars_widgets;

	if ( isset( $sidebars_widgets[ $id ] ) ) {
		return count( $sidebars_widgets[ $id ] );
	}
}

/**
 * Flexible widget classes.
 *
 * @param  string $id Widget area ID.
 * @return string $class Flexible widgets CSS class.
 */
function starter_widgets_flex_class( $id ) {

	$count = starter_count_widgets( $id );

	$class = '';

	if ( 0 === $count % 5 ) {
		$class = ' flexible-widgets-5';
	} elseif ( 0 === $count % 4 ) {
		$class = ' flexible-widgets-4';
	} elseif ( 0 === $count % 3 ) {
		$class = ' flexible-widgets-3';
	} elseif ( 0 === $count % 2 ) {
		$class = ' flexible-widgets-2';
	} else {
		$class = '';
	}

	return $class;

}

// Create array of widget area ID and location.
$starter_widget_areas = array(

	'before-footer'  => 'genesis_footer',
	'footer-widgets' => 'genesis_footer',
	'after-footer'   => 'genesis_footer',
	'front-page-1'   => 'genesis_header',
	'front-page-2'   => 'front_page_widgets',
	'front-page-3'   => 'front_page_widgets',
	'front-page-4'   => 'front_page_widgets',
	'front-page-5'   => 'front_page_widgets',

);

// Register widget areas.
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

/**
 * Is Active Sidebars.
 *
 * A somewhat cleaner way to check for active sidebars
 * which allows us to display widgets if any are active.
 *
 * @param  array $sidebars Sidebars passed to function.
 * @return boolean
 */
function is_active_sidebars( $sidebars ) {

	foreach ( $sidebars as $sidebar ) {

		if ( is_active_sidebar( $sidebar ) ) {
			return true;
		}
	}
}

// Create array of active front-page widgets to check if any are active.
$front_page_widgets = array();

foreach ( $wp_registered_sidebars as $key => $value ) {

	if ( strpos( $key, 'front-page' ) !== false ) {
		$front_page_widgets[] .= $key;
	}
}

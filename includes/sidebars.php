<?php
/**
 * Theme Sidebars.
 *
 * This file adds custom widget areas to the Genesis Starter
 * theme. It also contains the dynamic widget area functions
 * that allow users to select how many widget areas they want
 * to display on the front page & footer from the Customizer.
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

// Register before header widget area.
genesis_register_sidebar( array(
	'id'          => 'before-header',
	'name'        => __( 'Before Header', 'starter' ),
	'description' => __( 'This is the before header flexible widgets area. Widgets displayed in this area will automatically adjust width depending on the number of widgets.', 'starter' ),
) );

// Register header right widget area.
genesis_register_sidebar( array(
	'id'          => 'header-right-widget',
	'name'        => __( 'Header Right', 'starter' ),
	'description' => __( 'This is the header right widget area. This widget area is not suitable to display every type of widget, and works best with a custom menu, a search form, or possibly a text widget.', 'starter' ),
) );

// Register primary sidebar widget area.
genesis_register_sidebar( array(
	'id'          => 'sidebar',
	'name'        => __( 'Primary Sidebar', 'starter' ),
	'description' => __( 'This is the primary sidebar if you are using a two column site layout option. Not displayed on shop page or product archives.', 'starter' ),
) );

// Register before footer widget area.
genesis_register_sidebar( array(
	'id'          => 'before-footer',
	'name'        => __( 'Before Footer', 'starter' ),
	'description' => __( 'This is the before footer flexible widgets area. Widgets displayed in this area will automatically adjust width depending on the number of widgets.', 'starter' ),
) );

/**
 * Display before header widget area.
 */
function starter_before_header_widget_area() {

	genesis_widget_area( 'before-header', array(
	    'before' => '<div class="before-header"><div class="wrap">',
	    'after'  => '</div></div>',
	) );
}
add_action( 'genesis_before_header', 'starter_before_header_widget_area' );

/**
 * Display header right widget area.
 */
function starter_header_right_widget_area() {

	genesis_widget_area( 'header-right-widget', array(
	    'before' => '<div class="header-widget-area">',
	    'after'  => '</div>',
	) );
}
add_action( 'genesis_header', 'starter_header_right_widget_area', 10 );

/**
 * Display before footer widget area.
 */
function starter_before_footer_widget_area() {

	genesis_widget_area( 'before-footer', array(
	    'before' => '<div class="before-footer"><div class="wrap">',
	    'after'  => '</div></div>',
	) );
}
add_action( 'genesis_before_footer', 'starter_before_footer_widget_area' );

// Conditional variable of front page widget areas. (Dynamic widget areas workaround).
$count_frontpage_widgets = is_customize_preview() ? 20 : get_option( 'starter_frontpage_widgets', 1 );

// Register dynamic front page widget areas.
for ( $i = 1; $i <= $count_frontpage_widgets; $i++ ) {

	genesis_register_sidebar( array(
		'id'          => 'front-page-' . $i,
		'name'        => __( 'Front Page ', 'starter' ) . $i,
		'description' => __( 'This is the front page ', 'starter' ) . $i . __( ' widget area.', 'starter' ),
	) );
}

// Conditional variable of footer widget areas. (Dynamic widget areas workaround).
$count_footer_widgets = is_customize_preview() ? 10 : get_option( 'starter_footer_widgets', 3 );

// Register dynamic footer widget areas.
for ( $i = 1; $i <= $count_footer_widgets; $i++ ) {

	genesis_register_sidebar( array(
		'id'          => 'footer-widget-' . $i,
		'name'        => __( 'Footer Widget ', 'starter' ) . $i,
		'description' => __( 'This is the footer widget ', 'starter' ) . $i . __( ' widget area.', 'starter' ),
	) );
}

/**
 * Display footer widgets widget areas.
 *
 * @var $widget_areas Number of footer widget areas.
 */
function starter_footer_widgets() {

	$widget_areas = get_option( 'starter_footer_widgets', 3 );

	// Return early if no footer widget areas.
	if ( '0' === $widget_areas ) {
		return;
	}

	// Opening markup with custom wrap.
	echo '<div class="footer-widgets">';
	starter_wrap_open();

	// Loop through widget areas.
	for ( $i = 1; $i <= $widget_areas; $i++ ) {
		genesis_widget_area( "footer-widget-$i", array(
			'before' => sprintf( '<div class="widget-area footer-widgets-%s">', $i ),
			'after'  => '</div>',
		) );
	}

	// Closing markup.
	starter_wrap_close();
	echo '</div>';
}
add_action( 'genesis_footer', 'starter_footer_widgets', 5 );

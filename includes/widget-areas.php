<?php
/**
 * This file adds widget areas to the Genesis Starter theme.
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

// Register after header widget area.
genesis_register_sidebar( array(
	'id'          => 'after-header',
	'name'        => __( 'After Header', 'starter' ),
	'description' => __( 'This is the after header flexible widgets area. Widgets displayed in this area will automatically adjust width depending on the number of widgets.', 'starter' ),
) );

// Register shop sidebar widget area.
genesis_register_sidebar( array(
	'id'          => 'sidebar',
	'name'        => __( 'Primary Sidebar', 'starter' ),
	'description' => __( 'This is the primary sidebar if you are using a two column site layout option. Not displayed on shop page or product archives.', 'starter' ),
) );

// Register shop sidebar widget area.
genesis_register_sidebar( array(
	'id'          => 'shop-sidebar',
	'name'        => __( 'Shop Sidebar', 'starter' ),
	'description' => __( 'This is the shop sidebar widget area if you are using a two column site layout option for your product archive.', 'starter' ),
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
	    'before' => sprintf( '<div class="before-header%s"><div class="wrap">', starter_flexible_widgets( 'before-header' ) ),
	    'after'  => '</div></div>',
	) );
}
add_action( 'genesis_before_header', 'starter_before_header_widget_area' );

/**
 * Display header right widget area.
 */
function starter_header_right_widget_area() {

	genesis_widget_area( 'header-right-widget', array(
	    'before' => sprintf( '<div class="header-widget-area">' ),
	    'after'  => '</div>',
	) );
}
add_action( 'genesis_header', 'starter_header_right_widget_area', 10 );

/**
 * Display after header widget area.
 */
function starter_after_header_widget_area() {

	genesis_widget_area( 'after-header', array(
	    'before' => sprintf( '<div class="after-header%s"><div class="wrap">', starter_flexible_widgets( 'after-header' ) ),
	    'after'  => '</div></div>',
	) );
}
add_action( 'genesis_after_header', 'starter_after_header_widget_area' );

/**
 * Display shop sidebar widget area.
 */
function starter_shop_widget_area() {

	if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) {

		genesis_widget_area( 'shop-sidebar', array(
		    'before' => '<div class="shop-sidebar">',
		    'after'  => '</div>',
		) );
	}
}
add_action( 'genesis_before_sidebar_widget_area', 'starter_shop_widget_area' );

/**
 * Display before footer widget area.
 */
function starter_before_footer_widget_area() {

	genesis_widget_area( 'before-footer', array(
	    'before' => sprintf( '<div class="before-footer%s"><div class="wrap">', starter_flexible_widgets( 'before-footer' ) ),
	    'after'  => '</div></div>',
	) );
}
add_action( 'genesis_before_footer', 'starter_before_footer_widget_area' );

// Conditional variable of front page widgets. (Dynamic widget areas workaround).
$count_frontpage_widgets = is_customize_preview() ? 20 : get_option( 'starter_frontpage_widgets', 1 );

// Register dynamic front page widget areas.
for ( $i = 1; $i <= $count_frontpage_widgets; $i++ ) {

	genesis_register_sidebar( array(
		'id'          => 'front-page-' . $i,
		'name'        => __( 'Front Page ', 'starter' ) . $i,
		'description' => __( 'This is the front page ', 'starter' ) . $i . __( ' widget area.', 'starter' ),
	) );
}

// Conditional variable of front page widgets. (Dynamic widget areas workaround).
$count_footer_widgets = is_customize_preview() ? 20 : get_option( 'starter_footer_widgets', 3 );

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

	// Return early if no front page widget areas.
	if ( '0' === $widget_areas ) {
		return;
	}

	echo '<div class="footer-widgets flexible-widgets-' . esc_attr( $widget_areas ) . '">';

	// Loop through widget areas.
	for ( $i = 1; $i <= $widget_areas; $i++ ) {

		genesis_widget_area( "footer-widget-$i", array(
			'before' => sprintf( '<div class="widget-area footer-widgets-%s">', $i ),
			'after'  => '</div>',
		) );
	}

	echo '</div>';
}
add_action( 'genesis_footer', 'starter_footer_widgets', 6 );

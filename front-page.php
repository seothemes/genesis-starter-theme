<?php
/**
 * Genesis Starter.
 *
 * This file adds the front page to the Genesis Starter Theme.
 *
 * @package Genesis Starter
 * @author  SeoThemes
 * @license GPL-2.0+
 * @link    https://seothemes.com/themes/genesis-starter/
 */

// Force full-width-content layout.
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove default page header.
remove_action( 'genesis_after_header', 'starter_page_header_open', 20 );
remove_action( 'genesis_after_header', 'starter_page_header_title', 24 );
remove_action( 'genesis_after_header', 'starter_page_header_close', 28 );

// Remove content-sidebar-wrap.
add_filter( 'genesis_markup_content-sidebar-wrap', '__return_null' );

// Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'starter_front_page_loop' );
/**
 * Front page content.
 *
 * @return void
 */
function starter_front_page_loop() {

	// Check if any front page widgets are active.
	if ( is_active_sidebar( 'front-page-1' ) || is_active_sidebar( 'front-page-2' ) || is_active_sidebar( 'front-page-3' ) || is_active_sidebar( 'front-page-4' ) || is_active_sidebar( 'front-page-5' ) ) {

		// Get custom header markup.
		ob_start();
		the_custom_header_markup();
		$custom_header = ob_get_clean();

		// Front page 1 widget area.
		genesis_widget_area( 'front-page-1', array(
			'before' => '<div class="front-page-1 page-header" role="banner">' . $custom_header . '<div class="wrap">',
			'after'  => '</div></div>',
		) );

		// Front page 2 widget area.
		genesis_widget_area( 'front-page-2', array(
			'before' => '<div class="front-page-2 widget-area"><div class="wrap">',
			'after'  => '</div></div>',
		) );

		// Front page 3 widget area.
		genesis_widget_area( 'front-page-3', array(
			'before' => '<div class="front-page-3 widget-area"><div class="wrap">',
			'after'  => '</div></div>',
		) );

		// Front page 4 widget area.
		genesis_widget_area( 'front-page-4', array(
			'before' => '<div class="front-page-4 widget-area"><div class="wrap">',
			'after'  => '</div></div>',
		) );

		// Front page 5 widget area.
		genesis_widget_area( 'front-page-5', array(
			'before' => '<div class="front-page-5 widget-area"><div class="wrap">',
			'after'  => '</div></div>',
		) );

		genesis_markup( array(
			'close' => '</main>', // End .content.
			'context' => 'content',
		) );

	}
}

// Run Genesis.
genesis();

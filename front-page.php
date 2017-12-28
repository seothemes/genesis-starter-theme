<?php
/**
 * Genesis Starter.
 *
 * This file adds the front page to the Genesis Starter Theme.
 *
 * @package   GenesisStarter
 * @link      https://seothemes.com/themes/genesis-starter
 * @author    SEO Themes
 * @copyright Copyright © 2017 SEO Themes
 * @license   GPL-2.0+
 */

// Check if any front page widgets are active.
if ( is_active_sidebar( 'front-page-1' ) ||
		is_active_sidebar( 'front-page-2' ) ||
		is_active_sidebar( 'front-page-3' ) ||
		is_active_sidebar( 'front-page-4' ) ||
		is_active_sidebar( 'front-page-5' ) ) {

	// Force full-width-content layout.
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	// Remove default page header.
	remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_starter_page_header' );

	// Remove content-sidebar-wrap.
	add_filter( 'genesis_markup_content-sidebar-wrap', '__return_null' );

	// Remove default loop.
	remove_action( 'genesis_loop', 'genesis_do_loop' );

	add_action( 'genesis_loop', 'genesis_starter_front_page_loop' );
	/**
	 * Front page content.
	 *
	 * @since  2.0.0
	 *
	 * @return void
	 */
	function genesis_starter_front_page_loop() {

		// Front page 1 widget area.
		genesis_widget_area( 'front-page-1', array(
			'before' => '<div class="front-page-1 page-header" role="banner"><div class="wrap">',
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

	}
}

// Run Genesis.
genesis();

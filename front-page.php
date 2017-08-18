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

// If any widget areas are active, do custom front page.
if ( is_active_sidebar( 'front-page-1' ) || is_active_sidebar( 'front-page-2' ) || is_active_sidebar( 'front-page-3' ) || is_active_sidebar( 'front-page-4' ) || is_active_sidebar( 'front-page-5' ) || is_active_sidebar( 'front-page-6' ) ) {

	/**
	 * Add attributes for site-inner element.
	 *
	 * @since 2.0.0
	 *
	 * @param array $attributes Existing attributes.
	 *
	 * @return array Amended attributes.
	 */
	function starter_attributes_site_inner( $attributes ) {
		$attributes['class']    = 'front-page-widgets';
		$attributes['role']     = 'main';
		$attributes['itemprop'] = 'mainContentOfPage';
		return $attributes;
	}
	add_filter( 'genesis_attr_site-inner', 'starter_attributes_site_inner' );

	// Remove site-inner wrap.
	add_filter( 'genesis_structural_wrap-site-inner', '__return_empty_string' );

	// Get header.
	get_header();

	// Display widget areas.
	genesis_widget_area( 'front-page-1', array(
		'before' => '<div class="front-page-1 widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
	genesis_widget_area( 'front-page-2', array(
		'before' => '<div class="front-page-2 widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
	genesis_widget_area( 'front-page-3', array(
		'before' => '<div class="front-page-3 widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
	genesis_widget_area( 'front-page-4', array(
		'before' => '<div class="front-page-4 widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
	genesis_widget_area( 'front-page-5', array(
		'before' => '<div class="front-page-5 widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
	genesis_widget_area( 'front-page-6', array(
		'before' => '<div class="front-page-6 widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

	// Get footer.
	get_footer();

} else {

	// Do the default loop.
	genesis();

} // End if().

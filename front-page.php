<?php
/**
 * This file adds the front-page template to the Genesis Starter theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

/**
 * Build the front page template.
 *
 * @return string Front page template.
 */
function starter_front_page() {

	/**
	 * Format Site Inner
	 *
	 * @param  array $attributes Contains array of attributes.
	 * @return array
	 */
	function starter_site_inner( $attributes ) {
		$attributes['class']	= 'main-content';
		$attributes['role']     = 'main';
		$attributes['itemprop'] = 'mainContentOfPage';
		return $attributes;
	}
	add_filter( 'genesis_attr_site-inner', 'starter_site_inner' );

	// Remove site-inner wrap.
	add_filter( 'genesis_structural_wrap-site-inner', '__return_empty_string' );

	/**
	 * Display front page widget areas.
	 */
	function starter_front_page_widgets() {
		for ( $i = 1; $i < 5; $i++ ) {

			// Format the widget area ID.
			$id = sprintf( 'front-page-%s', $i );

			// Display widget areas.
			genesis_widget_area( $id, array(
			    'before' => sprintf( '<div class="%s%s"><div class="wrap">', $id, starter_widgets_flex_class( $id ) ),
			    'after' => '</div></div>',
			) );
		}
	}
	add_action( 'front_page_widgets', 'starter_front_page_widgets' );

	// Display header.
	get_header();

	// Front page widget areas.
	do_action( 'front_page_widgets' );

	// Display footer.
	get_footer();

}

// Create array of active front-page widgets to check if any are active.
global $wp_registered_sidebars;

// Create empty array to store active front page widgets.
$front_page_widgets = array();

// Loop through registered widget areas.
foreach ( $wp_registered_sidebars as $key => $value ) {

	// Check for front page widget areas.
	if ( strpos( $key, 'front-page' ) !== false ) {

		// Add each front page widget area to array.
		$front_page_widgets[] .= $key;
	}
}

// If no front page widgets are active, do the default loop.
if ( function_exists( 'is_active_sidebars' ) && is_active_sidebars( $front_page_widgets ) ) {
	starter_front_page();
} else {
	genesis();
}

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
	 * Front Page 1
	 *
	 * Adds front page 1 widget area inside `site-header` to allow
	 * Header Image to be used as background image.
	 */
	function starter_front_page_1() {

		$id = 'front-page-1';

		genesis_widget_area( $id, array(
		    'before' => sprintf( '<div class="%s%s"><div class="wrap">', $id, starter_widgets_flex_class( $id ) ),
		    'after' => '</div></div>',
		) );
	}
	add_action( 'genesis_header', 'starter_front_page_1', 14 );

	/**
	 * Display remaining front page widget areas.
	 */
	function get_front_page_widgets() {
		for ( $i = 2; $i < 6; $i++ ) {

			$id = sprintf( 'front-page-%s', $i );

			genesis_widget_area( $id, array(
			    'before' => sprintf( '<div class="%s%s"><div class="wrap">', $id, starter_widgets_flex_class( $id ) ),
			    'after' => '</div></div>',
			) );
		}
	}

	// Display header.
	get_header();

	// Front page widget areas.
	get_front_page_widgets();

	// Display footer.
	get_footer();

}

// If no front page widgets are active, do the default loop.
if ( function_exists( 'is_active_sidebars' ) && is_active_sidebars( $front_page_widgets ) ) {
	starter_front_page();
} else {
	genesis();
}

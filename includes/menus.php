<?php
/**
 * This file contains menu functions for the Genesis Starter Theme.
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

// Remove default superfish args.
add_filter( 'genesis_superfish_args_url', '__return_null' );

// Display navigation menus.
add_action( 'genesis_header', 'starter_nav_header', 10 );
add_action( 'genesis_header', 'starter_nav_after_header', 14 );
add_action( 'genesis_footer', 'starter_nav_footer', 7 );

/**
 * Custom nav menus.
 *
 * The main purpose of this is to add better customizer support
 * for navigation menus. Genesis doesn't yet support the selective
 * refresh feature for nav menus because the `echo` argument is set
 * to `false`. This custom function will probably be removed if
 * support is added for this feature. Another benefit to having
 * this function is that Genesis doesn't add `role="navigation"`
 * to menu containers as recommended by Google so we are able to
 * add that in by displaying menus this way.
 *
 * @since  2.0.1
 * @param  array  $name  Name/ID of the menu.
 * @param  string $wrap  Container element.
 * @param  int    $depth Menu depth.
 * @return string
 */
function starter_nav_menu( $name = '', $wrap = '', $depth = 0 ) {

	// Navigation attributes.
	$attr['class']     = 'nav-' . $name;
	$attr['id']        = 'genesis-nav-' . $name;
	$attr['role']  	   = 'navigation';
	$attr['itemscope'] = '';
	$attr['itemtype']  = 'https://schema.org/SiteNavigationElement';
	$attr['aria-label'] = ucwords( str_replace( '-', ' ', $name ) ) . __( ' Navigation', 'starter' );

	// Opening markup.
	$output = '<nav';
	foreach ( $attr as $key => $value ) {
		$output .= sprintf( ' %s="%s"', esc_html( $key ), esc_attr( $value ) );
	}
	$output .= '>';

	// Use output buffer so echo can be true.
	ob_start();
	genesis_get_nav_menu( array(
		'theme_location'  => $name,
		'container'       => $wrap,
		'container_class' => 'wrap',
		'depth'			  => $depth,
		'echo'			  => true,
	) );
	$output .= ob_get_clean();

	// Closing markup.
	$output .= '</nav>';

	// Return HTML.
	return trim( $output );
}

/**
 * Header Navigation.
 *
 * Adds the main navigation that is displayed in the header-right
 * section of the site-header.
 */
function starter_nav_header() {
	echo starter_nav_menu( 'header' );
}

/**
 * After Header Navigation.
 *
 * Adds the after header navigation that is displayed in the after
 * header section of the site-header. Has a wrapper div.
 */
function starter_nav_after_header() {
	echo starter_nav_menu( 'after-header', 'div' );
}

/**
 * Footer Navigation.
 *
 * Adds the footer menu between the footer widgets widget area and
 * the footer credits. Has no wrap and only 1-level depth.
 */
function starter_nav_footer() {
	echo starter_nav_menu( 'footer', null, 1 );
}

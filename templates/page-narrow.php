<?php
/**
 * This file adds the narrow template to the Genesis Starter theme.
 *
 * Template Name: Narrow Template
 */

// Force full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

/**
 * Add parent page slug to the body class.
 *
 * @param array $classes Existing classes.
 */
function starter_narrow_body_class( $classes ) {

	$classes[] = 'narrow';
	return $classes;
}
add_filter( 'body_class','starter_narrow_body_class' );

// Do loop.
genesis();

<?php
/**
 * This file adds the wide template to the Genesis Starter theme.
 *
 * Template Name: Wide Template
 */

// Force full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

/**
 * Snippet Name: Add parent page slug to the body class.
 *
 * @param array $classes Existing classes.
 */
function starter_wide_body_class( $classes ) {

	$classes[] = 'wide';
	return $classes;
}
add_filter( 'body_class','starter_wide_body_class' );

// Do loop.
genesis();

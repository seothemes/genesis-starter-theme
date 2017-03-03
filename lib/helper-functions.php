<?php
/**
 * Genesis Starter.
 *
 * This file adds the required helper functions used in the Genesis Starter Theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

/**
 * Calculate color contrast.
 *
 * @since 1.3
 * @param string $color The color to convert.
 * @return string Hex color code for contrast color.
 */
function starter_color_contrast( $color ) {

	$hexcolor = str_replace( '#', '', $color );
	$red      = hexdec( substr( $hexcolor, 0, 2 ) );
	$green    = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue     = hexdec( substr( $hexcolor, 4, 2 ) );

	$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

	// Luminosity is higher than Genesis Sample (128).
	return ( $luminosity > 200 ) ? '#333333' : '#ffffff';

}

/**
 * Calculate color brightness.
 *
 * @since 1.3
 * @param string $color The color to convert.
 * @param string $change The amount to change.
 * @return string Hex color code for the color brightness.
 */
function starter_color_brightness( $color, $change ) {

	$hexcolor = str_replace( '#', '', $color );

	$red   = hexdec( substr( $hexcolor, 0, 2 ) );
	$green = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

	$red   = max( 0, min( 255, $red + $change ) );
	$green = max( 0, min( 255, $green + $change ) );
	$blue  = max( 0, min( 255, $blue + $change ) );

	return '#' . dechex( $red ) . dechex( $green ) . dechex( $blue );

}

/**
 * Add flexible widget classes.
 *
 * @param  string $id Widget area ID.
 * @return string $class Flexible widgets CSS class.
 */
function starter_widgets_flex_class( $id ) {

	global $sidebars_widgets;

	if ( isset( $sidebars_widgets[ $id ] ) ) {
		$count = count( $sidebars_widgets[ $id ] );
	}

	$class = '';

	if ( 0 === $count % 5 ) {
		$class = ' flexible-widgets-5';
	} elseif ( 0 === $count % 4 ) {
		$class = ' flexible-widgets-4';
	} elseif ( 0 === $count % 3 ) {
		$class = ' flexible-widgets-3';
	} elseif ( 0 === $count % 2 ) {
		$class = ' flexible-widgets-2';
	} else {
		$class = '';
	}

	return $class;

}

/**
 * Emulate hover effects on mobile devices.
 *
 * @param  string $attributes On touch start attribute.
 * @return string
 */
function starter_add_ontouchstart( $attributes ) {
	$attributes['ontouchstart'] = ' ';
	return $attributes;
}
add_filter( 'genesis_attr_body', 'starter_add_ontouchstart' );

/**
 * Add CSS class of the post name to the body element for styling.
 *
 * @param  string $classes Body classes.
 * @return string
 */
function starter_page_body_class( $classes ) {
	global $post;
	if ( $post && ( 'page' === $post->post_type ) ) {
		$classes[] = $post->post_name . '-page';
	}
	return $classes;
}
add_filter( 'body_class', 'starter_page_body_class' );

/**
 * Is Active Sidebars.
 *
 * A slightly cleaner way to check for active sidebars.
 *
 * @param  array $sidebars Accepts an array of sidebars.
 * @return boolean
 */
function is_active_sidebars( $sidebars ) {

	foreach ( $sidebars as $sidebar ) {

		if ( is_active_sidebar( $sidebar ) ) {
			return true;
		}
	}
}

/**
 * Custom header image callback.
 *
 * @return string Style attribute.
 */
function starter_custom_header() {

	// Check if we're on the front page.
	if ( ! is_front_page() ) {
		$element = '.hero';
	} else {
		$element = '.front-page-1';
	}

	$script = '<script>jQuery( document ).ready( function($) { $( "%s" ).backstretch( "%s" ); } );</script>';

	if ( get_the_post_thumbnail_url() ) {

		// If a featured image is set, use that.
		echo sprintf( $script, $element, get_the_post_thumbnail_url() );

	} elseif ( get_header_image() ) {

		// If no featured image is set, use the Header Image.
		echo sprintf( $script, $element, get_header_image() );

	} else {

		// If neither are set, do nothing.
		return;
	}

}

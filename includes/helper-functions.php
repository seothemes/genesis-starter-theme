<?php
/**
 * Genesis Starter.
 *
 * This file adds helper functions used in the Genesis Starter Theme.
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

/**
 * Sanitize numbers.
 *
 * A helper function used to ensure that $number is an absolute
 * integer (whole number, zero or greater). If the input is an
 * absolute integer, return it; otherwise, return the default.
 *
 * @param  int $number The input number.
 * @param  obj $setting The setting id.
 * @return int Absolute integer.
 */
function starter_sanitize_number( $number, $setting ) {

	$number = absint( $number );
	return ( $number ? $number : $setting->default );
}

/**
 * Calculate color contrast.
 *
 * @param  string $color The input color.
 * @return string Hex color code for contrast color
 */
function starter_color_contrast( $color ) {
	$hexcolor = str_replace( '#', '', $color );
	$red      = hexdec( substr( $hexcolor, 0, 2 ) );
	$green    = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue     = hexdec( substr( $hexcolor, 4, 2 ) );
	$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );
	return ( $luminosity > 200 ) ? '#2c2d33' : '#ffffff';
}

/**
 * Calculate the color brightness.
 *
 * @param  string $color The input color.
 * @param  string $change The amount to change.
 * @return string Hex color code for the color brightness
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
 * Add flexible widget CSS classes.
 *
 * @param  string $id Widget area ID.
 * @return string $class Flexible widgets CSS class.
 */
function starter_flexible_widgets( $id ) {

	global $sidebars_widgets;

	if ( isset( $sidebars_widgets[ $id ] ) ) {
		$count = count( $sidebars_widgets[ $id ] );
	} else {
		$count = 0;
	}

	$class = '';

	if ( 6 === $count ) {
		$class = ' flexible-widgets-6';
	} elseif ( 0 === $count % 5 ) {
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
 * Minify CSS helper function.
 *
 * A handy CSS minification script by Gary Jones that we'll use to
 * minify the CSS output by the customizer. This is called near the
 * end of the /includes/theme-customize.php file. A big thanks to
 * Gary for this one, works perfectly.
 *
 * @author Gary Jones
 * @link https://github.com/GaryJones/Simple-PHP-CSS-Minification
 * @param string $css CSS to minify.
 * @return string Minified CSS.
 */
function starter_minify_css( $css ) {

	// Normalize whitespace.
	$css = preg_replace( '/\s+/', ' ', $css );

	// Remove spaces before and after comment.
	$css = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css );

	// Remove comment blocks, everything between /* and */, unless preserved with /*! ... */ or /** ... */.
	$css = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $css );

	// Remove ; before }.
	$css = preg_replace( '/;(?=\s*})/', '', $css );

	// Remove space after , : ; { } */ >.
	$css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );

	// Remove space before , ; { } ( ) >.
	$css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );

	// Strips leading 0 on decimal values (converts 0.5px into .5px).
	$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );

	// Strips units if value is 0 (converts 0px to 0).
	$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );

	// Converts all zeros value into short-hand.
	$css = preg_replace( '/0 0 0 0/', '0', $css );

	// Shorten 6-character hex color codes to 3-character where possible.
	$css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );

	return trim( $css );
}

/**
 * Accessible read more link.
 *
 * The below code modifies the default read more link when
 * using the WordPress More Tag to break a post on your site.
 * Instead of seeing 'Read more', screen readers will instead
 * see 'Read more about (entry title)'. This is a simple fix
 * to improve the overall user experience and should be in core.
 */
function starter_read_more() {
	$trimtitle  = get_the_title();
	$shorttitle = wp_trim_words( $trimtitle, $num_words = 10, $more = '…' );
	return sprintf( '<a class="more-link" rel="nofollow" href="%1$s">Read more<span class="screen-reader-text"> about %2$s</span></a>', esc_url( get_permalink() ), $shorttitle );
}
add_filter( 'excerpt_more', 'starter_read_more' );
add_filter( 'the_content_more_link', 'starter_read_more' );
add_filter( 'get_the_content_more_link', 'starter_read_more' );


/**
 * Add no-js class to body.
 *
 * Used for checking whether or not JavaScript is active so we can
 * style the navigation menus to suit the user. Also add an empty
 * `ontouchstart` attribute which emulates hover effects on mobile.
 *
 * @param  string $attr On touch start attribute.
 * @return string
 */
function starter_add_ontouchstart( $attr ) {
	$attr['class'] 		  .= ' no-js';
	$attr['ontouchstart']  = ' ';
	return $attr;
}
add_filter( 'genesis_attr_body', 'starter_add_ontouchstart' );

/**
 * Remove Page Templates.
 *
 * The Genesis Blog & Archive templates are not needed and can
 * create problems for users so it's safe to remove them . If 
 * you need to use these templates, simply remove this function.
 *
 * @param  array $page_templates All page templates.
 * @return array Modified templates.
 */
function starter_remove_templates( $page_templates ) {
	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );
	return $page_templates;
}
add_filter( 'theme_page_templates', 'starter_remove_templates' );

/**
 * Remove blog metabox.
 * 
 * Also remove the Genesis blog settings metabox from the
 * Genesis admin settings screen as it is no longer required
 * if the Blog page template has been removed. 
 */
function starter_remove_metaboxes( $hook ) {
	remove_meta_box( 'genesis-theme-settings-blogpage', $hook, 'main' );
}
add_action( 'genesis_admin_before_metaboxes', 'starter_remove_metaboxes' );
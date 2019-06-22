<?php
/**
 * Genesis Starter Theme
 *
 * WARNING: This file should never be modified under any circumstances.
 * Customizations should be made in the form of a core-functionality
 * plugin so that the theme can be updated without losing changes.
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\GenesisStarterTheme;

add_filter( 'post_class', __NAMESPACE__ . '\archive_post_class' );
/**
 * Add column class to archive posts.
 *
 * @since 3.4.0
 *
 * @param array $classes Array of post classes.
 *
 * @return array
 */
function archive_post_class( $classes ) {
	if ( is_singular() && ! genesis_is_blog_template() ) {
		return $classes;
	}

	if ( 'full-width-content' === genesis_site_layout() ) {
		$classes[] = 'one-third';
		$count     = 3;

	} else {
		$classes[] = 'one-half';
		$count     = 2;
	}

	global $wp_query;

	if ( 0 == $wp_query->current_post || 0 == $wp_query->current_post % $count ) {
		$classes[] = 'first';
	}

	return $classes;
}

add_filter( 'get_the_content_more_link', __NAMESPACE__ . '\read_more_link' );
add_filter( 'the_content_more_link', __NAMESPACE__ . '\read_more_link' );
/**
 * Modify the content limit read more link
 *
 * @since 3.4.0
 *
 * @param string $more_link_text Default more link text.
 *
 * @return string
 */
function read_more_link( $more_link_text ) {
	return str_replace( [ '[', ']', '...' ], '', $more_link_text );
}

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

add_action( 'body_class', __NAMESPACE__ . '\remove_entry_title' );
/**
 * Remove hero & entry title and add body class if h1 exists in content.
 *
 * @since 3.4.0
 *
 * @param array $classes Body classes.
 *
 * @return array
 */
function remove_entry_title( $classes ) {
	if ( ! ( is_singular() && function_exists( 'parse_blocks' ) ) ) {
		return $classes;
	}

	global $post;

	$blocks = \parse_blocks( $post->post_content );
	$has_h1 = search_blocks( $blocks );

	if ( $has_h1 ) {
		$classes[] = 'page-template-blocks';

		// Remove hero section.
		remove_theme_support( 'hero-section' );

		// Remove entry title markup.
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}

	return $classes;
}

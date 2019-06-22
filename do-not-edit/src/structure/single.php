<?php

namespace SeoThemes\GenesisStarterTheme;

add_action( 'genesis_meta', __NAMESPACE__ . '\remove_entry_title', 5 );
/**
 * Remove entry title if h1 exists in content.
 *
 * @since 1.0.0
 *
 * @return void
 */
function remove_entry_title() {
	if ( ! ( is_singular() && function_exists( 'parse_blocks' ) ) ) {
		return;
	}

	global $post;

	$blocks = \parse_blocks( $post->post_content );
	$has_h1 = search_blocks( $blocks );

	if ( $has_h1 ) {

		// Remove hero section.
		remove_theme_support( 'hero-section' );

		// Remove title markup.
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}
}

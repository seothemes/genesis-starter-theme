<?php

namespace SeoThemes\GenesisStarterTheme;

add_action( 'genesis_before_entry', __NAMESPACE__ . '\remove_entry_title' );
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
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}
}

/**
 * Recursively searches content for h1 blocks.
 *
 * @since 1.0.0
 *
 * @param array $blocks
 *
 * @return bool
 */
function search_blocks( $blocks ) {
	foreach ( $blocks as $block ) {
		if ( isset( $block['blockName'] ) && 'core/heading' === $block['blockName'] && isset( $block['attrs']['level'] ) && 1 === $block['attrs']['level'] ) {
			return true;

		} elseif ( isset( $block['innerBlocks'] ) && ! empty( $block['innerBlocks'] ) ) {
			return search_blocks( $block['innerBlocks'] );
		}
	}

	return false;
}

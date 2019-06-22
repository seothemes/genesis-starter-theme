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

/**
 * Recursively searches content for h1 blocks.
 *
 * @since 3.4.0
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

/**
 * Custom header image callback.
 *
 * @since  3.4.0
 *
 * @return string
 */
function custom_header() {
	$id = '';

	if ( class_exists( 'WooCommerce' ) && is_shop() ) {
		$id = wc_get_page_id( 'shop' );

	} elseif ( is_post_type_archive() ) {
		$id = get_page_by_path( get_query_var( 'post_type' ) );
		$id = $id->ID && has_post_thumbnail( $id->ID ) ? $id->ID : false;

	} elseif ( is_category() ) {
		$id = get_page_by_title( 'category-' . get_query_var( 'category_name' ), OBJECT, 'attachment' );

	} elseif ( is_tag() ) {
		$id = get_page_by_title( 'tag-' . get_query_var( 'tag' ), OBJECT, 'attachment' );

	} elseif ( is_tax() ) {
		$id = get_page_by_title( 'term-' . get_query_var( 'term' ), OBJECT, 'attachment' );

	} elseif ( is_front_page() ) {
		$id = get_option( 'page_on_front' );

	} elseif ( is_home() ) {
		$id = get_option( 'page_for_posts' );

	} elseif ( is_search() ) {
		$id = get_page_by_path( 'search' )->ID;

	} elseif ( is_404() ) {
		$id = get_page_by_path( 'error' )->ID;

	} elseif ( is_singular() ) {
		$id = get_the_id();
	}

	if ( is_object( $id ) ) {
		$url = wp_get_attachment_image_url( $id->ID, 'hero' );

	} elseif ( $id ) {
		$url = get_the_post_thumbnail_url( $id, 'hero' );
	}

	if ( ! $url ) {
		$url = get_header_image();
	}

	if ( $url ) {
		$selector = get_theme_support( 'custom-header', 'header-selector' );

		return printf( '<style id="hero-css" type="text/css">' . esc_attr( $selector ) . '{background-image:url(%s)}</style>' . "\n", esc_url( $url ) );

	} else {
		return '';
	}
}

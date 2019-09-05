<?php
/**
 * Genesis Starter Theme.
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-2.0-or-later
 */

// Reposition archive pagination.
\remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
\add_action( 'genesis_after_content_sidebar_wrap', 'genesis_posts_nav' );

// Reposition single navigation.
\remove_action( 'genesis_after_entry', 'genesis_adjacent_entry_nav' );
\add_action( 'genesis_after_content_sidebar_wrap', 'genesis_adjacent_entry_nav' );

\add_filter( 'genesis_markup_open', __NAMESPACE__ . '\entry_pagination_wrap_open', 10, 2 );
/**
 * Outputs the opening pagination wrap markup.
 *
 * @since 3.5.0
 *
 * @param string $open Opening markup.
 * @param array  $args Markup args.
 *
 * @return string
 */
function entry_pagination_wrap_open( $open, $args ) {
	if ( 'archive-pagination' === $args['context'] || 'adjacent-entry-pagination' === $args['context'] ) {
		$open .= '<div class="wrap">';
	}

	return $open;
}

\add_filter( 'genesis_markup_close', __NAMESPACE__ . '\entry_pagination_wrap_close', 10, 2 );
/**
 * Outputs the closing pagination wrap markup.
 *
 * @since 3.5.0
 *
 * @param string $close Closing markup.
 * @param array  $args  Markup args.
 *
 * @return string
 */
function entry_pagination_wrap_close( $close, $args ) {
	if ( 'archive-pagination' === $args['context'] || 'adjacent-entry-pagination' === $args['context'] ) {
		$close .= '</div>';
	}

	return $close;
}

\add_filter( 'genesis_prev_link_text', __NAMESPACE__ . '\previous_page_link' );
/**
 * Changes the previous page link text.
 *
 * @since 3.5.0
 *
 * @return string
 */
function previous_page_link() {
	return \sprintf( '← Previous', 'genesis-starter-theme' );
}

\add_filter( 'genesis_next_link_text', __NAMESPACE__ . '\next_page_link' );
/**
 * Changes the next page link text.
 *
 * @since 3.5.0
 *
 * @return string
 */
function next_page_link() {
	return \sprintf( 'Next →', 'genesis-starter-theme' );
}

\add_filter( 'genesis_markup_pagination-previous_content', __NAMESPACE__ . '\previous_pagination_text' );
/**
 * Changes the previous link arrow icon.
 *
 * @since 3.5.0
 *
 * @param string $content Previous link text.
 *
 * @return string
 */
function previous_pagination_text( $content ) {
	return \str_replace( '&#xAB;', '←', $content );
}

\add_filter( 'genesis_markup_pagination-next_content', __NAMESPACE__ . '\next_pagination_text' );
/**
 * Changes the next link arrow icon.
 *
 * @since 3.5.0
 *
 * @param string $content Next link text.
 *
 * @return string
 */
function next_pagination_text( $content ) {
	return \str_replace( '&#xBB;', '→', $content );
}

// Removes alignment classes.
\remove_filter( 'genesis_attr_pagination-previous', 'genesis_adjacent_entry_attr_previous_post' );
\remove_filter( 'genesis_attr_pagination-next', 'genesis_adjacent_entry_attr_next_post' );

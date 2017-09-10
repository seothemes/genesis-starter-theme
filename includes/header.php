<?php
/**
 * Genesis Starter.
 *
 * This file adds page header to the Genesis Starter theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.com/themes/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

// Remove titles.
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
remove_action( 'genesis_before_loop', 'genesis_do_blog_template_heading' );
remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
remove_action( 'genesis_before_loop', 'genesis_do_search_title' );

// Hooks.
add_action( 'genesis_after_header', 'starter_page_header_open', 20 );
add_action( 'genesis_after_header', 'starter_page_header_title', 24 );
add_action( 'genesis_after_header', 'genesis_do_posts_page_heading', 24 );
add_action( 'genesis_after_header', 'genesis_do_date_archive_title', 24 );
add_action( 'genesis_after_header', 'genesis_do_blog_template_heading', 24 );
add_action( 'genesis_after_header', 'genesis_do_taxonomy_title_description', 24 );
add_action( 'genesis_after_header', 'genesis_do_author_title_description', 24 );
add_action( 'genesis_after_header', 'genesis_do_cpt_archive_title_description', 24 );
add_action( 'genesis_after_header', 'starter_page_header_close', 28 );

// Hide WooCommerce Page Title.
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

/**
 * Opening markup.
 *
 * @since 1.0.0
 *
 * @return void
 */
function starter_page_header_open() {

	echo '<section class="page-header" role="banner"><div class="wrap">';

}

/**
 * Closing markup.
 *
 * @since 1.0.0
 *
 * @return void
 */
function starter_page_header_close() {

	echo '</div></section>';

}

/**
 * Get the correct title.
 *
 * @since 1.0.0
 *
 * @return void
 */
function starter_page_header_title() {

	if ( class_exists( 'WooCommerce' ) && is_shop() ) {

		echo get_the_title( get_option( 'woocommerce_shop_page_id' ) );
		echo esc_html( strip_tags( get_the_excerpt( get_option( 'woocommerce_shop_page_id' ) ) ) );

	} elseif ( 'posts' === get_option( 'show_on_front' ) && is_home() ) {

		printf( '<h1>%s</h1>', esc_html( apply_filters( 'starter_latest_posts_title', __( 'Latest Posts', 'genesis-starter' ) ) ) );
		printf( '<p>%s</p>', esc_html( apply_filters( 'starter_latest_posts_subtitle', __( 'Showing the latest posts', 'genesis-starter' ) ) ) );

	} elseif ( is_search() ) {

		genesis_do_search_title();

	} elseif ( is_404() ) {

		printf( '<h1 class="entry-title">%s</h1>', esc_html( apply_filters( 'genesis_404_entry_title', __( 'Not found, error 404', 'genesis' ) ) ) );

	} elseif ( is_single() || is_singular() ) {

		the_title( '<h1 itemprop="headline">', '</h1>', true );
		has_excerpt() ? printf( '<p itemprop="description">%s</p>', esc_html( strip_tags( get_the_excerpt() ) ) ) : '';

	} // End if().

	// Add post titles back inside posts loop.
	if ( is_home() || is_archive() || is_category() || is_tag() || is_tax() || is_search() || is_page_template( 'page_blog.php' ) ) {

		add_action( 'genesis_entry_header', 'genesis_do_post_title', 2 );

	}

}

<?php
/**
 * This file adds the page header to the Genesis Starter Theme.
 *
 * @package   GenesisStarter
 * @link      https://seothemes.com/themes/genesis-starter
 * @author    SEO Themes
 * @copyright Copyright © 2017 SEO Themes
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

add_filter( 'genesis_attr_entry', 'genesis_starter_entry_attr' );
/**
 * Add itemref attribute to link entry-title.
 *
 * Since the entry-title is repositioned outside of the entry article, we need
 * to add some additional microdata so that it is still picked up as a part
 * of the entry. By adding the itemref attribute, we are telling search
 * engines to check the page-header element for additional elements.
 *
 * @since  2.2.4
 *
 * @link   https://www.w3.org/TR/microdata/#dfn-itemref
 * @param  array $atts Entry attributes.
 *
 * @return array
 */
function genesis_starter_entry_attr( $atts ) {

	$atts['itemref'] = 'page-header';

	return $atts;

}

add_action( 'genesis_before', 'genesis_starter_page_header_setup' );
/**
 * Set up page header.
 *
 * Removes and repositions the title on all possible types of pages. Wrapped
 * up into one function so it can easily be unhooked from genesis_before.
 *
 * @since  2.2.4
 *
 * @return void
 */
function genesis_starter_page_header_setup() {

	// Remove default page header.
	remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
	remove_action( 'genesis_archive_title_descriptions', 'genesis_do_archive_headings_open', 5, 3 );
	remove_action( 'genesis_archive_title_descriptions', 'genesis_do_archive_headings_close', 15, 3 );
	remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
	remove_action( 'genesis_before_loop', 'genesis_do_blog_template_heading' );
	remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
	remove_action( 'genesis_before_loop', 'genesis_do_search_title' );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	// Add custom page header.
	add_action( 'genesis_starter_page_header', 'genesis_do_posts_page_heading' );
	add_action( 'genesis_starter_page_header', 'genesis_do_date_archive_title' );
	add_action( 'genesis_starter_page_header', 'genesis_do_taxonomy_title_description' );
	add_action( 'genesis_starter_page_header', 'genesis_do_author_title_description' );
	add_action( 'genesis_starter_page_header', 'genesis_do_cpt_archive_title_description' );

	// Remove search results and shop page titles.
	add_filter( 'woocommerce_show_page_title', '__return_null' );
	add_filter( 'genesis_search_title_output', '__return_false' );

}

add_action( 'genesis_starter_page_header', 'genesis_starter_page_title', 10 );
/**
 * Display title in page header.
 *
 * Works out the correct title to display in the page header on a per page
 * basis. Also adds the entry title back in to the entry inside the loop.
 *
 * @since  2.2.4
 *
 * @todo   Update 404 title when Genesis 2.6 is released.
 *
 * @return void
 */
function genesis_starter_page_title() {

	// Add post titles back inside posts loop.
	if ( is_home() || is_archive() || is_category() || is_tag() || is_tax() || is_search() || is_page_template( 'page_blog.php' ) ) {

		add_action( 'genesis_entry_header', 'genesis_do_post_title', 2 );

	}

	if ( class_exists( 'WooCommerce' ) && is_shop() ) {

		genesis_markup( array(
			'open'    => '<h1 %s>',
			'close'   => '</h1>',
			'content' => get_the_title( wc_get_page_id( 'shop' ) ),
			'context' => 'entry-title',
		) );

	} elseif ( 'posts' === get_option( 'show_on_front' ) && is_home() ) {

		genesis_markup( array(
			'open'    => '<h1 %s>',
			'close'   => '</h1>',
			'content' => apply_filters( 'genesis_starter_latest_posts_title', __( 'Latest Posts', 'genesis-starter' ) ),
			'context' => 'entry-title',
		) );

	} elseif ( is_404() ) {

		genesis_markup( array(
			'open'    => '<h1 %s>',
			'close'   => '</h1>',
			'content' => apply_filters( 'genesis_404_entry_title', __( 'Not found, error 404', 'genesis-starter' ) ),
			'context' => 'entry-title',
		) );

	} elseif ( is_search() ) {

		genesis_markup( array(
			'open'    => '<h1 %s>',
			'close'   => '</h1>',
			'content' => apply_filters( 'genesis_search_title_text', __( 'Search results for: ', 'genesis-starter' ) ) . get_search_query(),
			'context' => 'entry-title',
		) );

	} elseif ( is_page_template( 'page_blog.php' ) ) {

		do_action( 'genesis_archive_title_descriptions', get_the_title(), '', 'posts-page-description' );

	}  elseif ( is_single() || is_singular() ) {

		genesis_do_post_title();

	}

}

add_action( 'genesis_starter_page_header', 'genesis_starter_page_excerpt', 20 );
/**
 * Display page excerpt.
 *
 * Prints the correct excerpt on a per page basis. If on the WooCommerce shop
 * page then the products result count is be displayed instead of the page
 * excerpt. Also, if on a single product then no excerpt will be output.
 *
 * @since  2.2.4
 *
 * @return void
 */
function genesis_starter_page_excerpt() {

	if ( class_exists( 'WooCommerce' ) && is_shop() ) {

		woocommerce_result_count();

	} elseif ( is_home() ) {

		printf( '<p itemprop="description">%s</p>', do_shortcode( get_the_excerpt( get_option( 'page_for_posts' ) ) ) );

	} elseif ( is_search() ) {

		$id = get_page_by_path( 'search' );

		if ( has_excerpt( $id ) ) {

			printf( '<p itemprop="description">%s</p>', do_shortcode( get_the_excerpt( $id ) ) );

		}

	} elseif ( is_404() ) {

		$id = get_page_by_path( 'error' );

		if ( has_excerpt( $id ) ) {

			printf( '<p itemprop="description">%s</p>', do_shortcode( get_the_excerpt( $id ) ) );

		}

	} elseif ( ( is_single() || is_singular() ) && ! is_singular( 'product' ) && has_excerpt() ) {

		printf( '<p itemprop="description">%s</p>', do_shortcode( get_the_excerpt() ) );

	}
}

add_action( 'genesis_before_content_sidebar_wrap', 'genesis_starter_page_header' );
/**
 * Display the page header.
 *
 * Conditionally outputs the opening and closing page header markup and runs
 * genesis_starter_page_header which all of our header functions are hooked to.
 *
 * @since  2.2.4
 *
 * @return void
 */
function genesis_starter_page_header() {

	// Output opening markup.
	if ( apply_filters( 'genesis_starter_page_header_open', true ) ) {

		?>
		<section id="page-header" class="page-header" role="banner"><div class="wrap">
		<?php

	}

	/**
	 * Do page header hook.
	 *
	 * @hooked genesis_starter_page_title - 10
	 * @hooked genesis_starter_page_excerpt - 20
	 * @hooked genesis_do_posts_page_heading
	 * @hooked genesis_do_date_archive_title
	 * @hooked genesis_do_blog_template_heading
	 * @hooked genesis_do_taxonomy_title_description
	 * @hooked genesis_do_author_title_description
	 * @hooked genesis_do_cpt_archive_title_description
	 */
	do_action( 'genesis_starter_page_header' );

	// Output closing markup.
	if ( apply_filters( 'genesis_starter_page_header_close', true ) ) {

		?>
		</div></section>
		<?php

	}

}

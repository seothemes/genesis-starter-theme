<?php
/**
 * This file creates a new header section inside the site-header
 * then repositions page/entry titles into the new area
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Wrap header content in 'navbar' div.
 */
function starter_navbar_markup_open() {
	echo '<div class="navbar"><div class="wrap">';
}
add_action( 'genesis_header', 'starter_navbar_markup_open', 6 );

/**
 * Close header wrapper.
 */
function starter_navbar_markup_close() {
	echo '</div></div>';
}
add_action( 'genesis_header', 'starter_navbar_markup_close', 13 );

/**
 * Check for theme support.
 *
 * This needs to be checked after the navbar markup functions
 * and before the starter_custom_header function is run.
 */
if ( ! current_theme_supports( 'hero-section' ) ) {
	return;
}

// Add custom header callback to genesis meta.
add_action( 'genesis_meta', 'starter_custom_header' );

/**
 * Setup Hero Section
 *
 * Remove the existing title related functions from Genesis.
 */
function starter_setup_hero_section() {

	// Remove existing title related functions.
	remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
	remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
	remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
	remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
	remove_action( 'genesis_before_loop', 'genesis_do_blog_template_heading' );
	remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );

}
add_action( 'genesis_before', 'starter_setup_hero_section' );

/**
 * Create the main hero section function.
 *
 * This function is made up of four actions that are
 * added to the starter_hero hook.
 *
 * - starter_hero_markup_open
 * - starter_hero_title
 * - starter_hero_subtitle
 * - starter_hero_markup_close
 */
function starter_hero_section() {

	global $front_page_widgets;

	// Check if is front page has active widget areas.
	if ( is_front_page() && function_exists( 'is_active_sidebars' ) && is_active_sidebars( $front_page_widgets ) ) {
		return;
	}

	/**
	 * Start hero section.
	 *
	 * Checks if post has a featured image set and if so
	 * uses it as a background image for the hero section
	 */
	function starter_hero_markup_open() {

	    // Output the html.
		echo '<div class="hero"><div class="wrap">';

	}
	add_action( 'starter_hero', 'starter_hero_markup_open' );

	/**
	 * Titles.
	 *
	 * Displays the relevant entry/archive title depending on the post type
	 */
	function starter_hero_title() {

		// Figure out what page were on and display the correct title.
		if ( is_front_page() && ! is_home() ) {

			genesis_do_post_title();

		} elseif ( is_front_page() ) {

			echo sprintf( '<h1 class="entry-title" itemprop="headline">%s</h1>', get_the_title( get_option( 'page_on_front' ) ) );
			add_action( 'genesis_entry_header', 'genesis_do_post_title', 2 );

		} elseif ( is_404() ) {

			echo '<h1 class="entry-title" itemprop="headline">Page not found!</h1>';

		} elseif ( is_page_template( 'page_blog.php' ) ) {

			genesis_do_blog_template_heading();
			add_action( 'genesis_entry_header', 'genesis_do_post_title', 2 );

		} elseif ( is_home() || is_archive() ) {

			genesis_do_posts_page_heading();
			add_action( 'genesis_entry_header', 'genesis_do_post_title', 2 );

		} elseif ( is_date() ) {

			genesis_do_date_archive_title();

		} else {

			genesis_do_post_title();

		}
	}
	add_action( 'starter_hero', 'starter_hero_title' );

	/**
	 * Subtitles.
	 *
	 * Displays the description if one is set or will use
	 * page excerpts or breadcrumbs if no excerpt is set
	 */
	function starter_hero_subtitle() {

		if ( is_tax() ) {

			genesis_do_taxonomy_title_description();

		} elseif ( is_author() ) {

			genesis_do_author_title_description();

		} elseif ( is_post_type_archive() ) {

			genesis_do_cpt_archive_title_description();

		} elseif ( has_excerpt() ) {

			the_excerpt();

		} elseif ( is_front_page() ) {

			echo sprintf( '<p>%s</p>', esc_html( get_the_excerpt( get_option( 'page_on_front' ) ) ) );

		} else {

			genesis_do_breadcrumbs();

		}
	}
	add_action( 'starter_hero', 'starter_hero_subtitle' );

	/**
	 * End hero section.
	 *
	 * Adds the closing markup to the hero section
	 */
	function starter_hero_markup_close() {
		echo '</div></div>';
	}
	add_action( 'starter_hero', 'starter_hero_markup_close' );

	/**
	 * Run the starter_hero hook.
	 */
	do_action( 'starter_hero' );

}
add_action( 'genesis_header', 'starter_hero_section', 14 );

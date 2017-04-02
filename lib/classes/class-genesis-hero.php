<?php
/**
 * This file contains the Hero Section class.
 *
 * @package SeoThemes/GenesisHero
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	exit;
}

/**
 * Hero Section.
 */
class Genesis_Hero {

	/**
	 * Constructor.
	 */
	public function __construct() {

		// Add support for page excerpts.
		add_post_type_support( 'page', 'excerpt' );

		// Load hero section hooks.
		add_action( 'genesis_header', array( $this, 'hooks' ) );

		// Display hero section.
		add_action( 'genesis_after_header', array( $this, 'hero_section' ), 99 );
	}

	/**
	 * Remove all titles.
	 *
	 * @access public
	 * @since  0.1.0
	 */
	public function remove_titles() {
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
		remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
		remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
		remove_action( 'genesis_before_loop', 'genesis_do_blog_template_heading' );
		remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
		remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
		remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
		remove_action( 'genesis_before_loop', 'genesis_do_search_title' );

		// Hide WooCommerce Page Title.
		add_filter( 'woocommerce_show_page_title' , '__return_false' );
	}

	/**
	 * Opening markup.
	 */
	public function markup_open() {
		echo '<section class="hero-section overlay" role="banner">';
	}

	/**
	 * Opening wrap.
	 */
	public function wrap_open() {
		echo '<div class="wrap">';
	}

	/**
	 * Get the correct title.
	 */
	public function title() {

		$title = '';

		if ( class_exists( 'WooCommerce' ) && is_shop() ) {
			$title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );

		} elseif ( 'posts' === get_option( 'show_on_front' ) && is_home() ) {
			$title = __( 'Latest Posts', 'genesis-starter' );

		} elseif ( is_front_page() && ! is_home() ) {
			$title = get_the_title( get_option( 'page_on_front' ) );

		} elseif ( ! is_null( get_option( 'page_for_posts' ) ) && is_home() ) {
			$title = esc_html( get_the_title( get_option( 'page_for_posts' ) ) );

		} elseif ( is_author() ) {
			$title = get_the_author_meta( 'display_name', (int) get_query_var( 'author' ) );

		} elseif ( is_post_type_archive() ) {
			$title = genesis_get_cpt_option( 'headline' );

		} elseif ( is_archive() || is_category() || is_tag() || is_tax() ) {
			$title = single_term_title( false, false );

		} elseif ( is_date() ) {
			$title = genesis_do_date_archive_title();

		} elseif ( is_page_template( 'page_blog.php' ) ) {
			$title = genesis_do_blog_template_heading();

		} elseif ( is_search() ) {
			$title = __( 'Search Results', 'genesis-starter' );

		} elseif ( is_404() ) {
			$title = __( 'Page not found!', 'genesis-starter' );

		} else {
			$title = get_the_title();

		} // End if().

		// Add post titles back inside posts loop.
		if ( is_home() || is_archive() || is_category() || is_tag() || is_tax() || is_search() || is_page_template( 'page_blog.php' ) ) {
			add_action( 'genesis_entry_header', 'genesis_do_post_title', 2 );
		}

		// Output the title.
		if ( $title ) {
			printf( '<h1 itemprop="headline">%s</h1>', esc_html( $title ) );
		}
	}

	/**
	 * Get the subtitle.
	 */
	public function subtitle() {

		$subtitle = '';

		if ( class_exists( 'WooCommerce' ) && is_shop() ) {
			$subtitle = get_the_excerpt( get_option( 'woocommerce_shop_page_id' ) );

		} elseif ( 'posts' === get_option( 'show_on_front' ) && is_home() ) {
			$subtitle = __( 'Showing the latest posts', 'genesis-starter' );

		} elseif ( is_author() ) {
			$subtitle = get_the_author_meta( 'intro_text', (int) get_query_var( 'author' ) );

		} elseif ( is_post_type_archive() ) {
			$subtitle = genesis_get_cpt_option( 'intro_text' );

		} elseif ( is_archive() || is_category() || is_tag() || is_tax() ) {
			$subtitle = category_description();

		} elseif ( ! is_null( get_option( 'page_for_posts' ) ) && is_home() ) {
			$subtitle = esc_html( get_the_excerpt( get_option( 'page_for_posts' ) ) );

		} elseif ( is_search() ) {
			$subtitle = 'Showing search results for: ' . get_search_query();

		} elseif ( has_excerpt() ) {
			$subtitle = get_the_excerpt();

		} elseif ( genesis_is_root_page() ) {
			$subtitle = esc_html( get_the_excerpt( get_option( 'page_on_front' ) ) );

		} else {
			$subtitle = genesis_do_breadcrumbs();

		} // End if().

		// Output the subtitle.
		if ( $subtitle ) {
			printf( '<p itemprop="description">%s</p>', wp_kses_post( $subtitle ) );
		}
	}

	/**
	 * Closing wrap.
	 */
	public function wrap_close() {
		echo '</div>';
	}

	/**
	 * Closing markup.
	 */
	public function markup_close() {
		echo '</section>';
	}

	/**
	 * Add actions to hook.
	 */
	public function hooks() {

		// Add actions to genesis_hero hook.
		add_action( 'genesis_hero', array( $this, 'remove_titles' ), 2 );
		add_action( 'genesis_hero', array( $this, 'markup_open' ), 4 );
		add_action( 'genesis_hero', array( $this, 'wrap_open' ), 6 );
		add_action( 'genesis_hero', array( $this, 'title' ), 8 );
		add_action( 'genesis_hero', array( $this, 'subtitle' ), 10 );
		add_action( 'genesis_hero', array( $this, 'wrap_close' ), 12 );
		add_action( 'genesis_hero', array( $this, 'markup_close' ), 14 );
	}

	/**
	 * Display Hero.
	 */
	public function hero_section() {

		// Run hook.
		do_action( 'genesis_hero' );
	}
}

$hero = new Genesis_Hero();

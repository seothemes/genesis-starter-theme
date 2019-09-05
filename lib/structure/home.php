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

namespace SeoThemes\GenesisStarterTheme\Structure;

\add_action( 'genesis_meta', __NAMESPACE__ . '\front_page_loop', 5 );
/**
 * Only add hooks if were on the front page.
 *
 * @since 3.5.0
 *
 * @return void
 */
function front_page_loop() {
	if ( \is_front_page() && \is_active_sidebar( 'front-page-1' ) ) {
		\add_action( 'genesis_loop', __NAMESPACE__ . '\front_page_widget_areas' );
		\add_filter( 'body_class', __NAMESPACE__ . '\front_page_body_class' );
		\add_filter( 'genesis_markup_content-sidebar-wrap', '__return_null' );
		\add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
		\remove_action( 'genesis_loop', 'genesis_do_loop' );
		\remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
		\remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_posts_nav' );
		\remove_theme_support( 'hero-section' );
	}
}

/**
 * Add additional classes to the body element.
 *
 * @since  3.5.0
 *
 * @param  array $classes Body classes.
 *
 * @return array
 */
function front_page_body_class( $classes ) {
	$classes   = \array_diff( $classes, [ 'no-hero-section' ] );
	$classes[] = 'front-page';

	return $classes;
}

/**
 * Display the front page widget areas.
 *
 * @since 3.5.0
 *
 * @return void
 */
function front_page_widget_areas() {
	$widget_areas = \get_theme_support( 'front-page-widgets' )[0];

	for ( $i = 1; $i <= $widget_areas; $i++ ) {
		\genesis_widget_area( 'front-page-' . $i );
	}
}

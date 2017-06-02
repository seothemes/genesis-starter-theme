<?php
/**
 * Template Name: Page Builder
 *
 * This file adds the page builder template to the Genesis Starter theme.
 * It removes everything in between the header and footer leaving
 * a blank template that is compatibale with page builder plugins.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/themes/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Add page builder class to body.
 *
 * @param  array $classes Array of body classes.
 * @return array $classes Array of body classes.
 */
function starter_page_builder_class( $classes ) {

	$classes[] = 'page-builder';

	return $classes;

}
add_filter( 'body_class', 'starter_page_builder_class' );

// Remove page title.
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

// Remove breadcrumbs.
remove_action( 'genesis_after_header', 'genesis_do_breadcrumbs', 14 );

// Force full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
add_filter( 'genesis_markup_site-inner', '__return_null' );
add_filter( 'genesis_markup_content', '__return_null' );

// Remove site-inner wrap.
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'menu-primary',
	'menu-secondary',
	'footer-widgets',
	'footer',
) );

// Do loop.
genesis();

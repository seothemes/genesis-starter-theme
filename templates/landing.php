<?php
/**
 * Template Name: Landing
 *
 * Template Post Type: post, page, product, portfolio
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-2.0-or-later
 */

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\dequeue_skip_links' );
/**
 * Dequeues Skip Links Script.
 *
 * @since 3.5.0
 */
function dequeue_skip_links() {
	wp_dequeue_script( 'skip-links' );
}

// Removes skip links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

// Removes site header elements.
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

// Removes navigation.
remove_theme_support( 'genesis-menus' );

// Removes hero section.
remove_theme_support( 'hero-section' );

// Removes footer widgets.
remove_action( 'genesis_footer', __NAMESPACE__ . '\before_footer_widget', 5 );
remove_action( 'genesis_footer', 'genesis_footer_widget_areas', 6 );

// Removes site footer elements.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

// Runs the Genesis loop.
genesis();

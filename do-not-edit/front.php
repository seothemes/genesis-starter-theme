<?php
/**
 * Genesis Starter Theme
 *
 * Template Name: Front Page
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

// Force full-width-content layout.
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove hero section.
remove_theme_support( 'hero-section' );

// Removes the breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', __NAMESPACE__ . '\front_page_loop' );
/**
 * Add custom front page loop.
 *
 * @since 1.0.0
 *
 * @return void
 */
function front_page_loop() {
	do_action( 'genesis_front_page' );
}

// Run Genesis.
genesis();

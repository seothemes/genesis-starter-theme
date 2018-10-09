<?php
/**
 * Genesis Starter Theme
 *
 * WARNING: This file is should not be modified under any circumstances.
 * Customizations should be made in the form of a core-functionality
 * plugin so that the theme can be updated without losing changes.
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://seothemes.com/genesis-starter-theme
 * @author    SEO Themes
 * @copyright Copyright © 2018 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\GenesisStarterTheme;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Force full-width-content layout.
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove content-sidebar-wrap.
add_filter( 'genesis_markup_content-sidebar-wrap', '__return_null' );

// Remove hero section.
remove_theme_support( 'hero-section' );

// Remove default hero section.
remove_action( 'genesis_before_content_sidebar_wrap', 'corporate_hero_section' );

// Replace default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', __NAMESPACE__ . '\full_page_loop' );
/**
 * Custom loop, remove all hooks except entry content.
 *
 * @since 1.0.0
 *
 * @return void
 */
function full_page_loop() {
	if ( have_posts() ) :
		the_post();
		do_action( 'genesis_entry_content' );
	endif;
}

// Run Genesis.
\genesis();

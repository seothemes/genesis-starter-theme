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

// Check if any front page widgets are active.
if ( is_active_sidebar( 'front-page-1' ) ||
     is_active_sidebar( 'front-page-2' ) ||
     is_active_sidebar( 'front-page-3' ) ||
     is_active_sidebar( 'front-page-4' ) ||
     is_active_sidebar( 'front-page-5' ) ||
     is_active_sidebar( 'front-page-6' ) ||
     is_active_sidebar( 'front-page-7' ) ||
     is_active_sidebar( 'front-page-8' ) ||
     is_active_sidebar( 'front-page-9' ) ) {

	// Force full-width-content layout.
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	// Remove content-sidebar-wrap.
	add_filter( 'genesis_markup_content-sidebar-wrap', '__return_null' );

	// Remove default hero section.
	remove_action( 'genesis_before_content_sidebar_wrap', 'corporate_hero_section' );

	// Remove default loop.
	remove_action( 'genesis_loop', 'genesis_do_loop' );
}

// Run Genesis.
\genesis();

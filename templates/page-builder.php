<?php
/**
 * Template Name: Page Builder
 *
 * This file adds the page builder template to the Genesis Starter
 * theme. It removes everything between the site header and footer
 * leaving a blank template perfect for page builder plugins.
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

// Remove default page header.
remove_action( 'genesis_after_header', 'starter_page_header_open', 20 );
remove_action( 'genesis_after_header', 'starter_page_header_title', 24 );
remove_action( 'genesis_after_header', 'starter_page_header_close', 28 );

// Get site-header.
get_header();

// Custom loop, remove all hooks except entry content.
if ( have_posts() ) :

	the_post();

	do_action( 'genesis_entry_content' );

endif;

// Get site-footer.
get_footer();

<?php
/**
 * Genesis Starter
 *
 * Template Name: Page Builder
 *
 * This file adds the page builder template to the Genesis Starter
 * theme. It removes everything between the site header and footer
 * leaving a blank template perfect for page builder plugins.
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

// Remove default page header.
remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_starter_page_header' );

// Get site-header.
get_header();

// Custom loop, remove all hooks except entry content.
if ( have_posts() ) :

	the_post();

	do_action( 'genesis_entry_content' );

endif;

// Get site-footer.
get_footer();

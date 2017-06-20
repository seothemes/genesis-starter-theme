<?php
/**
 * Template Name: Page Builder
 *
 * This file adds the page builder template to the Genesis Starter
 * theme. It removes everything in between the header and footer
 * leaving a blank template perfect for page builder plugins.
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

// Get site-header.
get_header();

// Custom loop, remove all hooks except entry content.
if ( have_posts() ) :

	while ( have_posts() ) : the_post();

		do_action( 'genesis_entry_content' );

	endwhile; // End of post.

endif; // End loop.

// Get site-footer.
get_footer();

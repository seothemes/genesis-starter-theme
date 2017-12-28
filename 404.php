<?php
/**
 * Genesis Starter.
 *
 * This file adds the 404 page template to the Genesis Starter Theme.
 *
 * @package Genesis Starter
 * @author  SEOThemes
 * @license GPL-2.0+
 * @link    https://seothemes.com/themes/genesis-starter/
 * @todo    Delete file when Genesis 2.6 is released.
 */

// Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'genesis_starter_404' );
/**
 * This function outputs a 404 "Not Found" error message.
 *
 * @since 1.6
 */
function genesis_starter_404() {

	genesis_markup( array(
		'open' => '<article class="entry">',
		'context' => 'entry-404',
	) );

	genesis_markup( array(
		'open'    => '<div %s>',
		'context' => 'entry-content',
	) );

	/* translators: %s: URL for current website. */
	echo apply_filters( 'genesis_404_entry_content', '<p>' . sprintf( __( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it by using the search form below.', 'genesis' ), trailingslashit( home_url() ) ) . '</p>' );

	get_search_form();

	echo '<h2>' . __( 'Sitemap', 'genesis-starter' ) . '</h2>';

	genesis_sitemap( 'h3' );

	genesis_markup( array(
		'close'   => '</div>',
		'context' => 'entry-content',
	) );

	genesis_markup( array(
		'close' => '</article>',
		'context' => 'entry-404',
	) );

}

genesis();

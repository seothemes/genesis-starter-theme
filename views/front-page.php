<?php
/**
 * Genesis Starter.
 *
 * This file adds the front page to the Genesis Starter Theme.
 *
 * @package Genesis Starter
 * @author  SeoThemes
 * @license GPL-2.0+
 * @link    https://seothemes.net/themes/genesis-starter/
 */

/**
 * Dynamic front page widget areas.
 *
 * @var $widget_areas Number of widget areas.
 */
function starter_frontpage_widgets() {

	$widget_areas = get_option( 'starter_frontpage_widgets', 1 );

	// Return early if is paged or no front page widget areas.
	if ( is_paged() || '0' === $widget_areas ) {
		return;
	}

	// Remove page title if not showing posts.
	if ( ! is_home() ) {
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}

	// Loop through dynamic widget areas.
	for ( $i = 1; $i <= $widget_areas; $i++ ) {

		if ( 1 === $i && is_active_sidebar( 'front-page-1' ) ) : ?>

			<div class="front-page-1" role="banner">
				<?php the_custom_header_markup(); ?>
				<div class="wrap">
				<?php genesis_widget_area( 'front-page-1', array(
					'before' => false,
					'after'  => false,
				) ); ?>
				</div>
			</div>

		<?php else :

			genesis_widget_area( "front-page-$i", array(
				'before' => sprintf( '<div class="front-page-%s"><div class="wrap">', $i ),
				'after'  => '</div></div>',
			) );

		endif;
	}
}
add_action( 'genesis_before_content_sidebar_wrap', 'starter_frontpage_widgets', 1 );

// Remove the default Genesis loop.
if ( 'false' === get_option( 'starter_frontpage_content' ) ) {

	// Force full width.
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	// Remove unwanted content markup.
	add_filter( 'genesis_markup_content', '__return_null' );

	// Remove loop.
	remove_action( 'genesis_loop', 'genesis_do_loop' );

	// Remove site-inner opening wrap.
	remove_action( 'genesis_before_content_sidebar_wrap', 'starter_wrap_open', 6 );

	// Remove site-inner closing wrap.
	remove_action( 'genesis_after_content_sidebar_wrap', 'starter_wrap_close', 13 );
}

// Run Genesis.
genesis();

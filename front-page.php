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

	// Return early if no front page widget areas.
	if ( '0' === $widget_areas ) {
		return;
	}

	// Remove breadcrumbs.
	remove_action( 'genesis_after_header', 'genesis_do_breadcrumbs', 14 );

	// Remove page title if not showing posts.
	if ( ! is_home() ) {
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}

	// Loop through widget areas.
	for ( $i = 1; $i <= $widget_areas; $i++ ) {

		if ( 1 === $i && is_active_sidebar( 'front-page-1' ) ) : ?>

			<section role="banner" class='front-page-1<?php echo esc_attr( starter_flexible_widgets( 'front-page-1' ) ); ?>'>
				<div class="wrap">
				<?php genesis_widget_area( 'front-page-1', array(
					'before' => false,
					'after'  => false,
				) ); ?>
				</div>
				<?php the_custom_header_markup(); ?>
			</section>

		<?php else :

			genesis_widget_area( "front-page-$i", array(
				'before' => sprintf( '<div class="front-page-%s%s"><div class="wrap">', $i, starter_flexible_widgets( 'front-page-' . $i ) ),
				'after'  => '</div></div>',
			) );

		endif;
	}
}

// Remove the default Genesis loop.
if ( 'false' === get_option( 'starter_frontpage_content' ) ) {

	// Remove all site-inner markup.
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

	// Remove loop.
	remove_action( 'genesis_loop', 'genesis_do_loop' );
}

// Show the dynamic widgets before or after the page content.
if ( 'false' === get_option( 'starter_frontpage_order' ) ) {
	add_action( 'genesis_before_footer', 'starter_frontpage_widgets' );
} else {
	add_action( 'genesis_after_header', 'starter_frontpage_widgets' );
}

// Run Genesis.
genesis();

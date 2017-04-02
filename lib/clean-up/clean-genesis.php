<?php
/**
 * This file removes unused Genesis Framework features.
 *
 * Remove Sidebars (use /lib/widget-areas.php instead)
 * Remove Site Layouts
 * Remove content-sidebar-wrap
 * Remove Navigation Extras
 * Remove Edit Post Link
 * Remove Blog & Archive Templates
 * Remove Extra Widget Markup
 * Correct schema microdata
 * Change footer credits
 *
 * @package      Genesis Starter
 * @version      1.1.2
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Remove primary sidebar.
unregister_sidebar( 'sidebar' );

// Remove secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Remove header right widget area.
unregister_sidebar( 'header-right' );

// Remove site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Remove content-sidebar-wrap.
add_filter( 'genesis_markup_content-sidebar-wrap', function() {
	return null;
} );

// Remove the edit post link.
add_filter( 'genesis_edit_post_link' , '__return_false' );

// Change order of main stylesheet to override plugin styles.
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 99 );

// Reposition primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_header', 'genesis_do_subnav', 14 );

// Remove featured image from content.
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_post_content', 'genesis_do_post_image' );

/**
 * Remove Genesis Blog & Archive Page Templates.
 *
 * @param  array $page_templates All page templates.
 * @return array Modified templates.
 */
function starter_remove_genesis_page_templates( $page_templates ) {
	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );
	return $page_templates;
}
add_filter( 'theme_page_templates', 'starter_remove_genesis_page_templates' );

/**
 * Remove excessive body classes.
 *
 * @uses starter_body_class Located /lib/clean-up/clean-body-class.php
 * @param array $classes Existing classes for `body` element.
 * @return array Amended classes for `body` element.
 */
function starter_attributes_body( $classes ) {

	$classes['class'] = join( ' ', starter_body_class() );

	return $classes;

}
add_filter( 'genesis_attr_body', 'starter_attributes_body' );

/**
 * Modify breadcrumb arguments.
 *
 * @param  array $args Original breadcrumb args.
 * @return array Cleaned breadcrumbs.
 */
function starter_breadcrumb_args( $args ) {
	$args['labels']['prefix'] = '';
	$args['labels']['author'] = '';
	$args['labels']['category'] = '';
	$args['labels']['tag'] = '';
	$args['labels']['date'] = '';
	$args['labels']['tax'] = '';
	$args['labels']['post_type'] = '';
	return $args;
}
add_filter( 'genesis_breadcrumb_args', 'starter_breadcrumb_args' );

/**
 * Display featured image before post content on blog.
 *
 * @return array Featured image size.
 */
function starter_display_featured_image() {

	// Check display featured image option.
	$genesis_settings = get_option( 'genesis-settings' );

	if ( ( ! is_archive() && ! is_home() && ! is_page_template( 'page_blog.php' ) ) || ( 1 !== $genesis_settings['content_archive_thumbnail'] ) ) {
		return;
	}

	// Display featured image.
	add_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );

}
add_action( 'genesis_before', 'starter_display_featured_image' );

/**
 * Clean up widget markup.
 *
 * Removes widget-wrap div and changes widget titles
 * to use <b> instead of <h3>.
 *
 * @param array $defaults Widget area defaults.
 */
function starter_clean_up_widgets( $defaults ) {

	$defaults = array(

		'before_widget' => genesis_markup( array(
			'open'    => '<div class="widget %%2$s">',
			'context' => 'widget-wrap',
			'echo'    => false,
		) ),

		'after_widget'  => genesis_markup( array(
			'close'   => '</div>',
			'context' => 'widget-wrap',
			'echo'    => false,
		) ),

		'before_title'  => '<b class="widget-title">',
		'after_title'   => "</b>\n",

	);
	return $defaults;

}
add_filter( 'genesis_register_widget_area_defaults', 'starter_clean_up_widgets' );

/**
 * Add schema microdata to title-area.
 *
 * @param  array $args Array of arguments.
 * @return array $args Additional arguments.
 */
function starter_title_area( $args ) {
	$args['itemscope'] = 'itemscope';
	$args['itemtype'] = 'http://schema.org/Organization';
	return $args;
}
add_filter( 'genesis_attr_title-area', 'starter_title_area' );

/**
 * Correct site-title schema microdata.
 *
 * @param  array $args Array of arguments.
 * @return array $args New arguments.
 */
function starter_site_title( $args ) {
	$args['itemprop'] = 'name';
	return $args;
}
add_filter( 'genesis_attr_site-title', 'starter_site_title' );

/**
 * Change the footer text.
 *
 * @param  string $creds Defaults.
 * @return string Custom footer credits.
 */
function starter_footer_creds_filter( $creds ) {
	$creds = '[footer_copyright] <a href="' . CHILD_THEME_URL . '">Genesis Starter</a> by <a href="https://seothemes.net" title="Seo Themes">Seo Themes</a>. Built on the Genesis Framework.';
	return $creds;
}
add_filter( 'genesis_footer_creds_text', 'starter_footer_creds_filter' );

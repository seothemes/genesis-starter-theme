<?php
/**
 * Remove unused WordPress & Genesis Framework features.
 *
 * Remove Secondary Sidebar
 * Remove Site Layouts
 * Remove Footer Credits
 * Remove Navigation Extras
 * Remove Superfish Menu Scripts
 * Remove Emoji Support
 * Remove Extra Menu Item Classes
 * Remove Thumbnail Support & File Organization
 * Remove Edit Post Link
 * Remove Blog & Archive Templates
 *
 * @package      Genesis Starter
 * @version      1.1.2
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// Remove secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Remove site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Remove credits if footer after footer is set.
if ( is_active_sidebar( 'after-footer' ) ) {
	remove_action( 'genesis_footer', 'genesis_do_footer' );
}

/**
 * Change the footer text.
 *
 * @param  string $creds Defaults.
 * @return string Custom footer credits.
 */
function starter_footer_creds_filter( $creds ) {
	$creds = '[footer_copyright] <a href="https://seothemes.net/genesis-starter">Genesis Starter</a> by <a href="https://seothemes.net" title="Seo Themes">Seo Themes</a>. Built on the Genesis Framework.';
	$creds = sprintf( '<div class="after-footer"><div class="wrap">%s</div></div>', $creds );
	return $creds;
}
add_filter( 'genesis_footer_creds_text', 'starter_footer_creds_filter' );

// Remove output of primary navigation right extras.
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

/**
 * Remove superfish scripts.
 */
function starter_disable_superfish() {
	wp_deregister_script( 'superfish' );
	wp_deregister_script( 'superfish-args' );
}
add_action( 'wp_enqueue_scripts', 'starter_disable_superfish' );

/**
 * Remove superfish menus.
 *
 * @param  array $args Default classes.
 * @return array $args Cleaned up.
 */
function starter_remove_superfish_nav_primary( $args ) {
	if ( 'primary' === $args['theme_location'] ) {
		$args['menu_class'] = 'menu genesis-nav-menu menu-primary';
	}
	return $args;
}
add_filter( 'wp_nav_menu_args', 'starter_remove_superfish_nav_primary' );

/**
 * Remove emoji support.
 */
function starter_remove_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'starter_remove_tinymce_emojis' );
}
add_action( 'init', 'starter_remove_emojis' );

/**
 * Remove tinymce emoji plugin.
 *
 * @param  array $plugins Array of plugins.
 * @return array Removed from plugins.
 */
function starter_remove_tinymce_emojis( $plugins ) {
	if ( ! is_array( $plugins ) ) {
		return array();
	}
	return array_diff( $plugins, array( 'wpemoji' ) );
}

/**
 * Remove excessive menu-item classes.
 *
 * @param  array $var Too many classes.
 * @return array That's better.
 */
function starter_menu_class_filter( $var ) {
	return is_array( $var ) ? array_intersect( $var, array( 'current-menu-item', 'menu-item', 'menu-item-has-children' ) ) : '';
}
add_filter( 'nav_menu_css_class', 'starter_menu_class_filter', 100, 1 );
add_filter( 'nav_menu_item_id', 'starter_menu_class_filter', 100, 1 );
add_filter( 'page_css_class', 'starter_menu_class_filter', 100, 1 );

// Remove thumbnail cropping & date organization of uploads.
$media_options = array(
	'thumbnail_size_w',
	'thumbnail_size_h',
	'medium_size_w',
	'medium_size_h',
	'large_size_w',
	'large_size_h',
	'uploads_use_yearmonth_folders',
);

foreach ( $media_options as $media_option ) {
	if ( 0 !== $media_option ) {
		update_option( $media_option, 0 );
	}
}

// Remove the edit post link.
add_filter( 'genesis_edit_post_link' , '__return_false' );

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


// Change order of main stylesheet to override plugin styles.
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 100 );

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

// Reposition primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_header', 'genesis_do_subnav', 14 );

/**
 * Display featured image before post content on archives.
 *
 * @return array Featured image size.
 */
function starter_display_featured_image() {

	if ( ! is_archive() || ! is_home() || ! is_template( 'page_blog.php' ) ) {
		return;
	}
	genesis_image( array(
		'size' => 'large',
	) );
}
add_action( 'genesis_before_entry', 'starter_display_featured_image' );

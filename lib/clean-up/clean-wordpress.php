<?php
/**
 * Remove unused WordPress features.
 *
 * Clean up wp_head()
 * Clean up output of script tags
 * Remove Superfish Menu Scripts
 * Remove Emoji Support
 * Remove Extra Menu Item Classes
 * Remove unnecessary self-closing tags
 * Remove default tagline from RSS
 * Clean Image Widget markup
 * Add mobile hover effect
 * Enable SVG uploads
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

/**
 * Clean up wp_head()
 *
 * Remove unnecessary <link>'s
 * Remove inline CSS and JS from WP emoji support
 * Remove inline CSS used by Recent Comments widget
 * Remove inline CSS used by posts with galleries
 * Remove self-closing tags
 *
 * @since 1.5.0
 */
function starter_head_cleanup() {

	// Originally from http://wpengineer.com/1438/wordpress-header/.
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	add_action( 'wp_head', 'ob_start', 1, 0 );
	add_action( 'wp_head', function () {
		$pattern = '/.*' . preg_quote( esc_url( get_feed_link( 'comments_' . get_default_feed() ) ), '/' ) . '.*[\r\n]+/';
		echo preg_replace( $pattern, '', ob_get_clean() );
	}, 3, 0);
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'use_default_gallery_style', '__return_false' );
	add_filter( 'emoji_svg_url', '__return_false' );
	global $wp_widget_factory;
	if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
		remove_action( 'wp_head', [ $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ] );
	}
}
add_action( 'init', 'starter_head_cleanup' );

/**
 * Clean up output of <script> tags.
 *
 * @since 1.5.0
 * @param string $input Scripts.
 */
function starter_clean_script_tag( $input ) {
	$input = str_replace( "type='text/javascript' ", '', $input );
	return str_replace( "'", '"', $input );
}
add_filter( 'script_loader_tag', 'starter_clean_script_tag' );

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

/**
 * Remove unnecessary self-closing tags
 *
 * @since 1.5.0
 */
function starter_remove_self_closing_tags( $input ) {
	return str_replace( ' />', '>', $input );
}
add_filter( 'get_avatar', 'starter_remove_self_closing_tags' );
add_filter( 'comment_id_fields', 'starter_remove_self_closing_tags' );
add_filter( 'post_thumbnail_html', 'starter_remove_self_closing_tags' );

/**
 * Don't return the default description in the
 * RSS feed if it hasn't been changed.
 *
 * @since 1.5.0
 * @param string $bloginfo Site tagline.
 */
function remove_default_description( $bloginfo ) {
	$default_tagline = 'Just another WordPress site';
	return ($bloginfo === $default_tagline) ? '' : $bloginfo;
}
add_filter( 'get_bloginfo_rss', 'starter_remove_default_description' );

/**
 * Clean up Image Widget markup.
 *
 * This overrides the default widget template with
 * a custom one in /templates/image-widget.php.
 *
 * @since 1.5.0
 * @param string $template The template file location.
 */
function starter_image_widget_template( $template ) {
	return get_stylesheet_directory() . '/templates/image-widget.php';
}
add_filter( 'sp_template_image-widget_widget.php', 'starter_image_widget_template' );

/**
 * Emulate hover effects on mobile devices.
 *
 * @since 1.5.0
 * @param  string $attributes On touch start attribute.
 * @return string
 */
function starter_add_ontouchstart( $attributes ) {
	$attributes['ontouchstart'] = ' ';
	return $attributes;
}
add_filter( 'genesis_attr_body', 'starter_add_ontouchstart' );

/**
 * Enable svg uploads.
 *
 * @since 1.5.0
 * @param  array $mimes Mime types.
 * @return array $mimes Added SVG to mime types
 */
function starter_svg_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'starter_svg_mime_types' );

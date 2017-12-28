<?php
/**
 * This file registers the required plugins for the Genesis Starter theme.
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

add_filter( 'genesis_theme_settings_defaults', 'genesis_starter_theme_defaults' );
/**
 * Update Theme Settings upon reset.
 *
 * @since  1.0.0
 *
 * @param  array $defaults Default theme settings.
 *
 * @return array Custom theme settings.
 */
function genesis_starter_theme_defaults( $defaults ) {

	$defaults['blog_cat_num']              = 6;
	$defaults['content_archive']           = 'excerpt';
	$defaults['content_archive_limit']     = 300;
	$defaults['content_archive_thumbnail'] = 1;
	$defaults['image_alignment']           = 'alignnone';
	$defaults['posts_nav']                 = 'numeric';
	$defaults['image_size']                = 'large';
	$defaults['site_layout']               = 'content-sidebar';

	return $defaults;

}

add_action( 'after_switch_theme', 'genesis_starter_theme_setting_defaults' );
/**
 * Update Theme Settings upon activation.
 *
 * @since 1.0.0
 *
 * @return void
 */
function genesis_starter_theme_setting_defaults() {

	if ( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( array(
			'blog_cat_num'              => 6,
			'content_archive'           => 'excerpt',
			'content_archive_limit'     => 300,
			'content_archive_thumbnail' => 1,
			'image_alignment'           => 'alignnone',
			'image_size'                => 'large',
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'content-sidebar',
		) );

	}

	update_option( 'posts_per_page', 8 );

}

add_filter( 'simple_social_default_styles', 'genesis_starter_social_default_styles' );
/**
 * Starter Pro Simple Social Icon Defaults.
 *
 * @since  2.0.0
 * 
 * @param  array $defaults Default Simple Social Icons settings.
 *
 * @return array Custom settings.
 */
function genesis_starter_social_default_styles( $defaults ) {

	$args = array(
		'alignment'              => 'alignleft',
		'background_color'       => '#eeeeee',
		'background_color_hover' => '#333333',
		'border_radius'          => 0,
		'border_color'           => '#ffffff',
		'border_color_hover'     => '#ffffff',
		'border_width'           => 0,
		'icon_color'             => '#333333',
		'icon_color_hover'       => '#ffffff',
		'size'                   => 40,
		'new_window'             => 1,
		'facebook'               => '#',
		'gplus'                  => '#',
		'instagram'              => '#',
		'dribbble'               => '#',
		'twitter'                => '#',
		'youtube'                => '#',
	);

	$args = wp_parse_args( $args, $defaults );

	return $args;

}

add_action( 'after_switch_theme', 'genesis_starter_excerpt_metabox' );
/**
 * Display excerpt metabox by default.
 *
 * Business Pro adds support for excerpts on pages to be used as
 * subtitles on the front end of the site. The excerpt metabox
 * is hidden by default on the page edit screen which can cause
 * some confusion for users when they want to edit or remove the
 * excerpt. To make it easier, we want to show the excerpt metabox
 * by default and that's what this function is for. It only runs
 * after switching theme so the current user's screen options are
 * updated, allowing them to hide the metabox if not used.
 *
 * @since  2.2.1
 *
 * @return void
 */
function genesis_starter_excerpt_metabox() {

	// Get current user ID.
	$user_id = get_current_user_id();

	// Create array of post types to include.
	$post_types = array(
		'page',
		'post',
		'portfolio',
	);

	// Loop through each post type and update user meta.
	foreach ( $post_types as $post_type ) {

		// Create variables.
		$meta_key   = 'metaboxhidden_' . $post_type;
		$prev_value = get_user_meta( $user_id, $meta_key, true );

		// Check if value is an array.
		if ( ! is_array( $prev_value ) ) {

			$prev_value = array(
				'genesis_inpost_seo_box',
				'postcustom',
				'postexcerpt',
				'commentstatusdiv',
				'commentsdiv',
				'slugdiv',
				'authordiv',
				'genesis_inpost_scripts_box',
			);

		}

		// Empty array to prevent errors.
		$meta_value = array();

		// Remove excerpt from array.
		$meta_value = array_diff( $prev_value, array( 'postexcerpt' ) );

		// Update user meta with new value.
		update_user_meta( $user_id, $meta_key, $meta_value, $prev_value );

	}

}

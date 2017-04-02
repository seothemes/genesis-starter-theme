<?php
/**
 * Genesis Starter.
 *
 * This file adds the one click demo import
 * functionality to the Genesis Starter theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

/**
 * One click demo import.
 *
 * @since 1.5.0
 */
function starter_import_files() {
	return array(
	    array(
			'import_file_name'             => 'Demo Content',
			'local_import_file'            => get_stylesheet_directory() . '/assets/demo/content.xml',
			'local_import_widget_file'     => get_stylesheet_directory() . '/assets/demo/widgets.wie',
			'local_import_customizer_file' => get_stylesheet_directory() . '/assets/demo/customizer.dat',
			'import_preview_image_url'     => '/wp-content/themes/' . CHILD_THEME_NAME . '/screenshot.png',
	    ),
	);
}
add_filter( 'pt-ocdi/import_files', 'starter_import_files' );

/**
 * Setup theme after import.
 *
 * @since 1.5.0
 */
function starter_after_import_setup() {

	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Header Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
	        'primary' => $main_menu->term_id,
	    )
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'starter_after_import_setup' );

<?php
/**
 * This file adds extra functions used in the Genesis Starter Theme.
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

add_filter( 'body_class', 'genesis_starter_body_class' );
/**
 * Add fixed header class.
 *
 * Checks if theme supports a fixed header and if so, adds a 'fixed-header'
 * class to the body. To enable a fixed header simply add theme support e.g:
 * `add_theme_support( 'fixed-header' );`
 *
 * @since  2.0.0
 *
 * @param  array $classes Body classes.
 *
 * @return array
 */
function genesis_starter_body_class( $classes ) {

	if ( current_theme_supports( 'fixed-header' ) ) {

		$classes[] = 'has-fixed-header';

	}

	if ( has_nav_menu( 'secondary' ) ) {

		$classes[] = 'has-nav-secondary';

	}

	if ( is_active_sidebar( 'before-header' ) ) {

		$classes[] = 'has-before-header';

	}

	return $classes;

}

add_filter( 'genesis_attr_title-area', 'genesis_starter_title_area_schema' );
/**
 * Add schema microdata to title-area.
 *
 * @since  2.2.1
 *
 * @param  array $attr Array of attributes.
 *
 * @return array
 */
function genesis_starter_title_area_schema( $attr ) {

	$attr['itemscope'] = 'itemscope';
	$attr['itemtype']  = 'http://schema.org/Organization';

	return $attr;

}

add_filter( 'genesis_attr_site-title', 'genesis_starter_site_title_schema' );
/**
 * Correct site title schema.
 *
 * @since  2.2.1
 *
 * @param  array $attr Array of attributes.
 *
 * @return array
 */
function genesis_starter_site_title_schema( $attr ) {

	$attr['itemprop'] = 'name';

	return $attr;
}

add_filter( 'theme_page_templates', 'genesis_starter_remove_templates' );
/**
 * Remove Page Templates.
 *
 * The Genesis Blog & Archive templates are not needed and can
 * create problems for users so it's safe to remove them. If
 * you need to use these templates, simply remove this function.
 *
 * @since  2.2.1
 *
 * @param  array $page_templates All page templates.
 *
 * @return array Modified templates.
 */
function genesis_starter_remove_templates( $page_templates ) {

	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );

	return $page_templates;

}

add_action( 'genesis_admin_before_metaboxes', 'genesis_starter_remove_metaboxes' );
/**
 * Remove blog metabox.
 *
 * Also remove the Genesis blog settings metabox from the
 * Genesis admin settings screen as it is no longer required
 * if the Blog page template has been removed.
 *
 * @param string $hook The metabox hook.
 */
function genesis_starter_remove_metaboxes( $hook ) {

	remove_meta_box( 'genesis-theme-settings-blogpage', $hook, 'main' );

}

add_filter( 'genesis_site_layout', 'genesis_starter_page_layouts' );
/**
 * Set page layout for special page templates.
 *
 * This allows users to choose the page layout for the search results
 * page and the error 404 page by creating the pages with the same
 * slug. Featured images and excerpts are also used from them.
 *
 * @since 2.2.7
 *
 * @return string
 */
function genesis_starter_page_layouts() {

	if ( is_search() ) {

		$page   = get_page_by_path( 'search' );
		$field  = genesis_get_custom_field( '_genesis_layout', $page->ID );
		$layout = $field ? $field : genesis_get_option( 'site_layout' );

		return $layout;

	}

	if ( is_404() ) {

		$page   = get_page_by_path( 'error' );
		$field  = genesis_get_custom_field( '_genesis_layout', $page->ID );
		$layout = $field ? $field : genesis_get_option( 'site_layout' );

		return $layout;

	}

}

add_action( 'wp_head', 'genesis_starter_remove_ssi_inline_styles', 1 );
/**
 * Remove Simple Social Icons inline CSS.
 *
 * No longer needed because we are generating custom CSS instead,
 * removing this means that we don't need to use !important rules
 * in the above function.
 *
 * @since  2.0.0
 *
 * @return void
 */
function genesis_starter_remove_ssi_inline_styles() {

	global $wp_widget_factory;

	remove_action( 'wp_head', array( $wp_widget_factory->widgets['Simple_Social_Icons_Widget'], 'css' ) );

}

add_action( 'wp_head', 'genesis_starter_simple_social_icons_css' );
/**
 * Simple Social Icons multiple instances workaround.
 *
 * By default, Simple Social Icons only allows you to create one
 * style for your icons, even if you have multiple on one page.
 * This function allows us to output different styles for each
 * widget that is output on the front end.
 *
 * @since  2.0.0
 *
 * @return void
 */
function genesis_starter_simple_social_icons_css() {

	if ( ! class_exists( 'Simple_Social_Icons_Widget' ) ) {

		return;

	}

	$obj = new Simple_Social_Icons_Widget();

	// Get widget settings.
	$all_instances = $obj->get_settings();

	// Loop through instances.
	foreach ( $all_instances as $key => $options ) :

		$instance = wp_parse_args( $all_instances[ $key ] );
		$font_size = round( (int) $instance['size'] / 2 );
		$icon_padding = round( (int) $font_size / 2 );

		// CSS to output.
		$css = '#' . $obj->id_base . '-' . $key . ' ul li a,
		#' . $obj->id_base . '-' . $key . ' ul li a:hover {
			background-color: ' . $instance['background_color'] . ';
			border-radius: ' . $instance['border_radius'] . 'px;
			color: ' . $instance['icon_color'] . ';
			border: ' . $instance['border_width'] . 'px ' . $instance['border_color'] . ' solid;
			font-size: ' . $font_size . 'px;
			padding: ' . $icon_padding . 'px;
		}
		
		#' . $obj->id_base . '-' . $key . ' ul li a:hover {
			background-color: ' . $instance['background_color_hover'] . ';
			border-color: ' . $instance['border_color_hover'] . ';
			color: ' . $instance['icon_color_hover'] . ';
		}';

		// Minify.
		$css = genesis_starter_minify_css( $css );

		// Output.
		printf( '<style type="text/css" media="screen">%s</style>', $css );

	endforeach;

}

add_action( 'init', 'genesis_starter_structural_wrap_hooks' );
/**
 * Add hooks immediately before and after Genesis structural wraps.
 *
 * @since   2.3.0
 *
 * @version 1.1.0
 * @author  Tim Jensen
 * @link    https://timjensen.us/add-hooks-before-genesis-structural-wraps
 *
 * @return void
 */
function genesis_starter_structural_wrap_hooks() {

	$wraps = get_theme_support( 'genesis-structural-wraps' );

	foreach ( $wraps[0] as $context ) {

		/**
		 * Inserts an action hook before the opening div and after the closing div
		 * for each of the structural wraps.
		 *
		 * @param string $output   HTML for opening or closing the structural wrap.
		 * @param string $original Either 'open' or 'close'.
		 *
		 * @return string
		 */
		add_filter( "genesis_structural_wrap-{$context}", function ( $output, $original ) use ( $context ) {

			$position = ( 'open' === $original ) ? 'before' : 'after';

			ob_start();

			do_action( "genesis_{$position}_{$context}_wrap" );

			if ( 'open' === $original ) {

				return ob_get_clean() . $output;

			} else {

				return $output . ob_get_clean();

			}

		}, 10, 2 );

	}

}

add_filter( 'genesis_markup_title-area_close', 'genesis_starter_after_title_area', 10, 2 );
/**
 * Appends HTML to the closing markup for .title-area.
 *
 * Adding something between the title + description and widget area used to require
 * re-building genesis_do_header(). However, since the title-area closing markup
 * now goes through genesis_markup(), it means we now have some extra filters
 * to play with. This function makes use of this and adds in an extra hook
 * after the title-area used for displaying the primary navigation menu.
 *
 * @since  0.1.0
 *
 * @param  string $close_html HTML tag being processed by the API.
 * @param  array  $args       Array with markup arguments.
 *
 * @return string
 */
function genesis_starter_after_title_area( $close_html, $args ) {

	if ( $close_html ) {

		ob_start();

		do_action( 'genesis_after_title_area' );

		$close_html = $close_html . ob_get_clean();

	}

	return $close_html;

}

add_filter( 'http_request_args', 'genesis_starter_dont_update_theme', 5, 2 );
/**
 * Don't Update Theme.
 *
 * If there is a theme in the repo with the same name,
 * this prevents WP from prompting an update.
 *
 * @since  2.0.0
 *
 * @param  array  $request Request arguments.
 * @param  string $url     Request url.
 *
 * @return array  request arguments
 */
function genesis_starter_dont_update_theme( $request, $url ) {

	 // Not a theme update request. Bail immediately.
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) ) {
		return $request;
	}

	$themes = unserialize( $request['body']['themes'] );

	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );

	$request['body']['themes'] = serialize( $themes );

	return $request;

}

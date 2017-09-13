<?php
/**
 * This file adds helper functions used in the Genesis Starter Theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.com/themes/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

add_filter( 'body_class', 'starter_fixed_header_class' );
/**
 * Add fixed header class.
 *
 * Checks if theme supports a fixed header and if so, adds a 'fixed-header'
 * class to the body. To enable a fixed header simply add theme support e.g:
 * `add_theme_support( 'fixed-header' );` 
 *
 * @param  array $classes Body classes.
 * @return array
 */
function starter_fixed_header_class( $classes ) {

	if ( current_theme_supports( 'fixed-header' ) ) {

		$classes[] = 'fixed-header';

	}

	return $classes;

}

add_filter( 'genesis_attr_title-area', 'starter_title_area_schema' );
/**
 * Add schema microdata to title-area.
 *
 * @since  2.3.0
 * @param  array $attr Array of attributes.
 * @return array
 */
function starter_title_area_schema( $attr ) {

	$attr['itemscope'] = 'itemscope';
	$attr['itemtype']  = 'http://schema.org/Organization';

	return $attr;

}

add_filter( 'genesis_attr_site-title', 'starter_site_title_schema' );
/**
 * Correct site title schema.
 *
 * @since  2.3.0
 * @param  array $attr Array of attributes.
 * @return array
 */
function starter_site_title_schema( $attr ) {

	$attr['itemprop'] = 'name';

	return $attr;
}

add_filter( 'theme_page_templates', 'starter_remove_templates' );
/**
 * Remove Page Templates.
 *
 * The Genesis Blog & Archive templates are not needed and can
 * create problems for users so it's safe to remove them. If
 * you need to use these templates, simply remove this function.
 *
 * @param  array $page_templates All page templates.
 * @return array Modified templates.
 */
function starter_remove_templates( $page_templates ) {

	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );

	return $page_templates;

}

add_action( 'genesis_admin_before_metaboxes', 'starter_remove_metaboxes' );
/**
 * Remove blog metabox.
 *
 * Also remove the Genesis blog settings metabox from the
 * Genesis admin settings screen as it is no longer required
 * if the Blog page template has been removed.
 *
 * @param string $hook The metabox hook.
 */
function starter_remove_metaboxes( $hook ) {

	remove_meta_box( 'genesis-theme-settings-blogpage', $hook, 'main' );

}

add_filter( 'excerpt_more', 'starter_read_more' );
add_filter( 'the_content_more_link', 'starter_read_more' );
add_filter( 'get_the_content_more_link', 'starter_read_more' );
/**
 * Accessible read more link.
 *
 * The below code modifies the default read more link when
 * using the WordPress More Tag to break a post on your site.
 * Instead of seeing 'Read more', screen readers will instead
 * see 'Read more about (entry title)'.
 *
 * @since  2.3.0
 *
 * @return string
 */
function starter_read_more() {

	return sprintf( '&hellip; <a href="%s" class="more-link">%s</a>',
		get_the_permalink(),
		genesis_a11y_more_link( __( 'Read more', 'business-pro' ) )
	);

}

/**
 * Sanitize RGBA values.
 *
 * If string does not start with 'rgba', then treat as hex then
 * sanitize the hex color and finally convert hex to rgba.
 *
 * @param  string $color The rgba color to sanitize.
 * @return string $color Sanitized value.
 */
function sanitize_rgba_color( $color ) {

	// Return invisible if empty.
	if ( empty( $color ) || is_array( $color ) ) {

		return 'rgba(0,0,0,0)';

	}

	// Return sanitized hex if not rgba value.
	if ( false === strpos( $color, 'rgba' ) ) {

		return sanitize_hex_color( $color );

	}

	// Finally, sanitize and return rgba.
	$color = str_replace( ' ', '', $color );
	sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

	return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';

}

/**
 * Minify CSS helper function.
 *
 * @author Gary Jones
 * @link   https://github.com/GaryJones/Simple-PHP-CSS-Minification
 * @param  string $css The CSS to minify.
 * @return string Minified CSS.
 */
function starter_minify_css( $css ) {

	// Normalize whitespace.
	$css = preg_replace( '/\s+/', ' ', $css );

	// Remove spaces before and after comment.
	$css = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css );

	// Remove comment blocks, everything between /* and */, unless preserved with /*! ... */ or /** ... */.
	$css = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $css );

	// Remove ; before }.
	$css = preg_replace( '/;(?=\s*})/', '', $css );

	// Remove space after , : ; { } */ >.
	$css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );

	// Remove space before , ; { } ( ) >.
	$css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );

	// Strips leading 0 on decimal values (converts 0.5px into .5px).
	$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );

	// Strips units if value is 0 (converts 0px to 0).
	$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );

	// Converts all zeros value into short-hand.
	$css = preg_replace( '/0 0 0 0/', '0', $css );

	// Shorten 6-character hex color codes to 3-character where possible.
	$css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );

	return trim( $css );

}

add_action( 'wp_head', 'starter_remove_ssi_inline_styles', 1 );
/**
 * Remove Simple Social Icons inline CSS.
 *
 * No longer needed because we are generating custom CSS instead,
 * removing this means that we don't need to use !important rules
 * in the above function.
 *
 * @return void
 */
function starter_remove_ssi_inline_styles() {

	global $wp_widget_factory;

	remove_action( 'wp_head', array( $wp_widget_factory->widgets['Simple_Social_Icons_Widget'], 'css' ) );

}

add_action( 'wp_head', 'starter_simple_social_icons_css' );
/**
 * Simple Social Icons multiple instances workaround.
 *
 * By default, Simple Social Icons only allows you to create one
 * style for your icons, even if you have multiple on one page.
 * This function allows us to output different styles for each
 * widget that is output on the front end.
 *
 * @return void
 */
function starter_simple_social_icons_css() {

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
		$css = starter_minify_css( $css );

		// Output.
		printf( '<style type="text/css" media="screen">%s</style>', $css );

	endforeach;

}

/**
 * Helper function to check if we're on a WooCommerce page.
 *
 * @link   https://docs.woocommerce.com/document/conditional-tags/.
 * @return bool
 */
function starter_is_woocommerce_page() {

	if ( ! class_exists( 'WooCommerce' ) ) {

		return false;

	}

	if ( is_woocommerce() || is_shop() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_checkout() || is_account_page() ) {

		return true;

	} else {

		return false;

	}

}

/**
 * Custom header image callback.
 *
 * Loads custom header or featured image depending on what is set.
 * If a featured image is set it will override the header image.
 *
 * @since 2.0.0
 *
 * @return void
 */
function starter_custom_header_callback() {

	$id = '';

	// Get the current page ID.
	if ( class_exists( 'WooCommerce' ) && is_shop() ) {

		$id = get_option( 'woocommerce_shop_page_id' );

	} elseif ( is_home() ) {

		$id = get_option( 'page_for_posts' );

	} elseif ( is_singular() ) {

		$id = get_the_id();

	}

	$url = get_the_post_thumbnail_url( $id );

	if ( ! $url ) {

		$url = get_header_image();

	}

	printf( '<style type="text/css">.page-header { background-image: url( "%1$s" ); }</style>', esc_url( $url ) );

}

add_filter( 'http_request_args', 'starter_dont_update_theme', 5, 2 );
/**
 * Don't Update Theme.
 *
 * If there is a theme in the repo with the same name,
 * this prevents WP from prompting an update.
 *
 * @param  array  $request Request arguments.
 * @param  string $url     Request url.
 *
 * @return array  request arguments
 */
function starter_dont_update_theme( $request, $url ) {

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

add_action( 'init', 'starter_structural_wrap_hooks' );
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
function starter_structural_wrap_hooks() {

	$wraps = get_theme_support( 'genesis-structural-wraps' );

	foreach ( $wraps[0] as $context ) {

		/**
		 * Inserts an action hook before the opening div and after the closing div
		 * for each of the structural wraps.
		 *
		 * @param string $output          HTML markup for opening or closing the structural wrap.
		 * @param string $original_output Either 'open' or 'close'.
		 *
		 * @return string
		 */
		add_filter( "genesis_structural_wrap-{$context}", function ( $output, $original_output ) use ( $context ) {

			$position = ( 'open' === $original_output ) ? 'before' : 'after';

			ob_start();

			do_action( "genesis_{$position}_{$context}_wrap" );

			if ( 'open' === $original_output ) {

				return ob_get_clean() . $output;

			} else {

				return $output . ob_get_clean();

			}

		}, 10, 2 );
	}
}

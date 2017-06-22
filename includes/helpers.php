<?php
/**
 * This file adds helper functions used in the Genesis Starter Theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/themes/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @see starter_customize_register()
 * @return void
 */
function starter_customize_partial_blogname() {
	bloginfo( 'name' );
}
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @see starter_customize_register()
 * @return void
 */
function starter_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Minify CSS helper function.
 *
 * A handy CSS minification script by Gary Jones that we'll use to
 * minify the CSS output by the customizer. This is called near the
 * end of the /includes/customizer-output.php file.
 *
 * @author Gary Jones
 * @link https://github.com/GaryJones/Simple-PHP-CSS-Minification
 * @param string $css The CSS to minify.
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

/**
 * Additional opening wrap.
 *
 * Used for entry-header, entry-content and entry-footer.
 * Genesis doesn't provide structural wraps for these elements
 * so we need to hook in and add the wrap div at the start.
 * This is a utility function that can be used anywhere to open
 * a wrap anywhere in your theme.
 */
function starter_wrap_open() {
	echo '<div class="wrap">';
}
add_action( 'genesis_header', 'starter_wrap_open', 6 );
add_action( 'genesis_content', 'starter_wrap_open', 6 );
add_action( 'genesis_footer', 'starter_wrap_open', 6 );
add_action( 'genesis_before_content_sidebar_wrap', 'starter_wrap_open', 6 );

/**
 * Additional closing wrap.
 *
 * The closing markup for the additional opening wrap divs,
 * simply closes the wrap divs that we created earlier. This
 * is a utility function that can be used anywhere to close
 * any kind of div, not just wraps.
 */
function starter_wrap_close() {
	echo '</div>';
}
add_action( 'genesis_header', 'starter_wrap_close', 13 );
add_action( 'genesis_content', 'starter_wrap_close', 13 );
add_action( 'genesis_footer', 'starter_wrap_close', 13 );
add_action( 'genesis_after_content_sidebar_wrap', 'starter_wrap_close', 13 );

/**
 * Accessible read more link.
 *
 * The below code modifies the default read more link when
 * using the WordPress More Tag to break a post on your site.
 * Instead of seeing 'Read more', screen readers will instead
 * see 'Read more about (entry title)'.
 */
function starter_read_more() {
	return sprintf( '&hellip; <a href="%s" class="more-link">%s</a>',
		get_the_permalink(),
		genesis_a11y_more_link( __( 'Read more', 'starter' ) )
	);
}
add_filter( 'excerpt_more', 'starter_read_more' );
add_filter( 'the_content_more_link', 'starter_read_more' );
add_filter( 'get_the_content_more_link', 'starter_read_more' );

/**
 * Add no-js class to body.
 *
 * Used for checking whether or not JavaScript is active so we can
 * style the navigation menus to suit the user. Also add an empty
 * `ontouchstart` attribute which emulates hover effects on mobile.
 *
 * @param  string $attr On touch start attribute.
 * @return string
 */
function starter_add_ontouchstart( $attr ) {
	$attr['class'] 		  .= ' no-js';
	$attr['ontouchstart']  = ' ';
	return $attr;
}
add_filter( 'genesis_attr_body', 'starter_add_ontouchstart' );

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
add_filter( 'theme_page_templates', 'starter_remove_templates' );

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
add_action( 'genesis_admin_before_metaboxes', 'starter_remove_metaboxes' );

/**
 * Front page template path.
 *
 * The following function adds a custom template path for the front
 * page template. This allows us to move the front-page.php
 * template to the /templates/ sub-folder. The point of this is to
 * keep all templates and template parts in one place.
 *
 * @param string $template The template path.
 */
function starter_custom_template( $template ) {
	if ( ! is_front_page() ) {
		return $template;
	}
	return get_stylesheet_directory() . '/templates/front-page.php';
}
add_filter( 'template_include', 'starter_custom_template', 99 );

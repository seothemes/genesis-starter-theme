<?php
/**
 * Genesis Starter Theme.
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-2.0-or-later
 */

namespace SeoThemes\GenesisStarterTheme\Functions;

\add_filter( 'body_class', __NAMESPACE__ . '\body_classes' );
/**
 * Add additional classes to the body element.
 *
 * @since  3.5.0
 *
 * @param  array $classes Body classes.
 *
 * @return array
 */
function body_classes( $classes ) {

	// Remove unnecessary page template classes.
	$template  = \get_page_template_slug();
	$basename  = \basename( $template, '.php' );
	$directory = \str_replace( [ '/', \basename( $template ) ], '', $template );
	$classes   = \array_diff(
		$classes,
		[
			'page-template',
			'page-template-' . $basename,
			'page-template-' . $directory,
			'page-template-' . $directory . $basename . '-php',
		]
	);

	// Add simple template name.
	if ( $basename ) {
		$classes[] = 'template-' . $basename;
	}

	// Add transparent header class.
	if ( \current_theme_supports( 'transparent-header' ) ) {
		$classes[] = 'transparent-header';
	}

	// Add sticky header class.
	if ( \current_theme_supports( 'sticky-header' ) ) {
		$classes[] = 'sticky-header';
	}

	// Add single type class.
	if ( is_type_single() ) {
		$classes[] = 'is-single';
	}

	// Add archive type class.
	if ( is_type_archive() ) {
		$classes[] = 'is-archive';
	}

	// Add no hero section class.
	$classes[] = 'no-hero-section';

	return $classes;
}

\add_action( 'genesis_before', __NAMESPACE__ . '\narrow_content' );
/**
 * Remove sidebars on narrow content layout.
 *
 * @since 3.5.0
 *
 * @return void
 */
function narrow_content() {
	if ( 'narrow-content' === \genesis_site_layout() ) {
		\add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
	}
}

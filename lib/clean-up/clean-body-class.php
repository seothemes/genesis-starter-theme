<?php
/**
 * Retrieve the classes for the body element as an array.
 *
 * @since 1.5.0
 * @global WP_Query $wp_query
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
function starter_body_class( $class = '' ) {
	global $wp_query;

	$classes = array();

	if ( is_rtl() )
		$classes[] = 'rtl';

	if ( is_front_page() )
		$classes[] = 'home';

	if ( is_home() )
		$classes[] = 'blog';

	if ( is_single() )
		$classes[] = 'single';

	if ( is_archive() )
		$classes[] = 'archive';

	if ( is_date() )
		$classes[] = 'date';

	if ( is_search() ) {
		$classes[] = 'search';
	}
	if ( is_paged() )
		$classes[] = 'paged';

	if ( is_attachment() )
		$classes[] = 'attachment';

	if ( is_404() )
		$classes[] = 'error404';

	if ( is_user_logged_in() )
		$classes[] = 'logged-in';

	if ( is_admin_bar_showing() ) {
		$classes[] = 'admin-bar';
		$classes[] = 'no-customize-support';
	}

	if ( has_custom_logo() ) {
		$classes[] = 'wp-custom-logo';
	}

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) )
			$class = preg_split( '#\s+#', $class );
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS body classes for the current post or page.
	 *
	 * @since 2.8.0
	 *
	 * @param array $classes An array of body classes.
	 * @param array $class   An array of additional classes added to the body.
	 */
	$classes = apply_filters( 'body_class', $classes, $class );

	// List of unwanted classes.
	$blacklist = array(
		'wp-featherlight-captions',
		'custom-header',
		'header-image',
	);

	// Remove blacklisted classes from array.
	$classes = array_diff( $classes, $blacklist );

	return array_unique( $classes );
}

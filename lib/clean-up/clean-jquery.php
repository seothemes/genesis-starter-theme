<?php
/**
 * This file loads jQuery from jQuery's CDN with a local fallback.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 * @since 1.5.0
 */

/**
 * Load jQuery from jQuery's CDN with a local fallback.
 *
 * @since 1.5.0
 */
function starter_register_jquery() {
	$jquery_version = wp_scripts()->registered['jquery']->ver;
	wp_deregister_script( 'jquery' );
	wp_register_script(
		'jquery',
		'https://code.jquery.com/jquery-' . $jquery_version . '.min.js',
		[],
		null,
		true
	);
	add_filter( 'wp_resource_hints', function ( $urls, $relation_type ) {
		if ( 'dns-prefetch' === $relation_type ) {
			$urls[] = 'code.jquery.com';
		}
		return $urls;
	}, 10, 2);
	add_filter( 'script_loader_src', 'starter_jquery_local_fallback', 10, 2 );
}
add_action( 'wp_enqueue_scripts', 'starter_register_jquery', 100 );

/**
 * Output the local fallback immediately after jQuery's <script>
 *
 * @since 1.5.0
 * @link http://wordpress.stackexchange.com/a/12450
 * @param string $src jQUery source.
 * @param string $handle Theme handle.
 */
function starter_jquery_local_fallback( $src, $handle = null ) {
	static $add_jquery_fallback = false;
	if ( $add_jquery_fallback ) {
		echo '<script>(window.jQuery && jQuery.noConflict()) || document.write(\'<script src="' . $add_jquery_fallback . '"><\/script>\')</script>' . "\n";
		$add_jquery_fallback = false;
	}
	if ( 'jquery' === $handle ) {
		$add_jquery_fallback = apply_filters( 'script_loader_src', \includes_url( '/js/jquery/jquery.js' ), 'jquery-fallback' );
	}
	return $src;
}
add_action( 'wp_head', 'starter_jquery_local_fallback' );

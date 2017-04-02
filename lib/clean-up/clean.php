<?php
/**
 * This file loads all of the clean-up functions.
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

// Clean up WordPress.
include_once( get_stylesheet_directory() . '/lib/clean-up/clean-body-class.php' );

// Clean up WordPress.
include_once( get_stylesheet_directory() . '/lib/clean-up/clean-wordpress.php' );

// Clean up jQuery.
include_once( get_stylesheet_directory() . '/lib/clean-up/clean-jquery.php' );

// Clean up Genesis.
include_once( get_stylesheet_directory() . '/lib/clean-up/clean-genesis.php' );

// Clean up Gallery.
include_once( get_stylesheet_directory() . '/lib/clean-up/clean-gallery.php' );

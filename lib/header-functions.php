<?php
/**
 * Genesis Starter.
 *
 * This file adds header functions used in the Genesis Starter Theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

/**
 * Opening header wrap markup.
 *
 * This also outputs the before-header widget area
 * inside the site-header, outside of the wrap.
 *
 * @since 1.5.0
 */
function starter_header_wrap_open() {

	genesis_widget_area( 'before-header', array(
	    'before' => '<div class="before-header"><div class="wrap">',
	    'after' => '</div></div>',
	) );

	echo '<div class="wrap">';
}
add_action( 'genesis_header', 'starter_header_wrap_open', 6 );

/**
 * Closing header wrap markup.
 *
 * @since 1.5.0
 */
function starter_header_wrap_close() {
	echo '</div>';
}
add_action( 'genesis_header', 'starter_header_wrap_close', 14 );

/**
 * Display the custom logo if one is set.
 */
function starter_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
add_action( 'genesis_site_title', 'starter_custom_logo', 0 );

/**
 * Custom header image callback.
 *
 * Loads image or video depending on what is set.
 * If a featured image is set it will override the
 * header image. If a video is set it will be used
 * on the home page only.
 *
 * @since 1.5.0
 */
function starter_custom_header() {

	/**
	 * Get the correct image or video.
	 *
	 * This requires that the hero section is available
	 * because it is added to the `genesis_hero` hook.
	 *
	 * @since 1.5.0
	 */
	function starter_hero_image_video() {

		if ( get_the_post_thumbnail_url() ) {

			if ( class_exists( 'WooCommerce' ) && is_shop() ) {

				// Get the shop page featured image instead of product.
				$image = genesis_get_image( array(
					'post_id'  => get_option( 'woocommerce_shop_page_id' ),
				) );

				// If no featured image use the header image.
				if ( ! $image ) {
					$image = get_header_image_tag();
				}

			} elseif ( is_home() ) {

				// Get the blog page featured image instead of product.
				$image = genesis_get_image( array(
					'post_id'  => get_option( 'page_for_posts' ),
				) );

				// If no featured image use the header image.
				if ( ! $image ) {
					$image = get_header_image_tag();
				}

			} elseif ( is_archive() || is_category() || is_tag() || is_tax() || is_home() ) {

				// Don't get archive featured images (because it uses the first post image).
				$image = get_header_image_tag();

			} else {

				// Get the featured image.
				$image = genesis_get_image();

			}
		} elseif ( has_header_image() ) {

			// If no featured image use the header image.
			$image = get_header_image_tag();

		}

		if ( is_front_page() && has_header_video() ) {

			// Don't display an image.
			$image = null;

			// Display the video instead.
			the_custom_header_markup();

		} elseif ( $image ) {

			// Wrap output in .wp-custom-header for consistency.
			echo '<div class="wp-custom-header">' . $image . '</div>';

		}

	}
	add_action( 'genesis_hero', 'starter_hero_image_video', 13 );
}

<?php
/**
 * This file integrates the theme with WooCommerce.
 *
 * @package	 Architect Pro
 * @link		 https://seothemes.net/architect-pro
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// Add WooCommerce support for Genesis layouts (sidebar, full-width, etc).
add_post_type_support( 'product', array( 'genesis-layouts', 'genesis-seo' ) );

// Unhook WooCommerce Sidebar - use Genesis Sidebars instead.
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Unhook WooCommerce wrappers.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Hook new functions with Genesis wrappers.
add_action( 'woocommerce_before_main_content', 'starter_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'starter_wrapper_end', 10 );

/**
 * Add opening wrapper before WooCommerce loop.
 */
function starter_wrapper_start() {

	do_action( 'genesis_before_content_sidebar_wrap' );
	genesis_markup( array(
		'html5' => '<div %s>',
		'xhtml' => '<div id="content-sidebar-wrap">',
		'context' => 'content-sidebar-wrap',
	) );

	do_action( 'genesis_before_content' );
	genesis_markup( array(
		'html5' => '<main %s>',
		'xhtml' => '<div id="content" class="hfeed">',
		'context' => 'content',
	) );
	do_action( 'genesis_before_loop' );

}

/**
 * Add opening wrapper before WooCommerce loop.
 */
function starter_wrapper_end() {

	do_action( 'genesis_after_loop' );
	genesis_markup( array(
		'html5' => '</main>', // end .content.
		'xhtml' => '</div>', // end #content.
	) );
	do_action( 'genesis_after_content' );

	echo '</div>'; // end .content-sidebar-wrap or #content-sidebar-wrap.
	do_action( 'genesis_after_content_sidebar_wrap' );

}

/**
 * Optimize WooCommerce Scripts.
 *
 * Remove WooCommerce Generator tag, styles,
 * and scripts from non WooCommerce pages.
 */
function starter_woocommerce_styles() {

	// First check that woo exists to prevent fatal errors.
	if ( class_exists( 'WooCommerce' ) ) {

		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_dequeue_style( 'woocommerce-general' );
			wp_dequeue_style( 'woocommerce-layout' );
			wp_dequeue_style( 'woocommerce-smallscreen' );
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-cart' );
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' );
			wp_dequeue_script( 'fancybox' );
			wp_dequeue_script( 'jqueryui' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'starter_woocommerce_styles', 99 );

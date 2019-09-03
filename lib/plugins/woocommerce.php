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

namespace SeoThemes\GenesisStarterTheme\Plugins;

use function SeoThemes\GenesisStarterTheme\Functions\get_theme_url;
use function SeoThemes\GenesisStarterTheme\Functions\has_hero_section;

// Disable all stylesheets.
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Unhook WooCommerce sidebar - use Genesis sidebars instead.
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Remove WooCommerce pagination.
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination' );

// Unhook WooCommerce wrappers.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_filter( 'genesis_site_layout', __NAMESPACE__ . '\shop_page_layout' );
/**
 * Get correct layout for shop page.
 *
 * @since 3.5.0
 *
 * @param string $layout Current page layout.
 *
 * @return string
 */
function shop_page_layout( $layout ) {
	if ( is_shop() ) {
		$shop   = get_option( 'woocommerce_shop_page_id' );
		$layout = genesis_get_custom_field( '_genesis_layout', $shop );
	}

	return $layout;
}

add_action( 'woocommerce_before_main_content', __NAMESPACE__ . '\woo_wrapper_start', 10 );
/**
 * Outputs opening WooCommerce wrapper markup.
 *
 * @since 3.5.0
 *
 * @return void
 */
function woo_wrapper_start() {
	do_action( 'genesis_before_content_sidebar_wrap' );

	genesis_markup(
		[
			'html5'   => '<div %s>',
			'xhtml'   => '<div id="content-sidebar-wrap">',
			'context' => 'content-sidebar-wrap',
		]
	);

	do_action( 'genesis_before_content' );

	genesis_markup(
		[
			'html5'   => '<main %s>',
			'context' => 'content',
		]
	);

	do_action( 'genesis_before_loop' );
}

add_action( 'woocommerce_after_main_content', __NAMESPACE__ . '\woo_wrapper_end', 10 );
/**
 * Outputs closing WooCommerce wrapper markup.
 *
 * @since 3.5.0
 *
 * @return void
 */
function woo_wrapper_end() {
	do_action( 'genesis_after_loop' );

	genesis_markup(
		[
			'close'   => '</main>',
			'context' => 'content',
		]
	);

	do_action( 'genesis_after_content' );

	echo '</div>';

	do_action( 'genesis_after_content_sidebar_wrap' );
}

// Remove all header output.
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_filter( 'woocommerce_show_page_title', __NAMESPACE__ . '\shop_page_header' );
/**
 * Reposition shop page header elements.
 *
 * @since 3.5.0
 *
 * @return bool
 */
function shop_page_header() {
	woocommerce_breadcrumb();
	woocommerce_output_all_notices();

	if ( ! has_hero_section() ) {
		woocommerce_result_count();
	}

	woocommerce_catalog_ordering();

	return true;
}

// Reposition add to cart button.
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 15 );

add_action( 'woocommerce_before_shop_loop_item_title', __NAMESPACE__ . '\product_inner_wrap_open' );
/**
 * Add opening product inner wrapper markup.
 *
 * @since 3.5.0
 *
 * @return void
 */
function product_inner_wrap_open() {
	echo '</a><div class="product-inner">';
}

add_action( 'woocommerce_after_shop_loop_item_title', __NAMESPACE__ . '\product_inner_wrap_close', 20 );
/**
 * Add closing product inner wrapper markup.
 *
 * @since 3.5.0
 *
 * @return void
 */
function product_inner_wrap_close() {
	echo '</div>';
}

add_filter( 'woocommerce_cart_item_thumbnail', __NAMESPACE__ . '\cart_page_thumbnail', 10, 2 );
/**
 * Change thumbnail size on cart page.
 *
 * @since 3.5.0
 *
 * @param array $product   Current product item.
 * @param array $cart_item Cart item object.
 *
 * @return string
 */
function cart_page_thumbnail( $product, $cart_item ) {
	return $cart_item['data']->get_image( 'thumbnail' );
}

add_filter( 'woocommerce_review_gravatar_size', __NAMESPACE__ . '\woocommerce_gravatar_size' );
/**
 * Change WooCommerce review gravatar size
 *
 * @since 3.5.0
 *
 * @return int
 */
function woocommerce_gravatar_size() {
	return genesis_get_config( 'genesis-settings' )['avatar_size'];
}

add_filter( 'woocommerce_paypal_icon', __NAMESPACE__ . '\woo_paypal_icon' );
/**
 * Change the default PayPal icon.
 *
 * @since 3.5.0
 *
 * @return string
 */
function woo_paypal_icon() {
	return get_theme_url() . 'assets/img/paypal.png';
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\remove_stripe_styles', 15 );
/**
 * Remove default Stripe add-on CSS.
 *
 * @since 3.5.0
 *
 * @return void
 */
function remove_stripe_styles() {
	wp_dequeue_style( 'stripe_styles' );
}

add_filter( 'woocommerce_output_related_products_args', __NAMESPACE__ . '\related_products_args', 20 );
/**
 * Reduce related products to 3 columns.
 *
 * @since 3.5.0
 *
 * @param array $args Related product args.
 *
 * @return array
 */
function related_products_args( $args ) {
	$args['posts_per_page'] = 3;
	$args['columns']        = 3;

	return $args;
}

<?php
/**
 * This file integrates the theme with WooCommerce.
 *
 * @package	  Genesis Starter
 * @link	  https://seothemes.net/themes/genesis-starter
 * @author    Seo Themes
 * @copyright Copyright © 2017 Seo Themes
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

// Enable theme support for WooCommerce.
add_theme_support( 'woocommerce' );

// Remove unwanted WooCommerce features.
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// Add sale flash back in custom position.
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// Enable Genesis custom post type features.
add_post_type_support( 'product', array(
	'genesis-layouts',
	'genesis-seo',
	'genesis-cpt-archives-settings',
) );

/**
 * Change number of products per row to 3.
 *
 * @return int Default 3 columns.
 */
function starter_loop_columns() {

	if ( 'full-width-content' !== genesis_site_layout() ) {
		return 3;
	}
	return 4;
}
add_filter( 'loop_shop_columns', 'starter_loop_columns' );

/**
 * Remove Genesis post layouts metabox if editing the
 * shop page to avoid confusion. Archive layout is set in
 * Products > Archive Settings > Layout Settings.
 *
 * @return void Return early if WooCommerce is not active.
 */
function starter_remove_shop_layouts() {

	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	// Get the current post id.
	if ( ! empty( $_GET['post'] ) ) {
		$page_id = intval( $_GET['post'] );
	} else {
		$page_id = null;
	}

	// Get the shop page id.
	$shop_id = intval( get_option( 'woocommerce_shop_page_id' ) );

	// Check if current page is shop.
	if ( $page_id === $shop_id ) {
		remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );
		remove_action( 'admin_menu', 'genesis_add_inpost_layout_box' );
		remove_action( 'admin_menu', 'genesis_add_inpost_scripts_box' );
		add_action( 'edit_form_top', 'starter_shop_layout_settings' );
	}
}
add_action( 'admin_menu', 'starter_remove_shop_layouts', 0 );

/**
 * Add notice for changing shop layout.
 */
function starter_shop_layout_settings() {

	$admin_url = admin_url( 'edit.php?post_type=product&page=genesis-cpt-archive-product' );
	?>
	<div class="notice notice-info">
		<p>
		<?php esc_attr_e( 'The layout &amp; SEO settings for this page can be changed from the ', 'starter' ); ?>
			<a href="<?php echo esc_url( $admin_url ); ?>">
			<?php esc_attr_e( 'Archive Settings', 'starter' ); ?>
			</a>
		</p>
	</div>
	<?php
}

/**
 * Add opening wrapper before WooCommerce loop.
 */
function starter_wrapper_start() {

	do_action( 'genesis_before_content_sidebar_wrap' );

	do_action( 'genesis_before_content' );
	genesis_markup( array(
		'html5' => '<main %s>',
		'xhtml' => '<div id="content" class="hfeed">',
		'context' => 'content',
	) );
	do_action( 'genesis_before_loop' );

}
add_action( 'woocommerce_before_main_content', 'starter_wrapper_start', 10 );

/**
 * Add opening wrapper before WooCommerce loop.
 */
function starter_wrapper_end() {

	do_action( 'genesis_after_loop' );
	genesis_markup( array(
		'html5' => '</main>',
		'xhtml' => '</div>',
	) );
	do_action( 'genesis_after_content' );
	do_action( 'genesis_after_content_sidebar_wrap' );

}
add_action( 'woocommerce_after_main_content', 'starter_wrapper_end', 10 );

/**
 * Remove unwanted output on WooCommerce pages.
 */
function starter_remove_shop_title() {

	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	if ( is_archive() && is_woocommerce() || is_woocommerce() ) {

		// Remove archive title on shop pages.
		remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
		remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );

		// Remove primary sidebar on shop pages.
		remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
	}
}
add_action( 'genesis_before', 'starter_remove_shop_title' );

/**
 * Add WooCommerce cart to header right.
 * 
 * To use add the following to functions.php:
 * `add_action( 'genesis_header', 'starter_nav_cart', 13 );`
 */
function starter_nav_cart() {
	$cart_url   = WC()->cart->get_cart_url();
	$cart_total = WC()->cart->get_cart_total();
	$cart_items = WC()->cart->cart_contents_count;
	printf( '<a href="%s"title="View your shopping cart" class="fa fa-shopping-cart"><span class="cart-count">%s</span><b class="cart-total">%s</b></a>', esc_url( $cart_url ), esc_html( $cart_items ), intval( $cart_total ) );
}

/**
 * Customize search form for WooCommerce products.
 *
 * To use add the following to functions.php:
 * `add_filter( 'genesis_search_form', 'starter_product_search', 10, 4 );`
 *
 * @param string $form        Form html.
 * @param string $search_text Placeholder text.
 * @param string $button_text Button text.
 * @param string $label       Label text.
 */
function starter_product_search( $form, $search_text, $button_text, $label ) {

	if ( ! class_exists( 'WooCommerce' ) ) {
		return $form;
	}

	$form = '<form class="search-form" itemprop="potentialAction" itemscope="" itemtype="https://schema.org/SearchAction" role="search" method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '">
			<meta itemprop="target" content="' . esc_url( home_url( '/' ) ) . '?post_type=product">
			<input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search products...', 'woocommerce' ) . '" />
			<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search', 'woocommerce' ) . '" />
			<input type="hidden" name="post_type" value="product" />
		</form>';

	return $form;
}

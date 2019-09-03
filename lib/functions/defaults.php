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

add_action( 'after_switch_theme', __NAMESPACE__ . '\default_theme_settings' );
/**
 * Set default theme settings on theme activation.
 *
 * @since 3.5.0
 *
 * @return void
 */
function default_theme_settings() {
	$settings = \genesis_get_config( 'genesis-settings' );

	\genesis_update_settings( $settings );
	\update_option( 'posts_per_page', $settings['blog_cat_num'] );
}

add_filter( 'simple_social_default_styles', __NAMESPACE__ . '\default_social_styles' );
/**
 * Set Simple Social Icon defaults.
 *
 * @since 3.5.0
 *
 * @param array $defaults Social style defaults.
 *
 * @return array Modified social style defaults.
 */
function default_social_styles( $defaults ) {
	$args = \genesis_get_config( 'simple-social-icons' );

	return \wp_parse_args( $args, $defaults );
}

add_filter( 'syntax_highlighting_code_block_style', __NAMESPACE__ . '\set_syntax_color' );
/**
 * Set syntax color for code block.
 *
 * @since 3.5.0
 *
 * @return string
 */
function set_syntax_color() {
	return 'github';
}

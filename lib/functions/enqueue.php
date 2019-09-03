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

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Register and enqueue all scripts and styles.
 *
 * @since 3.5.0
 *
 * @return void
 */
function enqueue_assets() {
	$assets = \genesis_get_config( 'scripts-and-styles' );

	foreach ( $assets as $asset ) {
		$type      = false !== strpos( $asset['src'], '.js' ) ? 'script' : 'style';
		$handle    = $asset['handle'];
		$src       = isset( $asset['src'] ) ? $asset['src'] : '';
		$deps      = isset( $asset['deps'] ) ? $asset['deps'] : [];
		$ver       = isset( $asset['ver'] ) ? $asset['ver'] : \genesis_get_theme_version();
		$media     = isset( $asset['media'] ) ? $asset['media'] : 'all';
		$in_footer = isset( $asset['in_footer'] ) ? $asset['in_footer'] : true;
		$editor    = isset( $asset['editor'] ) ? $asset['editor'] : false;
		$condition = isset( $asset['condition'] ) ? $asset['condition'] : '__return_true';
		$localize  = isset( $asset['localize'] ) ? $asset['localize'] : [];
		$last_arg  = 'style' === $type ? $media : $in_footer;
		$register  = "wp_register_$type";
		$enqueue   = "wp_enqueue_$type";

		if ( is_admin() && $editor || ! is_admin() && ! $editor || 'both' === $editor ) {
			if ( is_callable( $condition ) && $condition() ) {
				$register( $handle, $src, $deps, $ver, $last_arg );
				$enqueue( $handle );

				if ( ! empty( $localize ) ) {
					wp_localize_script( $handle, $localize['name'], $localize['data'] );
				}
			}
		}
	}
}

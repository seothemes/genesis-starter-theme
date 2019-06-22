<?php
/**
 * Genesis Starter Theme
 *
 * WARNING: This file should never be modified under any circumstances.
 * Customizations should be made in the form of a core-functionality
 * plugin so that the theme can be updated without losing changes.
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\GenesisStarterTheme;

add_action( 'genesis_before', __NAMESPACE__ . '\center_content' );
/**
 * Remove sidebars on center content layout.
 *
 * @since 3.4.0
 *
 * @return void
 */
function center_content() {
	if ( 'center-content' === genesis_site_layout() ) {
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
	}
}

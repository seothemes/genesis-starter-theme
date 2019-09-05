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

namespace SeoThemes\GenesisStarterTheme\Structure;

// Reposition featured image.
\remove_action( 'genesis_entry_content', 'genesis_do_singular_image', 8 );
\add_action( 'genesis_entry_header', 'genesis_do_singular_image' );

\add_action( 'after_setup_theme', __NAMESPACE__ . '\disable_edit_post_link' );
/**
 * Disables the post edit link.
 *
 * @since 3.5.0
 *
 * @return void
 */
function disable_edit_post_link() {
	\add_filter( 'edit_post_link', '__return_empty_string' );
}

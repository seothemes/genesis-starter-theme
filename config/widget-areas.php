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

namespace SeoThemes\GenesisStarterTheme;

$front_page_widgets = [];
$theme_supports     = genesis_get_config( 'theme-support' )['add'];

for ( $i = 1; $i <= $theme_supports['front-page-widgets']; $i++ ) {
	$front_page_widgets[] = [
		'id'          => 'front-page-' . $i,
		'name'        => __( 'Front Page ', 'genesis-starter-theme' ) . $i,
		/* translators: The front page widget area number. */
		'description' => sprintf( __( 'The Front Page %s widget area.', 'genesis-starter-theme' ), $i ),
	];
}

return [
	'add'    => array_merge_recursive(
		[
			[
				'id'          => 'before-header',
				'name'        => __( 'Before Header', 'genesis-starter-theme' ),
				'description' => __( 'The Before Header widget area.', 'genesis-starter-theme' ),
			],
			[
				'id'          => 'before-footer',
				'name'        => __( 'Before Footer', 'genesis-starter-theme' ),
				'description' => __( 'The Before Footer widget area.', 'genesis-starter-theme' ),
			],
		],
		$front_page_widgets
	),
	'remove' => [
		'sidebar-alt',
	],
];

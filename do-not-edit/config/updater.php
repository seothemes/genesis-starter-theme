<?php

namespace SeoThemes\GenesisStarterTheme;

return [
	'skip'       => [
		'.git',
		'do-not-edit',
		'node_modules',
	],
	'delete'     => false,
	'exclusions' => [
		'.git',
		'do-not-edit',
		'node_modules',
	],
	'strings'    => [
		'backup_failed' => __( 'Could not create backup.', 'genesis-starter-theme' ),
		'notice_text'   => __( 'Please activate your theme license key to enable automatic updates.', 'genesis-starter-theme' ),
		'notice_link'   => __( 'License Settings →', 'genesis-starter-theme' ),
	],
	'puc'        => [
		'repo'   => 'https://github.com/seothemes/genesis-starter-theme/',
		'file'   => get_stylesheet_directory(),
		'theme'  => get_stylesheet(),
		'token'  => '',
		'branch' => 'master',
	],
	'edd'        => [
		'remote_api_url' => 'https://seothemes.com/',
		'item_name'      => 'Genesis Starter',
		'theme_slug'     => get_stylesheet(),
		'version'        => wp_get_theme()->get( 'Version' ),
		'author'         => 'SEO Themes',
		'download_id'    => '',
		'renew_url'      => '',
	],
];

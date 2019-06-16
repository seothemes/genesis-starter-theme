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
		'Gulpfile.js',
		'stylelint.config.js',
		'composer.json',
		'package-lock.json',
		'package.json',
		'CHANGELOG.md',
		'README.md',
		'phpcs.xml',
	],
	'puc'        => [
		'repo'   => 'https://github.com/seothemes/genesis-starter-theme/',
		'file'   => get_stylesheet_directory(),
		'theme'  => 'genesis-starter-theme',
		'token'  => '',
		'branch' => 'master',
	],
	'edd'        => [
		'remote_api_url'   => 'https://seothemes.com/',
		'item_name'        => 'Genesis Starter',
		'theme_slug'       => 'genesis-starter-theme',
		'version'          => '1.0.0',
		'author'           => 'SEO Themes',
		'download_id'      => '',
		'renew_url'        => '',
		'notice_text'      => __( 'Please activate your theme license key to enable automatic updates.', 'genesis-starter-theme' ),
		'notice_link_text' => __( 'License Settings →', 'genesis-starter-theme' ),
	],
];

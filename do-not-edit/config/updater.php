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
		'.csscomb.json',
		'.editorconfig',
		'.git',
		'.gitattributes',
		'.gitignore',
		'.jsbeautifyrc',
		'.jshintrc',
		'.stylelintignore',
		'CHANGELOG.md',
		'Gulpfile.js',
		'README.md',
		'composer.json',
		'do-not-edit',
		'package.json',
		'phpcs.xml',
		'stylelint.config.js',
		'yarn-error.log',
		'yarn.lock',
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

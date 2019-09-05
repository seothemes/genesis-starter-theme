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

if ( version_compare( phpversion(), '5.6.0', '<' ) ) {

	// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error
	trigger_error( 'Unit Tests require PHP 5.6 or higher.', E_USER_ERROR );
}

define( 'CHILD_THEME_TESTS_DIR', __DIR__ );
define( 'CHILD_THEME_ROOT_DIR', dirname( dirname( dirname( __DIR__ ) ) ) . DIRECTORY_SEPARATOR );
define( 'CHILD_THEME_LIB_DIR', CHILD_THEME_ROOT_DIR . 'lib' . DIRECTORY_SEPARATOR );
define( 'CHILD_THEME_VENDOR_DIR', CHILD_THEME_ROOT_DIR . 'vendor' . DIRECTORY_SEPARATOR );

if ( ! defined( 'ABSPATH' ) ) {

	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedConstantFound
	define( 'ABSPATH', dirname( dirname( dirname( CHILD_THEME_ROOT_DIR ) ) ) . '/' );
}

if ( ! file_exists( CHILD_THEME_VENDOR_DIR . 'autoload.php' ) ) {

	// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error
	trigger_error( 'Whoops, we need Composer before we start running tests.  Please type: `composer install`.  When done, try running `phpunit` again.', E_USER_ERROR );
}

require_once CHILD_THEME_VENDOR_DIR . 'autoload.php';
require_once CHILD_THEME_TESTS_DIR . '/class-test-case.php';

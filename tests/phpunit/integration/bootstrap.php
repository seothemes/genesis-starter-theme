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

if ( ! file_exists( '../../../wp-content' ) ) {
	trigger_error( 'Unable to run the integration tests, as the wp-content folder does not exist.', E_USER_ERROR );  // @codingStandardsIgnoreLine.
}

define( 'CHILD_THEME_TESTS_DIR', __DIR__ );
define( 'CHILD_THEME_ROOT_DIR', dirname( dirname( dirname( __DIR__ ) ) ) . DIRECTORY_SEPARATOR );
define( 'CHILD_THEME_LIB_DIR', CHILD_THEME_ROOT_DIR . 'lib' . DIRECTORY_SEPARATOR );
define( 'CHILD_THEME_VENDOR_DIR', CHILD_THEME_ROOT_DIR . 'vendor' . DIRECTORY_SEPARATOR );
define( 'WP_CONTENT_DIR', dirname( dirname( dirname( getcwd() ) ) ) . '/wp-content/' );

if ( ! defined( 'WP_PLUGIN_DIR' ) ) {
	define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . 'plugins/' ); // @codingStandardsIgnoreLine.
}

require_once CHILD_THEME_VENDOR_DIR . 'autoload.php';

require_once getenv( 'WP_PHPUNIT__DIR' ) . '/includes/functions.php';

// Test set up, plugin activation, etc.
tests_add_filter(
	'setup_theme',
	function () {
		register_theme_directory( WP_CONTENT_DIR . 'themes' );
		switch_theme( basename( CHILD_THEME_ROOT_DIR ) );
	}
);

// Start up the WP testing environment.
require getenv( 'WP_PHPUNIT__DIR' ) . '/includes/bootstrap.php';

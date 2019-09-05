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

namespace SeoThemes\GenesisStarterTheme\Tests\Unit;

use Brain\Monkey\Functions;
use function SeoThemes\GenesisStarterTheme\Functions\get_theme_url;
use function SeoThemes\GenesisStarterTheme\Functions\get_theme_dir;

/**
 * Class Tests_SampleTest
 *
 * @package KnowTheCode\StarterPlugin\Tests\PHP\Unit
 */
class Helpers extends Test_Case {

	/**
	 * Setup test case.
	 *
	 * @since 3.5.0
	 *
	 * @return void
	 */
	protected function setUp() {
		parent::setUp();

		require_once CHILD_THEME_LIB_DIR . 'functions/helpers.php';
	}

	/**
	 * Test get_theme_dir function.
	 *
	 * @since 3.5.0
	 *
	 * @return void
	 */
	public function test_get_theme_dir() {
		Functions\when( 'get_stylesheet_directory' )->justReturn( CHILD_THEME_ROOT_DIR );

		$this->assertSame( get_theme_dir(), \get_stylesheet_directory() );
		$this->assertStringEndsWith( DIRECTORY_SEPARATOR, get_theme_dir() );
	}

	/**
	 * Test get_theme_url function.
	 *
	 * @since 3.5.0
	 *
	 * @return void
	 */
	public function test_get_theme_url() {
		Functions\when( 'get_stylesheet_directory_uri' )->justReturn( 'https://example.com/wp-content/themes/genesis-starter-theme/' );

		$this->assertSame( get_theme_url(), \get_stylesheet_directory_uri() );
		$this->assertStringEndsWith( DIRECTORY_SEPARATOR, get_theme_url() );
	}
}

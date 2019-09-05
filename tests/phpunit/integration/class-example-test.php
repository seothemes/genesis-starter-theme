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

namespace SeoThemes\GenesisStarterTheme\Tests\Integration;

/**
 * Class Example_Test
 *
 * @package SeoThemes\GenesisStarterTheme\Tests\Integration
 */
class Example_Test extends \WP_UnitTestCase {

	/**
	 * Description of expected behavior.
	 *
	 * @since 3.5.0
	 *
	 * @return void
	 */
	public function test_it_works() {
		$this->assertTrue( \function_exists( 'do_action' ) );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 3.5.0
	 *
	 * @return void
	 */
	public function test_wp_phpunit_is_loaded_via_composer() {
		$this->assertContains(
			'vendor',
			getenv( 'WP_PHPUNIT__DIR' )
		);
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 3.5.0
	 *
	 * @return void
	 */
	public function test_true_is_true() {
		$this->assertTrue( true );
		$this->assertFalse( false );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 3.5.0
	 *
	 * @return void
	 */
	public function test_if_genesis_is_active() {
		$this->assertTrue( \function_exists( 'genesis' ) );
	}
}

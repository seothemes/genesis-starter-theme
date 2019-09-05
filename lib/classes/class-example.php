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

namespace SeoThemes\GenesisStarterTheme\Classes;

/**
 * Example Class.
 *
 * This is an example class to demonstrate the class autoloader. Autoloading classes
 * saves you from having `require` calls throughout your theme. To test that this
 * class is loading correctly, place the following in your functions.php file:
 *
 * ```
 * $example = new \SeoThemes\GenesisStarterTheme\Classes\Example();
 * $example->print_name();
 * ```
 *
 * If you have added additional classes to the `lib/classes` directory, you will need
 * to run the `composer dump --no-dev` command from the terminal to regenerate the
 * Composer autoloader files so that your new classes are loaded automatically.
 *
 * @package SeoThemes\GenesisStarterTheme\Classes
 */
class Example {

	/**
	 * Example property.
	 *
	 * @var string
	 */
	private $name;

	/**
	 * Example constructor.
	 *
	 * @since 3.5.0
	 *
	 * @return void
	 */
	public function __construct() {
		$this->name = __CLASS__;
	}

	/**
	 * Example method.
	 *
	 * @since 3.5.0
	 *
	 * @return void
	 */
	public function print_name() {
		print esc_html( $this->name );
	}
}

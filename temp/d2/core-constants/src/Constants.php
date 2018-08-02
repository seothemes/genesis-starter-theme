<?php
/**
 * Define child theme constants.
 *
 * @package   D2\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2018, SEO Themes
 * @license   MIT
 */

namespace D2\Core;

/**
 * Add constants to child theme.
 *
 * Example config (usually located at config/defaults.php):
 *
 * ```
 * use D2\Core\Constants;
 *
 * $d2_constants = [
 *     Constants::DEFINE => [
 *         'CHILD_THEME_NAME'    => wp_get_theme()->get( 'Name' ),
 *         'CHILD_THEME_URL'     => wp_get_theme()->get( 'ThemeURI' ),
 *         'CHILD_THEME_VERSION' => wp_get_theme()->get( 'Version' ),
 *         'CHILD_THEME_HANDLE'  => wp_get_theme()->get( 'TextDomain' ),
 *         'CHILD_THEME_AUTHOR'  => wp_get_theme()->get( 'Author' ),
 *         'CHILD_THEME_DIR'     => get_stylesheet_directory(),
 *         'CHILD_THEME_URI'     => get_stylesheet_directory_uri(),
 *     ],
 * ];
 *
 * return [
 *     Constants::class => $d2_constants,
 * ];
 * ```
 *
 * @package D2\Core
 */
class Constants extends Core {

	const DEFINE = 'define';

	public function init() {
		if ( array_key_exists( self::DEFINE, $this->config ) ) {
			$this->define_constants( $this->config[ self::DEFINE ] );
		}
	}

	/**
	 * Define child theme constants.
	 *
	 * @since  0.1.0
	 *
	 * @param  array $constants Array of constants to define.
	 *
	 * @return void
	 */
	protected function define_constants( array $constants ) {
		foreach ( $constants as $name => $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}
	}
}

<?php
/**
 * Enqueue Google Fonts through configuration.
 *
 * @package   D2\Core
 * @author    SEO Themes <seothemeswp@gmail.com>
 * @copyright 2018, SEO Themes
 * @license   MIT
 */

namespace D2\Core;

/**
 * Enqueue Google Fonts through configuration.
 *
 * Example config (usually located at config/defaults.php):
 *
 * ```
 * use D2\Core\GoogleFonts;
 *
 * $d2_google_fonts = [
 *     GoogleFonts::ENQUEUE => [
 *         'Source+Sans+Pro:400,600,700',
 *         'Montserrat:400,600',
 *     ],
 * ];
 *
 * return [
 *     GoogleFonts::class => $d2_google_fonts,
 * ];
 * ```
 *
 * @package D2\Core
 */
class GoogleFonts extends Core {

	const ENQUEUE = 'enqueue';
	const HANDLE = 'google-fonts';
	const URL = '\'//fonts.googleapis.com/css?family=\'';

	public function init() {
		if ( array_key_exists( self::ENQUEUE, $this->config ) ) {
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_google_fonts' ] );
		}
	}

	/**
	 * Unregister page templates through configuration.
	 *
	 * @since  0.1.0
	 *
	 * @return void
	 */
	public function enqueue_google_fonts() {
		wp_enqueue_style( self::HANDLE, $this->get_google_fonts_url(), [], $this->get_version() );
	}

	/**
	 * Returns URL of Google Fonts.
	 *
	 * @since  0.1.0
	 *
	 * @return string
	 */
	public function get_google_fonts_url() {
		foreach ( $this->config[ self::ENQUEUE ] as $google_font ) {
			$google_fonts[] = $google_font;
		}
		return self::URL . implode( '|', $google_fonts );
	}

	/**
	 * Returns the child theme version.
	 *
	 * @since  0.1.0
	 *
	 * @return string
	 */
	public function get_version() {
		return wp_get_theme()->get( 'Version' );
	}
}

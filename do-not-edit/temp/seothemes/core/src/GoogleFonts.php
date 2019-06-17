<?php
/**
 * Enqueue Google Fonts through configuration.
 *
 * @package   SeoThemes\Core
 * @author    SEO Themes <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class GoogleFonts
 *
 * @package SeoThemes\Core
 */
class GoogleFonts extends Component {

	const ENQUEUE = 'enqueue';
	const HANDLE  = 'google-fonts';
	const URL     = '//fonts.googleapis.com/css?family=';

	/**
	 * Add action to enqueue Google Fonts when this component is in use.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_google_fonts' ] );
		add_action( 'enqueue_block_editor_assets', [$this, 'enqueue_google_fonts' ] );

	}

	/**
	 * Enqueue Google Fonts through configuration.
	 *
	 * @since  0.1.0
	 *
	 * @return void
	 */
	public function enqueue_google_fonts() {
		wp_enqueue_style( self::HANDLE, $this->get_google_fonts_url(), [], $this->get_version() );
	}

	/**
	 * Combine Google Fonts to create final URL string.
	 *
	 * @since  0.1.0
	 *
	 * @return string
	 */
	protected function get_google_fonts_url() {
		return self::URL . implode( '|', $this->config );
	}

	/**
	 * Return the child theme version.
	 *
	 * @since  0.1.0
	 *
	 * @return string
	 */
	protected function get_version() {
		return wp_get_theme()->get( 'Version' );
	}
}

<?php

namespace SeoThemes\Core\Structure;

use SeoThemes\Core\Component;

class Header extends Component {

	const DISPLAY_LOGO    = 'display-logo';
	const TITLE_AREA_HOOK = 'title-area-hook';
	const DEFAULT_HEADERS = 'default-header';

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init() {
		if ( isset( $this->config[ self::DISPLAY_LOGO ] ) ) {
			add_action( 'genesis_site_title', 'the_custom_logo', 0 );
		}

		if ( isset( $this->config[ self::TITLE_AREA_HOOK ] ) ) {
			add_filter( 'genesis_markup_title-area_close', [ $this, 'title_area_hook' ], 10, 1 );
		}

		if ( isset( $this->config[ self::DEFAULT_HEADERS ] ) ) {
			add_action( 'genesis_setup', [ $this, 'default_headers' ], 20 );
		}
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @param $close_html
	 *
	 * @return string
	 */
	function title_area_hook( $close_html ) {
		if ( $close_html ) {
			ob_start();
			do_action( 'genesis_after_title_area' );
			$close_html = $close_html . ob_get_clean();
		}

		return $close_html;
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function default_headers() {
		register_default_headers( $this->config[ self::DEFAULT_HEADERS ] );
	}
}

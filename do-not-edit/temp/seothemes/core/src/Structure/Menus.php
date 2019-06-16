<?php

namespace SeoThemes\Core\Structure;

use SeoThemes\Core\Component;

class Menus extends Component {

	const REPOSITION_PRIMARY   = 'reposition-primary';
	const REPOSITION_SECONDARY = 'reposition-secondary';

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init() {
		if ( isset( $this->config[ self::REPOSITION_PRIMARY ] ) ) {
			remove_action( 'genesis_after_header', 'genesis_do_nav' );
			add_action( 'child_theme_after_title_area', 'genesis_do_nav' );
		}

		if ( isset( $this->config[ self::REPOSITION_SECONDARY ] ) ) {
			remove_action( 'genesis_after_header', 'genesis_do_subnav' );
			add_action( 'child_theme_after_header_wrap', 'genesis_do_subnav' );
		}
	}
}



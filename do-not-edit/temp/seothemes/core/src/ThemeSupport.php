<?php
/**
 * Add or remove theme support for given features.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class ThemeSupport
 *
 * @package SeoThemes\Core
 */
class ThemeSupport extends Component {

	const ADD    = 'add';
	const REMOVE = 'remove';

	/**
	 * Add or remove theme support for given features.
	 *
	 * @return void
	 */
	public function init() {
		if ( isset( $this->config[ self::REMOVE ] ) ) {
			$this->remove( $this->config[ self::REMOVE ] );
		}

		if ( isset( $this->config[ self::ADD ] ) ) {
			$this->add( $this->config[ self::ADD ] );
		}
	}

	/**
	 * Add theme support for given features.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
	 *
	 * @param array $features Array of features and optional extra arguments.
	 *
	 * @return void
	 */
	protected function add( array $features ) {
		foreach ( $features as $feature => $args ) {
			if ( is_int( $feature ) ) {
				add_theme_support( $args );
			} else {
				add_theme_support( $feature, $args );
			}
		}
	}

	/**
	 * Remove theme support for given features.
	 *
	 * @link https://developer.wordpress.org/reference/functions/remove_theme_support/
	 *
	 * @param array $features Array of features.
	 *
	 * @return void
	 */
	protected function remove( array $features ) {
		foreach ( $features as $feature ) {
			\remove_theme_support( $feature );
		}
	}
}

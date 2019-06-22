<?php
/**
 * Add or remove post type support for given features.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class PostTypeSupport
 *
 * @package SeoThemes\Core
 */
class PostTypeSupport extends Component {

	const ADD       = 'add';
	const REMOVE    = 'remove';
	const POST_TYPE = 'post-type';
	const SUPPORTS  = 'supports';

	/**
	 * Initialize component.
	 *
	 * @since 0.2.0
	 *
	 * @return void
	 */
	public function init() {
		if ( isset( $this->config[ self::ADD ] ) ) {
			$this->add( $this->config[ self::ADD ] );
		}
		if ( isset( $this->config[ self::REMOVE ] ) ) {
			$this->remove( $this->config[ self::REMOVE ] );
		}
	}

	/**
	 * Add post type support.
	 *
	 * @since 0.2.0
	 *
	 * @param array $config Features to enable.
	 *
	 * @return void
	 */
	protected function add( $config ) {
		foreach ( $config as $sub_config => $args ) {
			add_post_type_support( $args[ self::POST_TYPE ], $args[ self::SUPPORTS ] );
		}
	}

	/**
	 * Remove post type support.
	 *
	 * @since 0.2.0
	 *
	 * @param array $config Features to remove.
	 *
	 * @return void
	 */
	protected function remove( $config ) {
		foreach ( $config as $sub_config => $args ) {
			remove_post_type_support( $args[ self::POST_TYPE ], $args[ self::SUPPORTS ] );
		}
	}
}

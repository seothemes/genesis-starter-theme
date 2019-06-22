<?php
/**
 * Add or remove image sizes through configuration.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @author    Craig Simpson <craig@craigsimpson.scot>
 * @copyright 2018, D2 Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class ImageSizes
 *
 * @package SeoThemes\Core
 */
class ImageSizes extends Component {

	const ADD    = 'add';
	const REMOVE = 'remove';

	/**
	 * Add or remove image sizes through configuration.
	 *
	 * @since 0.1.0
	 *
	 * @link  https://developer.wordpress.org/reference/functions/remove_image_size/
	 *
	 * @return void
	 */
	public function init() {
		if ( isset( $this->config[ self::REMOVE ] ) ) {
			array_map( 'remove_image_size', $this->config[ self::REMOVE ] );
		}

		if ( isset( $this->config[ self::ADD ] ) ) {
			$this->add_image_sizes( $this->config[ self::ADD ] );
		}
	}

	/**
	 * Add image sizes.
	 *
	 * @since 0.1.0
	 *
	 * @link  https://developer.wordpress.org/reference/functions/add_image_size/
	 *
	 * @param array $image_sizes Array of image sizes to add.
	 *
	 * @return void
	 */
	public function add_image_sizes( $image_sizes ) {
		foreach ( $image_sizes as $name => $args ) {
			add_image_size( $name, $args[0], $args[1], $args[2] );
		}
	}
}

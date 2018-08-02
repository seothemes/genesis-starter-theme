<?php
/**
 * Adds image sizes.
 *
 * @package   D2\Core
 * @author    D2 Themes <https://d2themes.com>
 * @copyright 2018, D2 Themes
 * @license   MIT
 */

namespace D2\Core;

/**
 * Add image sizes to theme.
 *
 * Example config (usually located at config/defaults.php):
 *
 * ```
 * use D2\Core\ImageSizes;
 *
 * $d2_image_sizes = [
 *     ImageSizes::ADD => [
 *         'featured' => [
 *             'width'  => 620,
 *             'height' => 380,
 *             'crop'   => true,
 *         ],
 *         'hero'     => [
 *             'width'  => 1280,
 *             'height' => 720,
 *             'crop'   => true,
 *         ],
 *     ],
 * ];
 *
 * return [
 *     ImageSizes::class => $d2_image_sizes,
 * ];
 * ```
 *
 * @package D2\Core
 */
class ImageSizes extends Core {

	const ADD = 'add';

	public function init() {
		if ( array_key_exists( self::ADD, $this->config ) ) {
			$this->add_image_sizes( $this->config[ self::ADD ] );
		}
	}

	/**
	 * Adds image sizes.
	 *
	 * @since  0.1.0
	 *
	 * @param  array $sizes Array of image sizes to add.
	 *
	 * @return void
	 */
	public function add_image_sizes( $sizes ) {
		foreach ( $sizes as $name => $args ) {
			$args['crop'] = ( array_key_exists( 'crop', $args ) ? $args['crop'] : false );
			add_image_size( $name, $args['width'], $args['height'], $args['crop'] );
		}
	}
}

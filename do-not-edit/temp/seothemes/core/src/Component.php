<?php
/**
 * Core class, to be extended to form other components.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class Core
 *
 * @package SeoThemes\Core
 */
abstract class Component {

	/**
	 * Hold the array of config specific to this component.
	 *
	 * @var array Array of config specific to this component.
	 */
	protected $config;

	/**
	 * Core constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Array of config specific to this component.
	 *
	 * @return void
	 */
	public function __construct( array $config ) {
		$this->config = $config;
	}

	/**
	 * The init() method within each core component is called to instantiate it.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	abstract public function init();
}

<?php
/**
 * Core class, to be extended to form other components.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @author    Craig Simpson <craig@craigsimpson.scot>
 * @copyright 2018, D2 Themes
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
	 * @param array $config Array of config specific to this component.
	 */
	public function __construct( array $config ) {
		$this->config = $config;
	}

	/**
	 * The init() method within each core component is called to instantiate it.
	 *
	 * @return void
	 */
	abstract public function init();
}

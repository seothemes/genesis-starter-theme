<?php
/**
 * Register Merlin config, strings and import files.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class Merlin
 *
 * @package SeoThemes\Core
 */
class Merlin extends Component {

	const CONFIG  = 'config';
	const STRINGS = 'strings';
	const IMPORT  = 'import';

	/**
	 * Initialize Merlin component.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init() {
		new \Merlin( $this->config[ self::CONFIG ], $this->config[ self::STRINGS ] );

		add_filter( 'genesis_merlin_steps', [ $this, 'merlin_steps' ] );
		add_filter( 'merlin_import_files', [ $this, 'merlin_local_import_files' ] );
	}

	/**
	 * Remove child theme step from wizard.
	 *
	 * @since 1.0.0
	 *
	 * @param array $steps Default wizard steps.
	 *
	 * @return mixed
	 */
	function merlin_steps( $steps ) {
		unset( $steps['child'] );

		return $steps;
	}

	/**
	 * Add local demo import files.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	function merlin_local_import_files() {
		return $this->config[ self::IMPORT ];
	}
}

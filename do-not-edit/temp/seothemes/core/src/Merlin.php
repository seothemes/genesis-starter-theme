<?php

namespace SeoThemes\Core;

class Merlin extends Component {

	const CONFIG  = 'config';
	const STRINGS = 'strings';
	const IMPORT  = 'import';

	public function init() {
		new \Merlin( $this->config[ self::CONFIG ], $this->config[ self::STRINGS ] );

		add_filter( 'genesis_merlin_steps', [ $this, 'merlin_steps' ] );
		add_filter( 'merlin_import_files', [ $this, 'merlin_local_import_files' ] );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @param $steps
	 *
	 * @return mixed
	 */
	function merlin_steps( $steps ) {
		unset( $steps['child'] );

		return $steps;
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	function merlin_local_import_files() {
		return $this->config[ self::IMPORT ];
	}
}

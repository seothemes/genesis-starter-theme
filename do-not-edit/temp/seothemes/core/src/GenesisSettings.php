<?php
/**
 * Set or override default Genesis theme settings through configuration.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class GenesisSettings
 *
 * @package SeoThemes\Core
 */
class GenesisSettings extends Component {

	/**
	 * Apply settings filter if this component is in use, or force settings.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function init() {
		add_filter( 'genesis_theme_settings_defaults', [ $this, 'set_defaults' ] );
	}

	/**
	 * Change the theme settings defaults.
	 *
	 * @since 0.1.0
	 *
	 * @param array $defaults Existing theme settings defaults.
	 *
	 * @return array Theme settings defaults.
	 */
	public function set_defaults( $defaults ) {
		foreach ( $this->config as $key => $value ) {
			$defaults[ $key ] = $value;
		}

		return $defaults;
	}
}

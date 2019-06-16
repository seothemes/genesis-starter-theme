<?php
/**
 * Set or override default Genesis theme settings through configuration.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @author    Craig Simpson <craig@craigsimpson.scot>
 * @copyright 2018, D2 Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Set or override default Genesis theme settings through configuration.
 *
 * Set defaults, or force Genesis theme settings to specific values, set in
 * config/defaults.php
 *
 * Default values will be used before Genesis theme settings are saved, or when they are
 * reset.
 *
 * Forced values will be used regardless of what the User tries to change the setting to.
 * A future version of Genesis should make these settings disabled.
 *
 * Example config (usually located at config/defaults.php):
 *
 * ```
 * use SeoThemes\Core\GenesisSettings;
 *
 * $core_genesis_settings = [
 *     GenesisSettings::FORCE   => [
 *         GenesisSettings::POSTS_NAV         => 'numeric',
 *         GenesisSettings::SEMANTIC_HEADINGS => 0,
 *     ],
 *     GenesisSettings::DEFAULTS => [
 *         GenesisSettings::SITE_LAYOUT => 'full-width-content',
 *     ],
 * ];
 *
 * return [
 *     GenesisSettings => $core_genesis_settings,
 * ];
 * ```
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

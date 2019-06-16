<?php
/**
 * Add recommended plugins to TGM Plugin Activation through configuration.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @author    Craig Simpson <craig@craigsimpson.scot>
 * @copyright 2018, D2 Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Add recommended plugins to TGM Plugin Activation through configuration.
 *
 * Example config (usually located at config/defaults.php):
 *
 * ```
 * use SeoThemes\Core\PluginActivation;
 *
 * $core_plugins = [
 *     PluginActivation::REGISTER => [
 *         [
 *             PluginActivation::NAME     => 'Genesis Widget Column Classes',
 *             PluginActivation::SLUG     => 'genesis-widget-column-classes',
 *             PluginActivation::REQUIRED => false,
 *         ],
 *         [
 *             PluginActivation::NAME     => 'Icon Widget',
 *             PluginActivation::SLUG     => 'icon-widget',
 *             PluginActivation::REQUIRED => false,
 *         ],
 *     ],
 *     PluginActivation::SETTINGS => [
 *         PluginActivation::SETTING_HAS_NOTICES => true,
 *         PluginActivation::SETTING_DISMISSABLE => false,
 *     ],
 * ];
 *
 * return [
 *     PluginActivation::class => $core_plugins,
 * ];
 * ```
 */
class Tgmpa extends Component {

	const REGISTER             = 'register';
	const NAME                 = 'name';
	const SLUG                 = 'slug';
	const REQUIRED             = 'required';
	const SETTINGS             = 'settings';
	const SETTING_ID           = 'id';
	const SETTING_DEFAULT_PATH = 'default_path';
	const SETTING_MENU         = 'menu';
	const SETTING_HAS_NOTICES  = 'has_notices';
	const SETTING_DISMISSABLE  = 'dismissable';
	const SETTING_DISMISS_MSG  = 'dismiss_msg';
	const SETTING_IS_AUTOMATIC = 'is_automatic';
	const SETTING_MESSAGE      = 'message';

	/**
	 * Array of plugins.
	 *
	 * @since 0.1.0
	 *
	 * @var array
	 */
	protected $plugins = [];

	/**
	 * Default TGMPA settings.
	 *
	 * @since 0.1.0
	 *
	 * @var array
	 */
	protected $defaults = [];

	/**
	 * Register plugins with TGMPA if it's available, and this component is in use.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function init() {

		if ( class_exists( 'TGM_Plugin_Activation' ) && isset( $this->config[ self::REGISTER ] ) ) {

			// Set defaults.
			$this->defaults = [
				self::SETTING_ID           => get_stylesheet(),
				self::SETTING_DEFAULT_PATH => '',
				self::SETTING_MENU         => 'tgmpa-install-plugins',
				self::SETTING_HAS_NOTICES  => true,
				self::SETTING_DISMISSABLE  => true,
				self::SETTING_DISMISS_MSG  => '',
				self::SETTING_IS_AUTOMATIC => false,
				self::SETTING_MESSAGE      => '',
			];

			// Create new instance.
			new \TGM_Plugin_Activation();

			// Register plugins.
			\tgmpa( $this->get_plugins( $this->config[ self::REGISTER ] ), $this->get_settings() );

		}

	}

	/**
	 * Return array of plugins to recommend.
	 *
	 * @since  0.1.0
	 *
	 * @param array $plugins Array of recommended plugins from configuration.
	 *
	 * @return array
	 */
	protected function get_plugins( array $plugins ) {
		foreach ( $plugins as $plugin => $settings ) {
			$this->plugins[] = [
				'name'     => $settings[ self::NAME ],
				'slug'     => $settings[ self::SLUG ],
				'required' => $settings[ self::REQUIRED ],
			];
		}

		return $this->plugins;
	}

	/**
	 * Return TGMPA settings.
	 *
	 * @since  0.1.0
	 *
	 * @return array
	 */
	protected function get_settings() {
		return isset( $this->config[ self::SETTINGS ] ) ? array_merge( $this->defaults, $this->config[ self::SETTINGS ] ) : $this->defaults;
	}
}

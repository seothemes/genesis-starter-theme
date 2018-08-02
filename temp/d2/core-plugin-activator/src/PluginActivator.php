<?php
/**
 * Add recommended plugins to theme.
 *
 * @package   D2\Core
 * @author    D2 Themes <https://d2themes.com>
 * @copyright 2018, D2 Themes
 * @license   MIT
 */

namespace D2\Core;

/**
 * Add recommended plugins to child theme.
 *
 * Example config (usually located at config/defaults.php):
 *
 * ```
 * use D2\Core\PluginActivator;
 *
 * $plugins = [
 *     PluginActivator::REGISTER => [
 *         'Genesis eNews Extended',
 *         'Genesis Simple FAQ',
 *         'Genesis Testimonial Slider',
 *         'Genesis Widget Column Classes',
 *         'Google Map',
 *         'Icon Widget',
 *         'One Click Demo Import',
 *         'Simple Social Icons',
 *         'WP Featherlight',
 *     ],
 * ];
 *
 * return [
 *     PluginActivator::class => $plugins,
 * ];
 * ```
 */
class PluginActivator extends Core {

	const REGISTER = 'register';

	protected $plugins = [];

	public function init() {

		if ( class_exists( 'TGM_Plugin_Activation' ) && array_key_exists( self::REGISTER, $this->config ) ) {

			new \TGM_Plugin_Activation();

			$this->register_plugins();

		}

	}

	/**
	 * Returns array of plugins to recommend.
	 *
	 * @since  0.1.0
	 *
	 * @return array
	 */
	public function get_plugins() {
		foreach ( $this->config[ self::REGISTER ] as $plugin ) {
			$this->plugins[] = [
				'name'     => $plugin,
				'slug'     => strtolower( str_replace( ' ', '-', $plugin ) ),
				'required' => false,
			];
		}

		if ( class_exists( 'WooCommerce' ) ) {
			$this->plugins[] = [
				'name'     => 'Genesis Connect WooCommerce',
				'slug'     => 'genesis-connect-woocommerce',
				'required' => true,
			];
		}

		return $this->plugins;
	}

	/**
	 * Returns TGMPA settings.
	 *
	 * @since  0.1.0
	 *
	 * @return array
	 */
	public function get_settings() {

		return [
			'id'           => get_stylesheet(),
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		];

	}

	/**
	 * Register required plugins.
	 *
	 * The variables passed to the `is_tgmpa_active()` function should be:
	 *
	 * - an array of plugin arrays;
	 * - optionally a configuration array.
	 *
	 * If you are not changing anything in the configuration array, you can
	 * remove the array and remove the variable from the function call: `tgmpa(
	 * $plugins );`. In that case, the TGMPA default settings will be used.
	 *
	 * This function is hooked into `tgmpa_register`, which is fired on the WP
	 * `init` action on priority 10.
	 *
	 * @since  0.1.0
	 *
	 * @return void
	 */
	public function register_plugins() {
		\tgmpa( $this->get_plugins(), $this->get_settings() );
	}

}

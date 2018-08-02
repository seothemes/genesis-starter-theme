<?php
/**
 * Define child theme constants.
 *
 * @package   D2\Core
 * @author    D2 Themes <https://d2themes.com>
 * @copyright 2018, D2 Themes
 * @license   MIT
 */

namespace D2\Core;

/**
 * Add constants to child theme.
 *
 * Example config (usually located at config/defaults.php):
 *
 *
 * ```php
 * use D2\Core\ComponentBoilerplate;
 *
 * $d2_components = [
 *     ComponentBoilerplate::ADD => [
 *         'component_key' => 'component_value',
 *     ],
 * ];
 *
 * return [
 *     ComponentBoilerplate::class => $d2_components,
 * ];
 * ```
 *
 * @package D2\Core
 */
class Hooks extends Core {

	const ADD = 'add';
	const REMOVE = 'remove';

	const TYPE = 'type';
	const TAG = 'tag';
	const FUNCTION_NAME = 'function_name';
	const PRIORITY = 'priority';
	const ARGS = 'args';

	public function init() {
		if ( array_key_exists( self::ADD, $this->config ) || array_key_exists( self::REMOVE, $this->config ) ) {
			$this->run_hooks( $this->config );
		}
	}

	public function run_hooks( $configs ) {
		foreach ( $configs as $config_name => $hooks ) {
			foreach ( $hooks as $hook_array => $hook ) {
				$hook_type = $config_name . '_' . $hook[ self::TYPE ];
				$hook_type(
					( $hook[ self::TAG ] ? $hook[ self::TAG ] : false ),
					( $hook[ self::FUNCTION_NAME ] ? $hook[ self::FUNCTION_NAME ] : false ),
					( $hook[ self::PRIORITY ] ? $hook[ self::PRIORITY ] : false ),
					( $hook[ self::ARGS ] ? $hook[ self::ARGS ] : false )
				);
			}
		}
	}
}

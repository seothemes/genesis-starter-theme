<?php
/**
 * Theme class.
 *
 * Loads other core-compatible components from within
 * our WordPress theme functions.php file.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @author    Craig Simpson <craig@craigsimpson.scot>
 * @copyright 2018, D2 Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class Theme
 *
 * Used to load other core-compatible components.
 *
 * @package SeoThemes\Core
 */
final class Theme {

	public static $config_dir;
	public static $config;
	public static $path;

	/**
	 * The setup function will iterate through the theme configuration array,
	 * check for the existence of a customization-specific class (the array
	 * key), then instantiate the class and call the init() method.
	 *
	 * @since 0.0.1
	 *
	 * @param string $config_dir All theme-specific configuration.
	 *
	 * @return void
	 */
	public static function setup( $config_dir ) {
		self::$config_dir = trailingslashit( $config_dir );
		self::$config     = self::create_config( self::$config_dir );
		self::$path       = trailingslashit( dirname( self::$config_dir ) );

		self::run( self::$config );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @param $config_dir
	 *
	 * @return array
	 */
	public static function create_config( $config_dir ) {
		$config      = [];
		$sub_configs = glob( $config_dir . '*.php' );

		foreach ( $sub_configs as $sub_config ) {
			$name     = basename( $sub_config, '.php' );
			$override = get_stylesheet_directory() . "/config/$name.php";

			if ( is_readable( $override ) ) {
				$sub_config = $override;
			}

			$config[ $name ] = require $sub_config;
		}

		return $config;
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @param $config
	 *
	 * @return void
	 */
	public static function run( $config ) {
		foreach ( $config as $sub_config => $args ) {
			$class = __NAMESPACE__ . '\\' . str_replace( '-', '', ucwords( $sub_config, '-' ) );
			$dir   = __DIR__ . DIRECTORY_SEPARATOR . substr( strrchr( $class, "\\" ), 1 ) . DIRECTORY_SEPARATOR;

			if ( method_exists( $class, 'init' ) ) {
				$class = new $class( $args );
				$class->init();
			}

			if ( is_dir( $dir ) ) {
				$namespace = __NAMESPACE__ . '\\' . basename( $dir ) . '\\';
				foreach ( glob( $dir . '*.php' ) as $file ) {
					$key   = strtolower( basename( $file, '.php' ) );
					$class = $namespace . str_replace( '-', '', ucwords( $key, '-' ) );

					if ( method_exists( $class, 'init' ) ) {
						$class = new $class( $args[ $key ] );
						$class->init();
					}
				}
			}
		}
	}
}

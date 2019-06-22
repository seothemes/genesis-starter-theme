<?php
/**
 * Loads all core-compatible components.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class Theme
 *
 * @package SeoThemes\Core
 */
final class Theme {

	/**
	 * @var $config_dir
	 */
	public static $config_dir;

	/**
	 * @var $config
	 */
	public static $config;

	/**
	 * @var $path
	 */
	public static $path;

	/**
	 * @var $data
	 */
	public static $data;

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
		self::$data       = self::get_data();

		self::load_textdomain();
		self::load_components( self::$config );
	}

	/**
	 * Generate entire theme config.
	 *
	 * @since 1.0.0
	 *
	 * @param string $config_dir Path to config files.
	 *
	 * @return array
	 */
	public static function create_config( $config_dir ) {
		$config      = [];
		$sub_configs = glob( $config_dir . '*.php' );
		$config_dir  = apply_filters( __NAMESPACE__ . '\dir', get_stylesheet_directory() );

		foreach ( $sub_configs as $sub_config ) {
			$name     = basename( $sub_config, '.php' );
			$override = $config_dir . "/config/$name.php";

			if ( is_readable( $override ) ) {
				$sub_config = $override;
			}

			$config[ $name ] = require $sub_config;
		}

		return $config;
	}

	/**
	 * Initializes components.
	 *
	 * @since 1.0.0
	 *
	 * @param $config
	 *
	 * @return void
	 */
	public static function load_components( $config ) {
		foreach ( $config as $sub_config => $args ) {
			$class = __NAMESPACE__ . '\\' . str_replace( '-', '', ucwords( $sub_config, '-' ) );

			if ( method_exists( $class, 'init' ) ) {
				$class = new $class( $args );
				$class->init();
			}
		}
	}

	/**
	 * Returns the theme data.
	 *
	 * @since 1.0.0
	 *
	 * @return null|\WP_Theme
	 */
	public static function get_data() {
		static $data = null;

		if ( is_null( $data ) ) {
			$data                = wp_get_theme();
			$data['Name']        = $data->get( 'Name' );
			$data['ThemeURI']    = $data->get( 'ThemeURI' );
			$data['Description'] = $data->get( 'Description' );
			$data['Author']      = $data->get( 'Author' );
			$data['AuthorURI']   = $data->get( 'AuthorURI' );
			$data['Version']     = $data->get( 'Version' );
			$data['Template']    = $data->get( 'Template' );
			$data['Status']      = $data->get( 'Status' );
			$data['Tags']        = $data->get( 'Tags' );
			$data['TextDomain']  = $data->get( 'TextDomain' );
			$data['DomainPath']  = $data->get( 'DomainPath' );
		}

		return $data;
	}

	/**
	 * Loads the child theme text domain.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function load_textdomain() {
		load_child_theme_textdomain( self::$data['TextDomain'], apply_filters( 'child_theme_textdomain', self::$path . 'assets/lang' ) );
	}
}

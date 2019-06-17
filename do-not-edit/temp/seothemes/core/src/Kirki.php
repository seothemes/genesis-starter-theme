<?php
/**
 * Register Kirki fields, sections and panels through configuration.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class Kirki
 *
 * @package SeoThemes\Core
 */
class Kirki extends Component {

	const ALPHA           = 'alpha';
	const CAPABILITY      = 'capability';
	const CHOICES         = 'choices';
	const CONFIG          = 'config';
	const DEFAULT_VALUE   = 'default';
	const DESCRIPTION     = 'description';
	const ELEMENT         = 'element';
	const EXCLUDE         = 'exclude';
	const FIELDS          = 'fields';
	const FONTS           = 'fonts';
	const GOOGLE          = 'google';
	const ID              = 'id';
	const LABEL           = 'label';
	const LOADER          = 'loader';
	const MEDIA_QUERY     = 'media_query';
	const METHOD          = 'method';
	const MODE            = 'mode';
	const OUTPUT          = 'output';
	const PANEL           = 'panel';
	const PANELS          = 'panels';
	const PARTIAL_REFRESH = 'partial_refresh';
	const PATTERN_REPLACE = 'pattern_replace';
	const PREFIX          = 'prefix';
	const PRIORITY        = 'priority';
	const PROPERTY        = 'property';
	const REMOVE          = 'remove';
	const SCRIPTS         = 'scripts';
	const SECTION         = 'section';
	const SECTIONS        = 'sections';
	const SETTINGS        = 'settings';
	const STANDARD        = 'standard';
	const STYLES          = 'styles';
	const SUFFIX          = 'suffix';
	const TITLE           = 'title';
	const TOOLTIP         = 'tooltip';
	const TRANSPORT       = 'transport';
	const TYPE            = 'type';
	const UNITS           = 'units';
	const VALUE_PATTERN   = 'value_pattern';

	/**
	 * Initialize class.
	 *
	 * @since 3.3.0
	 *
	 * @return void
	 */
	public function init() {
		add_filter( 'kirki_telemetry', '__return_false' );
		add_filter( 'kirki_config', [ $this, 'remove_loader' ] );
		add_filter( 'kirki/dynamic_css/method', [ $this, 'write_to_file' ] );

		if ( isset( $this->config[ self::CONFIG ] ) ) {
			add_action( 'after_setup_theme', [ $this, 'add_config' ] );
		}

		if ( isset( $this->config[ self::REMOVE ] ) ) {
			add_action( 'customize_register', [ $this, 'remove_defaults' ], 99 );
		}

		if ( isset( $this->config[ self::STYLES ] ) ) {
			add_action( 'customize_controls_print_styles', [ $this, 'styles' ], 99 );
		}

		if ( isset( $this->config[ self::SCRIPTS ] ) ) {
			add_action( 'customize_controls_print_scripts', [ $this, 'scripts' ], 999 );
		}

		if ( isset( $this->config[ self::PANELS ] ) ) {
			$this->add_panels( $this->config[ self::PANELS ] );
		}

		if ( isset( $this->config[ self::SECTIONS ] ) ) {
			$this->add_sections( $this->config[ self::SECTIONS ] );
		}

		if ( isset( $this->config[ self::FIELDS ] ) ) {
			$this->add_fields( $this->config[ self::FIELDS ] );
		}
	}

	/**
	 * Removes Kirki loader image.
	 *
	 * @since  1.1.0
	 *
	 * @return array
	 */
	function remove_loader() {
		return wp_parse_args( [
			'disable_loader' => true,
		] );
	}

	/**
	 * Write custom CSS to file.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function write_to_file() {
		return 'file';
	}

	/**
	 * Adds the theme's Kirki config.
	 *
	 * @since  1.2.0
	 *
	 * @link   https://aristath.github.io/kirki/docs/getting-started/config.html
	 *
	 * @return void
	 */
	public function add_config() {
		\Kirki::add_config( wp_get_theme()->get( 'TextDomain' ), $this->config[ self::CONFIG ] );
	}

	/**
	 * Removes default Customizer settings.
	 *
	 * @since  1.2.0
	 *
	 * @param  object $wp_customize Global customizer object.
	 *
	 * @return void
	 */
	public function remove_defaults( $wp_customize ) {
		foreach ( $this->config[ self::REMOVE ] as $sub_config => $args ) {
			$function = 'remove_' . $args[0];
			$wp_customize->$function( $args[1] );
		}
	}

	/**
	 * Adds custom styles to the WordPress Customizer.
	 *
	 * @since  1.2.0
	 *
	 * @return void
	 */
	public function styles() {
		echo $this->config[ self::STYLES ];
	}

	/**
	 * Adds custom scripts to the WordPress Customizer.
	 *
	 * @since  1.2.0
	 *
	 * @return void
	 */
	public function scripts() {
		echo $this->config[ self::SCRIPTS ];
	}

	/**
	 * Adds Customizer panels
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Components sub config.
	 *
	 * @return void
	 */
	protected function add_panels( $config ) {
		foreach ( $config as $panel => $args ) {
			\Kirki::add_panel( $args['id'], $args );
		}
	}

	/**
	 * Adds Customizer sections.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Components sub config.
	 *
	 * @return void
	 */
	protected function add_sections( $config ) {
		foreach ( $config as $section => $args ) {
			\Kirki::add_section( $args['id'], $args );
		}
	}

	/**
	 * Adds Customizer fields.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Components sub config.
	 *
	 * @return void
	 */
	protected function add_fields( $config ) {
		foreach ( $config as $field => $args ) {
			\Kirki::add_field( wp_get_theme()->get( 'TextDomain' ), $args );
		}
	}
}

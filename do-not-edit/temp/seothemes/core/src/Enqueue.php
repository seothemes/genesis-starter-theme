<?php
/**
 * Load theme scripts and stylesheets through configuration.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class Enqueue
 *
 * @package SeoThemes\Core
 */
class Enqueue extends Component {

	const CONDITIONAL  = 'conditional';
	const DEPS         = 'deps';
	const FOOTER       = 'footer';
	const HANDLE       = 'handle';
	const LOCALIZE     = 'localize';
	const LOCALIZEDATA = 'l10ndata';
	const LOCALIZEVAR  = 'l10var';
	const MEDIA        = 'media';
	const SCRIPTS      = 'scripts';
	const STYLES       = 'styles';
	const URL          = 'src';
	const VERSION      = 'version';
	const MENUS        = 'menus';
	const EDITOR       = 'editor';
	const PRIORITY     = 'priority';

	public function init() {

		// Remove stylesheet by default.
		remove_action( 'genesis_meta', 'genesis_load_stylesheet' );

		if ( isset( $this->config[ self::SCRIPTS ] ) ) {
			$this->process_assets( $this->config[ self::SCRIPTS ] );
		}

		if ( isset( $this->config[ self::STYLES ] ) ) {
			$this->process_assets( $this->config[ self::STYLES ] );
		}

		if ( isset( $this->config[ self::MENUS ] ) ) {
			add_action( 'after_setup_theme', [ $this, 'register_menus' ] );
		}
	}

	/**
	 * Process scripts and styles.
	 *
	 * @since 1.0.0
	 *
	 * @param $assets
	 *
	 * @return void
	 */
	protected function process_assets( $assets ) {
		foreach ( $assets as $asset ) {
			$hook     = isset( $asset[ self::EDITOR ] ) && $asset[ self::EDITOR ] ? 'enqueue_block_editor_assets' : 'wp_enqueue_scripts';
			$priority = isset( $asset[ self::PRIORITY ] ) ? $asset[ self::PRIORITY ] : 10;

			if ( 'enqueue_block_editor_assets' == $hook && 'style' === $this->get_type( $asset['src'] ) ) {
				add_editor_style( str_replace( get_stylesheet_directory_uri(), '', $asset['src'] ) );

				continue;
			}

			add_action( $hook, function () use ( $asset ) {
				$type        = $this->get_type( $asset['src'] );
				$deps        = $this->get_deps( $asset );
				$version     = $this->get_version( $asset );
				$footer      = $this->get_footer( $asset );
				$media       = $this->get_media( $asset );
				$last_arg    = $footer ? $footer : $media;
				$conditional = isset( $asset[ self::CONDITIONAL ] ) ? $asset[ self::CONDITIONAL ] : '__return_true';
				$register    = "wp_register_$type";
				$enqueue     = "wp_enqueue_$type";

				// Register and enqueue the asset.
				if ( is_callable( $conditional ) && $conditional() ) {
					$register( $asset[ self::HANDLE ], $asset[ self::URL ], $deps, $version, $last_arg );
					$enqueue( $asset[ self::HANDLE ] );

					if ( isset( $asset[ self::LOCALIZE ] ) ) {
						$name = $asset[ self::LOCALIZE ][ self::LOCALIZEVAR ];
						$data = $asset[ self::LOCALIZE ][ self::LOCALIZEDATA ];
						wp_localize_script( $asset[ self::HANDLE ], $name, $data );
					}
				}
			}, $priority );
		}
	}

	/**
	 * Get asset dependencies, or fall back to empty array.
	 *
	 * @param array $asset
	 *
	 * @return array
	 */
	protected function get_deps( array $asset ) {
		return isset( $asset[ self::DEPS ] ) ? $asset[ self::DEPS ] : [];
	}

	/**
	 * Get asset version, or fall back to false.
	 *
	 * @param array $asset
	 *
	 * @return string|bool
	 */
	protected function get_version( array $asset ) {
		return isset( $asset[ self::VERSION ] ) ? $asset[ self::VERSION ] : false;
	}

	/**
	 * Determine if asset should be loaded in the footer.
	 *
	 * @param array $asset
	 *
	 * @return bool
	 */
	protected function get_footer( array $asset ) {
		return isset( $asset[ self::FOOTER ] ) ? $asset[ self::FOOTER ] : false;
	}

	/**
	 * Determine media type, or fall back to 'all'.
	 *
	 * @param array $asset
	 *
	 * @return string
	 */
	protected function get_media( array $asset ) {
		return isset( $asset[ self::MEDIA ] ) ? $asset[ self::MEDIA ] : 'all';
	}

	/**
	 * Get asset type from src URL.
	 *
	 * @since 1.0.0
	 *
	 * @param $asset
	 *
	 * @return string
	 */
	protected function get_type( $src ) {
		return strpos( $src, '.js' ) !== false ? 'script' : 'style';
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function register_menus() {
		genesis_register_responsive_menus( $this->config[ self::MENUS ] );
	}
}

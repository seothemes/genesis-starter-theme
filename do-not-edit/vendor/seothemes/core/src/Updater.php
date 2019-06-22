<?php
/**
 * Loads EDD theme updater and customization-safe updates.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

use ProteusThemes\EDDThemeUpdater\EDDThemeUpdaterConfig;

/**
 * Class Updater
 *
 * @package SeoThemes\Core
 */
class Updater extends Component {

	const SKIP       = 'skip';
	const DELETE     = 'delete';
	const EXCLUSIONS = 'exclusions';
	const STRINGS    = 'strings';
	const PUC        = 'puc';
	const EDD        = 'edd';

	/**
	 * @var array
	 */
	public $strings = [];

	/**
	 * Initialize component.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init() {
		$default_strings = [
			'backup_failed' => 'Could not create backup.',
			'notice_text'   => 'Please activate your theme license key to enable automatic updates.',
			'notice_link'   => 'License Settings →',
		];

		$this->strings = isset( $this->config[ self::STRINGS ] ) ? wp_parse_args( $this->config[ self::STRINGS ], $default_strings ) : $default_strings;

		add_action( 'upgrader_source_selection', [ $this, 'before_update' ], 10, 4 );
		add_action( 'upgrader_post_install', [ $this, 'after_update' ], 10, 3 );

		if ( isset( $this->config[ self::EXCLUSIONS ] ) ) {
			add_filter( 'theme_scandir_exclusions', [ $this, 'theme_scandir_exclusions' ] );
		}

		if ( isset( $this->config[ self::PUC ] ) ) {
			add_action( 'init', [ $this, 'plugin_update_checker' ] );
		}

		if ( isset( $this->config[ self::EDD ] ) ) {
			add_action( 'after_setup_theme', [ $this, 'edd_theme_updater' ] );
			add_action( 'admin_notices', [ $this, 'license_notice' ] );
		}
	}

	/**
	 * Duplicates the original theme. Runs before theme update.
	 *
	 * @since 1.0.0
	 *
	 * @param string       $source        File source location.
	 * @param string       $remote_source Remote file source location.
	 * @param \WP_Upgrader $theme_object  WP_Upgrader instance.
	 * @param array        $hook_extra    Extra arguments passed to hooked filters.
	 *
	 * @return string
	 */
	public function before_update( $source, $remote_source, $theme_object, $hook_extra ) {

		// Return early if there is an error or if it's not a child theme update.
		if ( is_wp_error( $source ) || ! is_a( $theme_object, 'Theme_Upgrader' ) || ! isset( $hook_extra['theme'] ) || get_template() === $hook_extra['theme'] ) {
			return $source;
		}

		// Create theme backup.
		$origin = get_stylesheet_directory();
		$backup = $this->get_theme_backup_path();
		wp_mkdir_p( $backup );
		copy_dir( $origin, $backup, [] );

		// Stop update if backup failed.
		if ( ! file_exists( $backup . '/functions.php' ) ) {
			$source = new \WP_Error( 'backup_failed', $this->strings['backup_failed'], $source );
		}

		return $source;
	}

	/**
	 * Add customizations to new version. Runs after theme update.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $response   Installation response.
	 * @param array $hook_extra Extra arguments passed to hooked filters.
	 * @param array $result     Installation result data.
	 *
	 * @return bool
	 */
	public function after_update( $response, $hook_extra, $result ) {

		// Return early if no response or destination does not exist.
		if ( ! $response || ! array_key_exists( 'destination', $result ) || ! is_dir( $this->get_theme_backup_path() ) ) {
			return $response;
		}

		// Setup WP_Filesystem.
		include_once ABSPATH . 'wp-admin/includes/file.php';
		\WP_Filesystem();
		global $wp_filesystem;

		// Bump temp style sheet version.
		$theme_headers = [
			'Name'    => 'Theme Name',
			'Version' => 'Version',
		];
		$new_theme     = get_stylesheet_directory() . '/style.css';
		$new_data      = get_file_data( $new_theme, $theme_headers );
		$new_version   = $new_data['Version'];
		$old_theme     = $this->get_theme_backup_path() . '/style.css';
		$old_data      = get_file_data( $old_theme, $theme_headers );
		$old_version   = $old_data['Version'];
		$old_contents  = $wp_filesystem->get_contents( $old_theme );
		$new_contents  = str_replace( $old_version, $new_version, $old_contents );
		$wp_filesystem->put_contents( $old_theme, $new_contents, FS_CHMOD_FILE );

		// Bring everything back except vendor directory.
		$source = $this->get_theme_backup_path();
		$target = get_stylesheet_directory();
		$skip   = $this->config[ self::SKIP ];
		\copy_dir( $source, $target, $skip );

		// Rename backup theme.
		$old_name    = $old_data['Name'];
		$new_name    = $old_name . ' Backup ' . $old_version;
		$new_content = str_replace( $old_name, $new_name, $old_contents );
		$wp_filesystem->put_contents( $old_theme, $new_content, FS_CHMOD_FILE );

		// Maybe delete theme backup (not recommended).
		if ( $this->config[ self::DELETE ] ) {
			$wp_filesystem->delete( $source, true, 'd' );
		}

		return $response;
	}

	/**
	 * Returns the path to the theme backup.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_theme_backup_path() {
		$theme   = get_stylesheet_directory();
		$version = wp_get_theme()->get( 'Version' );

		return "{$theme}-backup-{$version}";
	}

	/**
	 * Hide files from admin theme editor.
	 *
	 * @since 1.0.0
	 *
	 * @param array $exclusions Array of excluded directories and files.
	 *
	 * @return array
	 */
	public function theme_scandir_exclusions( $exclusions ) {
		if ( ! function_exists( 'get_current_screen' ) ) {
			return $exclusions;
		}

		if ( ! get_current_screen() || 'theme-editor' !== get_current_screen()->id ) {
			return $exclusions;
		}

		return array_merge( $this->config[ self::EXCLUSIONS ], $exclusions );
	}

	/**
	 * Maybe load plugin update checker.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function plugin_update_checker() {
		if ( ! class_exists( 'Puc_v4p6_Factory' ) ) {
			return;
		}

		$defaults = $this->config[ self::PUC ];

		$plugin_update_checker = \Puc_v4_Factory::buildUpdateChecker(
			$defaults['repo'],
			$defaults['file'],
			$defaults['theme']
		);

		$plugin_update_checker->setBranch( $defaults['branch'] );

		if ( '' !== $defaults['token'] ) {
			$plugin_update_checker->setAuthentication( $defaults['token'] );
		}
	}

	/**
	 * Sets up the EDD theme updater config.
	 *
	 * @since 1.0.0
	 *
	 * @return EDDThemeUpdaterConfig
	 */
	public function edd_theme_updater() {
		return new EDDThemeUpdaterConfig( $this->config[ self::EDD ] );
	}

	/**
	 * Displays admin notice to enter license key.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function license_notice() {
		$settings  = $this->config[ self::EDD ];
		$license   = get_option( $settings['theme_slug'] . '_license_key_status' );
		$screen_id = get_current_screen()->id;
		$page_id   = 'appearance_page_' . $settings['theme_slug'] . '-license';

		if ( 'valid' === $license || $screen_id === $page_id ) {
			return;
		}

		printf(
			'<div class="notice notice-error"><p>%s <a href="%s">%s</a></p></div>',
			esc_html( $this->strings['notice_text'] ),
			admin_url( 'themes.php?page=' . $settings['theme_slug'] . '-license' ),
			esc_html( $this->strings['notice_link'] )
		);
	}

}

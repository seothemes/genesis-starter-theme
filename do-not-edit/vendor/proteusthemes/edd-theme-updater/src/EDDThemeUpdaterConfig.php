<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package pt-edd-theme-updater
 */

namespace ProteusThemes\EDDThemeUpdater;

class EDDThemeUpdaterConfig {

	/**
	 * EDDThemeUpdaterMain construct method.
	 *
	 * @param array $config Array of arguments from the theme requesting an update check.
	 */
	function __construct( $config = array() ) {

		$config = wp_parse_args( $config, array(
			'remote_api_url' => 'https://www.proteusthemes.com', // Site where EDD is hosted.
			'item_name'      => '', // Name of theme.
			'theme_slug'     => '', // Theme slug.
			'version'        => '', // The current version of this theme.
			'author'         => 'ProteusThemes', // The author of this theme.
			'download_id'    => '', // Optional, used for generating a license renewal link.
			'renew_url'      => '', // Optional, allows for a custom license renewal link.
		) );

		// Strings.
		$strings = array(
			'theme-license'             => esc_html__( 'Theme License', 'pt-edd-theme-updater' ),
			'enter-key'                 => esc_html__( 'Enter your theme license key.', 'pt-edd-theme-updater' ),
			'license-key'               => esc_html__( 'License Key', 'pt-edd-theme-updater' ),
			'license-action'            => esc_html__( 'License Action', 'pt-edd-theme-updater' ),
			'deactivate-license'        => esc_html__( 'Deactivate License', 'pt-edd-theme-updater' ),
			'activate-license'          => esc_html__( 'Activate License', 'pt-edd-theme-updater' ),
			'status-unknown'            => esc_html__( 'License status is unknown.', 'pt-edd-theme-updater' ),
			'renew'                     => esc_html__( 'Renew?', 'pt-edd-theme-updater' ),
			'unlimited'                 => esc_html__( 'unlimited', 'pt-edd-theme-updater' ),
			'license-key-is-active'     => esc_html__( 'License key is active.', 'pt-edd-theme-updater' ),
			'expires%s'                 => esc_html__( 'Expires %s.', 'pt-edd-theme-updater' ),
			'expires-never'             => esc_html__( 'Lifetime License.', 'pt-edd-theme-updater' ),
			'%1$s/%2$-sites'            => esc_html__( 'You have %1$s / %2$s sites activated.', 'pt-edd-theme-updater' ),
			'license-key-expired-%s'    => esc_html__( 'License key expired %s.', 'pt-edd-theme-updater' ),
			'license-key-expired'       => esc_html__( 'License key has expired.', 'pt-edd-theme-updater' ),
			'license-keys-do-not-match' => esc_html__( 'License keys do not match.', 'pt-edd-theme-updater' ),
			'license-is-inactive'       => esc_html__( 'License is inactive.', 'pt-edd-theme-updater' ),
			'license-key-is-disabled'   => esc_html__( 'License key is disabled.', 'pt-edd-theme-updater' ),
			'site-is-inactive'          => esc_html__( 'Site is inactive.', 'pt-edd-theme-updater' ),
			'license-status-unknown'    => esc_html__( 'License status is unknown.', 'pt-edd-theme-updater' ),
			'update-notice'             => esc_html__( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'pt-edd-theme-updater' ),
		);

		// Loads the updater classes.
		$updater = new EDDThemeUpdaterAdmin( $config, $strings );

		// WP actions.
		add_action( 'admin_notices', array( $this, 'edd_sample_theme_admin_notices' ) );
	}


	/**
	 * This is a means of catching errors from the activation method above and displyaing it to the customer
	 */
	function edd_sample_theme_admin_notices() {
		if ( isset( $_GET['sl_theme_activation'] ) && ! empty( $_GET['message'] ) ) {

			switch( $_GET['sl_theme_activation'] ) {

				case 'false':
					$message = urldecode( $_GET['message'] );
					?>
					<div class="error">
						<p><?php echo $message; ?></p>
					</div>
					<?php
					break;

				case 'true':
				default:

					break;

			}
		}
	}
}

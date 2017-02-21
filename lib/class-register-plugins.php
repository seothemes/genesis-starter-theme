<?php
/**
 * This file registers the required plugins for this theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// Add Require Plugins.
include_once( get_stylesheet_directory() . '/lib/class-plugin-activation.php' );

/**
 * Register required plugins.
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function starter_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		/**
		 * Add any recommended plugins here.
		 */
		array(
			'name'      => 'WordPress Importer',
			'slug'      => 'wordpress-importer',
			'required'  => true,
		),

		array(
			'name'      => 'Widget Importer',
			'slug'      => 'widget-importer-exporter',
			'required'  => true,
		),

		array(
			'name'      => 'WP-SCSS',
			'slug'      => 'wp-scss',
			'required'  => true,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'genesis-starter',       // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}


/**
 * Add notice to Customizer to install WP-SCSS
 * This file implements custom requirements for the Wp_Scss plugin.
 *
 * @package Wp_Scss-helpers
 */
if ( ! class_exists( 'Wp_Scss' ) ) {
	if ( class_exists( 'WP_Customize_Section' ) && ! class_exists( 'Register_Plugins' ) ) {
		/**
		 * Recommend the installation of Wp_Scss using a custom section.
		 *
		 * @see WP_Customize_Section
		 */
		class Register_Plugins extends WP_Customize_Section {
			/**
			 * Customize section type.
			 *
			 * @access public
			 * @var string
			 */
			public $type = 'Wp_Scss_installer';
			/**
			 * Render the section.
			 *
			 * @access protected
			 */
			protected function render() {
				// Determine if the plugin is not installed, or just inactive.
				$plugins   = get_plugins();
				$installed = false;
				foreach ( $plugins as $plugin ) {
					if ( 'Wp_Scss' === $plugin['Name'] || 'WP-SCSS' === $plugin['Name'] ) {
						$installed = true;
					}
				}
				// Get the plugin-installation URL.
				$plugin_install_url = add_query_arg(
					array(
						'action' => 'install-plugin',
						'plugin' => 'WP-SCSS',
					),
					self_admin_url( 'update.php' )
				);
				$plugin_install_url = wp_nonce_url( $plugin_install_url, 'install-plugin_Wp_Scss' );
				$classes = 'cannot-expand accordion-section control-section control-section-themes control-section-' . $this->type;
				?>
				<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="<?php echo esc_attr( $classes ); ?>" style="border-top:none;border-bottom:1px solid #ddd;padding:7px 14px 16px 14px;text-align:right;">
					<?php if ( ! $installed ) : ?>
						<p style="text-align:left;margin-top:0;"><?php esc_attr_e( 'A plugin is required to take advantage of this theme\'s features in the customizer.', 'textdomain' ); ?></p>
						<a class="install-now button-primary button" data-slug="Wp_Scss" href="<?php echo esc_url_raw( $plugin_install_url ); ?>" aria-label="<?php esc_attr_e( 'Install Wp_Scss Toolkit now', 'textdomain' ); ?>" data-name="Wp_Scss Toolkit">
							<?php esc_html_e( 'Install Now', 'textdomain' ); ?>
						</a>
					<?php else : ?>
						<p style="text-align:left;margin-top:0;"><?php esc_attr_e( 'You have installed WP-SCSS. Activate it to take advantage of this theme\'s features in the customizer.', 'textdomain' ); ?></p>
						<a class="install-now button-secondary button change-theme" data-slug="Wp_Scss" href="<?php echo esc_url_raw( self_admin_url( 'plugins.php' ) ); ?>" aria-label="<?php esc_attr_e( 'Activate Wp_Scss Toolkit now', 'textdomain' ); ?>" data-name="Wp_Scss Toolkit">
							<?php esc_html_e( 'Activate Now', 'textdomain' ); ?>
						</a>
					<?php endif; ?>
				</li>
				<?php
			}
		}
	} // End if().
	if ( ! function_exists( 'wp_scss_installer_register' ) ) {
		/**
		 * Registers the section, setting & control for the Wp_Scss installer.
		 *
		 * @param object $wp_customize The main customizer object.
		 */
		function wp_scss_installer_register( $wp_customize ) {
			$wp_customize->add_section( new Register_Plugins( $wp_customize, 'Wp_Scss_installer', array(
				'title'      => '',
				'capability' => 'install_plugins',
				'priority'   => 0,
			) ) );
			$wp_customize->add_setting( 'Wp_Scss_installer_setting', array(
				'sanitize_callback' => '__return_true',
			) );
			$wp_customize->add_control( 'Wp_Scss_installer_control', array(
				'section'    => 'Wp_Scss_installer',
				'settings'   => 'Wp_Scss_installer_setting',
			) );
		}
		add_action( 'customize_register', 'wp_scss_installer_register' );
	}
} // End if().

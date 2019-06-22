<?php
/**
 * Genesis Starter Theme
 *
 * WARNING: This file should never be modified under any circumstances.
 * Customizations should be made in the form of a core-functionality
 * plugin so that the theme can be updated without losing changes.
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\GenesisStarterTheme;

use SeoThemes\Core\Theme;

return [
	'config'  => [
		'base_path'            => dirname( __DIR__ ) . '/vendor/richtabor/',
		'base_url'             => get_stylesheet_directory_uri() . '/do-not-edit/vendor/richtabor/',
		'directory'            => 'merlin-wp',
		'merlin_url'           => 'genesis-starter-theme-setup',
//		'parent_slug'          => 'genesis',
		'capability'           => 'manage_options',
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes',
		'dev_mode'             => true,
		'license_step'         => true,
		'license_required'     => false,
		'license_help_url'     => '',
		'edd_remote_api_url'   => Theme::$config['updater']['edd']['remote_api_url'],
		'edd_item_name'        => Theme::$config['updater']['edd']['item_name'],
		'edd_theme_slug'       => Theme::$config['updater']['edd']['theme_slug'],
		'ready_big_button_url' => get_home_url(),
	],
	'strings' => [
		'admin-menu'               => esc_html__( 'Theme Setup', 'genesis-starter-theme' ),
		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'genesis-starter-theme' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'genesis-starter-theme' ),
		'ignore'                   => esc_html__( 'Disable this wizard', 'genesis-starter-theme' ),
		'btn-skip'                 => esc_html__( 'Skip', 'genesis-starter-theme' ),
		'btn-next'                 => esc_html__( 'Next', 'genesis-starter-theme' ),
		'btn-start'                => esc_html__( 'Start', 'genesis-starter-theme' ),
		'btn-no'                   => esc_html__( 'Cancel', 'genesis-starter-theme' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'genesis-starter-theme' ),
		'btn-child-install'        => esc_html__( 'Install', 'genesis-starter-theme' ),
		'btn-content-install'      => esc_html__( 'Install', 'genesis-starter-theme' ),
		'btn-import'               => esc_html__( 'Import', 'genesis-starter-theme' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'genesis-starter-theme' ),
		'btn-license-skip'         => esc_html__( 'Later', 'genesis-starter-theme' ),
		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'genesis-starter-theme' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'genesis-starter-theme' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'genesis-starter-theme' ),
		'license-label'            => esc_html__( 'License key', 'genesis-starter-theme' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'genesis-starter-theme' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'genesis-starter-theme' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'genesis-starter-theme' ),
		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'genesis-starter-theme' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'genesis-starter-theme' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'genesis-starter-theme' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'genesis-starter-theme' ),
		'child-header'             => esc_html__( 'Install Child Theme', 'genesis-starter-theme' ),
		'child-header-success'     => esc_html__( 'Child theme active!', 'genesis-starter-theme' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'genesis-starter-theme' ),
		'child-success%s'          => esc_html__( 'Your child theme has been installed successfully  and is now activated, if it wasn\'t already.', 'genesis-starter-theme' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'genesis-starter-theme' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'genesis-starter-theme' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'genesis-starter-theme' ),
		'plugins-header'           => esc_html__( 'Install Plugins', 'genesis-starter-theme' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'genesis-starter-theme' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'genesis-starter-theme' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'genesis-starter-theme' ),
		'plugins-action-link'      => esc_html__( 'Advanced', 'genesis-starter-theme' ),
		'import-header'            => esc_html__( 'Import Content', 'genesis-starter-theme' ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'genesis-starter-theme' ),
		'import-action-link'       => esc_html__( 'Advanced', 'genesis-starter-theme' ),
		'ready-header'             => esc_html__( 'All done. Have fun!', 'genesis-starter-theme' ),
		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'genesis-starter-theme' ),
		'ready-action-link'        => esc_html__( 'Extras', 'genesis-starter-theme' ),
		'ready-big-button'         => esc_html__( 'View your website', 'genesis-starter-theme' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', admin_url(), esc_html__( 'Admin Dashboard', 'genesis-starter-theme' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://genesiscustomizer.com/support/', esc_html__( 'Get Theme Support', 'genesis-starter-theme' ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'genesis-starter-theme' ) ),
	],
	'import'  => [
		[
			'import_file_name'             => 'Default',
			'local_import_file'            => dirname( __DIR__ ) . '/resources/demo/default/content.xml',
			'local_import_widget_file'     => dirname( __DIR__ ) . '/resources/demo/default/widgets.wie',
			'local_import_customizer_file' => dirname( __DIR__ ) . '/resources/demo/default/customizer.dat',
			'import_preview_image_url'     => 'https://seothemes.com/wp-content/uploads/genesis-starter-theme.png',
			'import_notice'                => __( 'A special note for this import.', 'genesis-starter-theme' ),
			'preview_url'                  => 'https://demo.seothemes.com/genesis-starter-theme',
		],
	],
];

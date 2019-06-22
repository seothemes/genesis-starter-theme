# EDD Theme updater - composer package

Used for activating the theme and offering automatic updates to the users via the EDD shop.

## Instructions

For each theme you have to define some parameters for the updater. You can hook it to the `after_setup_theme`:

```
/**
 * Load EDD theme updater.
 */
public function enable_edd_theme_updater() {
	$config = array(
		'remote_api_url' => 'https://www.your_site.com', // Site where EDD is hosted.
		'item_name'      => 'Theme name', // Name of theme.
		'theme_slug'     => 'themename-slug', // Theme slug.
		'version'        => '1.0.0', // The current version of this theme.
		'author'         => 'Author', // The author of this theme.
		'download_id'    => '', // Optional, used for generating a license renewal link.
		'renew_url'      => '', // Optional, allows for a custom license renewal link.
	);
	$edd_updater = new ProteusThemes\EDDThemeUpdater\EDDThemeUpdaterConfig( $config );
}
add_action( 'after_setup_theme', 'enable_edd_theme_updater' );
```
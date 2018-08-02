# Constants

Allows defining of child theme constants through configuration.

## Installation

This component should be installed using Composer, with the command `composer require d2/core-constants`.

## Usage

Within your config file (typically found at `config/defaults.php`), use the `Constants::DEFINE` class constant as an array key to add a list of constants to define.

For example:

```php
use D2\Core\Constants;

$constants = [
	Constants::DEFINE => [
		'CHILD_THEME_NAME'    => wp_get_theme()->get( 'Name' ),
		'CHILD_THEME_URL'     => wp_get_theme()->get( 'ThemeURI' ),
		'CHILD_THEME_VERSION' => wp_get_theme()->get( 'Version' ),
		'CHILD_THEME_HANDLE'  => wp_get_theme()->get( 'TextDomain' ),
		'CHILD_THEME_AUTHOR'  => wp_get_theme()->get( 'Author' ),
		'CHILD_THEME_DIR'     => get_stylesheet_directory(),
		'CHILD_THEME_URI'     => get_stylesheet_directory_uri(),
	],
];

return [
    Constants::class => $constants,
];
 ```

## Load the component

Components should be loaded in your theme `functions.php` file, using the `Theme::setup` static method. Code should run on the `after_setup_theme` hook (or `genesis_setup` if you use Genesis Framework).

```php
add_action( 'after_setup_theme', function() {
    $config = include_once __DIR__ . '/config/defaults.php';
    D2\Core\Theme::setup( $config );
} );
```
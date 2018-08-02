# Simple Social Icons

Sets default Simple Social Icon plugin values through configuration.

## Installation

This component should be installed using Composer, with the command `composer require d2/core-simple-social-icons`.

## Usage

Within your config file (typically found at `config/defaults.php`), use the `SimpleSocialIcons::DEFAULTS` class constant as an array key to set the Simple Social Icon plugin defaults.

For example:

```php
use D2\Core\SimpleSocialIcons;

$d2_simple_social_icons = [
	SimpleSocialIcons::DEFAULTS => [
		SimpleSocialIcons::NEW_WINDOW => 1,
		SimpleSocialIcons::SIZE       => 40,
	],
];

return [
    SimpleSocialIcons::class => $d2_simple_social_icons,
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
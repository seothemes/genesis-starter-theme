# Plugin Activator

Add recommended plugins to TGM Plugin Activation through configuration.

## Installation

This component should be installed using Composer, with the command `composer require d2/core-plugin-activator`.

## Usage

Within your config file (typically found at `config/defaults.php`), use the `PluginActivator::REGISTER` class constant as an array key to add a list of plugins to recommend.

For example:

```php
use D2\Core\PluginActivator;

$plugins = [
    PluginActivator::REGISTER => [
        'Genesis eNews Extended',
        'Genesis Simple FAQ',
        'Genesis Testimonial Slider',
        'Genesis Widget Column Classes',
        'Google Map',
        'Icon Widget',
        'One Click Demo Import',
        'Simple Social Icons',
        'WP Featherlight',
    ],
];

return [
    PluginActivator::class => $plugins,
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
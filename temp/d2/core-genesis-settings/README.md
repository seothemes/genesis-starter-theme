# Genesis Settings

Set defaults, or force Genesis theme settings through configuration.

## Installation

This component should be installed using Composer, with the command `composer require d2/core-genesis-settings`.

## Usage

Within your config file (typically found at `config/defaults.php`), use the `GenesisSettings::DEFAULTS` class constant as an array key to set the default Genesis settings, or use the `GenesisSettings::FORCE` class constant to force Genesis settings.

For example:

```php
use D2\Core\GenesisSettings;

$d2_genesis_settings = [
    GenesisSettings::FORCE   => [
        GenesisSettings::POSTS_NAV         => 'numeric',
        GenesisSettings::SEMANTIC_HEADINGS => 0,
    ],
    GenesisSettings::DEFAULTS => [
        GenesisSettings::SITE_LAYOUT => 'full-width-content',
    ],
];

return [
    GenesisSettings => $d2_genesis_settings,
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
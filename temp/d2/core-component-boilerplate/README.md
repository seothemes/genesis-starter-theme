# Component Boilerplate

Description of the components expected behavior.

## Installation

This component should be installed using Composer, with the command `composer require d2/core-component-boilerplate`.

## Usage

Within your config file (typically found at `config/defaults.php`), use the `Component` class as an array to add configuration to your theme.

For example:

```php
use D2\Core\ComponentBoilerplate;

$d2_components = [
	ComponentBoilerplate::ADD => [
		'component_key' => 'component_value',
	],
];

return [
    ComponentBoilerplate::class => $d2_components,
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
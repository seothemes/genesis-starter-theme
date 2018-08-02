# Google Fonts

Enqueues Google Fonts through configuration.

## Installation

This component should be installed using Composer, with the command `composer require d2/core-google-fonts`.

## Usage

Within your config file (typically found at `config/defaults.php`) define an array of page templates you would like to unregister.

There are already class constants defined for the Genesis archive and blog templates.

For example:

```php
use D2\Core\GoogleFonts;

$d2_google_fonts = [
    GoogleFonts::ENQUEUE => [
        'Source+Sans+Pro:400,600,700',
        'Montserrat:400,600',
    ],
];

return [
    GoogleFonts::class => $d2_google_fonts,
];
```

The above configuration will enqueue the following stylesheet:

```html
<link rel="stylesheet" id="google-fonts-css" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700|Montserrat:400,600" type="text/css" media="all">
```

## Load the component

Components should be loaded in your theme `functions.php` file, using the `Theme::setup` static method. Code should run on the `after_setup_theme` hook (or `genesis_setup` if you use Genesis Framework).

```php
add_action( 'after_setup_theme', function() {
    $config = include_once __DIR__ . '/config/defaults.php';
    D2\Core\Theme::setup( $config );
} );
```

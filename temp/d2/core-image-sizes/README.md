# Image Sizes

Adds image sizes to theme through configuration.

## Installation

This component should be installed using Composer, with the command `composer require d2/core-image-sizes`.

## Usage

Within your config file (typically found at `config/defaults.php`), use the `ImageSizes::ADD` class constant as an array key to add configuration to your theme.

For example:

 ```php
 use D2\Core\ImageSizes;
 
 $d2_image_sizes = [
     ImageSizes::ADD => [
         'featured' => [
             'width'  => 620,
             'height' => 380,
             'crop'   => true,
         ],
         'hero'     => [
             'width'  => 1280,
             'height' => 720,
             'crop'   => true,
         ],
     ],
 ];
 
 return [
     ImageSizes::class => $d2_image_sizes,
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
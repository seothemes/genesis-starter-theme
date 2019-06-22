# Core

[![WordPress](https://img.shields.io/badge/wordpress-4.9.8%20tested-brightgreen.svg)]() [![License](https://img.shields.io/badge/license-GPL--3.0--or--later-blue.svg)](https://github.com/seothemes/core/blob/master/LICENSE.md)

A config-based composer package that provides a set of modules to extend Genesis child theme development.

## Description

This library contains all of the core logic for our config-driven WordPress themes, such as the [Genesis Starter Theme](https://github.com/seothemes/genesis-starter-theme).

It contains two key classes:

* `Component` to be extended to build other components, and:
* `Theme` which is responsible for instantiating components and injecting the correct configuration.

The main purpose of this library is to provide a shareable codebase for commercial Genesis child themes. This is achieved by using configuration-based architecture to separate the theme's reusable logic from it's configuration. Using this approach, we are able to use a single codebase which can be heavily customized by passing in different configs. This project is inspired by the [Genesis Theme Toolkit](https://github.com/gamajo/genesis-theme-toolkit) by Gary Jones and [D2 Core](https://github.com/d2/core) by Craig Simpson, but contains additional functionality specific to commercial themes, including support for older versions of PHP.

## Requirements

| Requirement | How to Check | How to Install |
| :---------- | :----------- | :------------- |
| PHP >= 5.4 | `php -v` | [php.net](http://php.net/manual/en/install.php) |
| WordPress >= 4.8 | `Admin Footer` | [wordpress.org](https://codex.wordpress.org/Installing_WordPress) |
| Genesis >= 2.6 | `Theme Page` | [studiopress.com](http://www.shareasale.com/r.cfm?b=346198&u=1459023&m=28169&urllink=&afftrack=) |
| Composer >= 1.5.0 | `composer --version` | [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) |
| Node >= 9.10.1 | `node -v` | [nodejs.org](https://nodejs.org/) |
| NPM >= 5.6.0 | `npm -v` | [npm.js](https://www.npmjs.com/) |
| Yarn >= 0.2.x | `yarn -v` | [yarnpkg.com](https://yarnpkg.com/lang/en/docs/install/#mac-stable) |
| Gulp CLI >= 1.3.0 | `gulp -v` | [gulp.js](https://gulpjs.com/) |
| Gulp = 3.9.1 | `gulp -v` | [gulp.js](https://gulpjs.com/) |

## Installation

Include the package in your child theme's `composer.json` file (an example `composer.json` file can be found [here](https://github.com/seothemes/genesis-starter-theme/composer.json)).

```bash
composer require seothemes/core
```

Optionally install the TGMPA composer package:

```bash
composer require tgmpa/tgm-plugin-activation
```

## Usage

Components should be loaded in your theme `functions.php` file, using the `Theme::setup` static method. Code should run on the `after_setup_theme` hook (or `genesis_setup` if you use Genesis Framework).

```php
// Get config path.
$config = dirname( dirname( __DIR__ ) ) . '/config';

// Setup theme.
\SeoThemes\Core\Theme::setup( $config );
```

### Loading Components

Components are automatically loaded if a config file matching the component name in [kebab case](http://wiki.c2.com/?KebabCase) is found. For example, to load the GoogleFonts component, create a file in the `config` directory called `google-fonts.php`.

## Structure

Core follows the [PHP Package Development Standard](https://github.com/php-pds/skeleton_research) folder structure and uses [PSR-4 Autoloading](https://www.php-fig.org/psr/psr-4/).

```sh
./
├── src/
│   ├── Breadcrumb.php
│   ├── Component.php
│   ├── Enqueue.php
│   ├── GenesisSettings.php
│   ├── GoogleFonts.php
│   ├── ImageSizes.php
│   ├── Kirki.php
│   ├── Merlin.php
│   ├── PageLayouts.php
│   ├── PostTypeSupport.php
│   ├── SimpleSocialIcons.php
│   ├── Tgmpa.php
│   ├── Theme.php
│   ├── ThemeSupport.php
│   ├── Updater.php
│   └── WidgetAreas.php
├── .gitignore
├── composer.json
├── CHANGELOG.md
├── CONTRIBUTING.md
├── LICENSE.md
└── README.md
```

## Support

Please visit https://github.com/seothemes/core/issues/ to open a new issue.

## License

This project is licensed under the GNU General Public License - see the LICENSE.md file for details.

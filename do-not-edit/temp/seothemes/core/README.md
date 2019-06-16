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
add_action( 'genesis_setup', __NAMESPACE__ . '\\child_theme_setup', 15 );
/**
 * Child theme setup.
 *
 * Hooking to `genesis_setup` means we don't have to "start the engine"
 * by requiring the Genesis `lib/init.php` file, and it provides us
 * with access to all of Genesis functions once it's been loaded.
 *
 * @since 1.0.0
 *
 * @return void
 */
function child_theme_setup() {
	$vendor = require_once __DIR__ . '/vendor/autoload.php';
	$config = require_once __DIR__ . '/config/defaults.php';
	Theme::setup( $config );
}
```

## Structure

Core follows the [PHP Package Development Standard](https://github.com/php-pds/skeleton_research) folder structure and uses [PSR-4 Autoloading](https://www.php-fig.org/psr/psr-4/).

```sh
./
├── src/
│   ├── AssetLoader.php
│   ├── Breadcrumbs.php
│   ├── Component.php
│   ├── Constants.php
│   ├── Customizer.php
│   ├── CustomColors.php
│   ├── DemoImport.php
│   ├── GenesisSettings.php
│   ├── GoogleFonts.php
│   ├── HeroSection.php
│   ├── Hooks.php
│   ├── ImageSizes.php
│   ├── Kirki.php
│   ├── PageLayouts.php
│   ├── PageTemplate.php
│   ├── PostTypeSupport.php
│   ├── PluginActivation.php
│   ├── SimpleSocialIcons.php
│   ├── TextDomain.php
│   ├── Theme.php
│   ├── ThemeSupport.php
│   ├── WidgetArea.php
│   └── Widgets.php
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

## Authors

<a href="https://seothemes.com" target="_blank"><img src="https://seothemes.com/wp-content/uploads/2018/07/seothemes-genesis-starter-theme.png" alt="SEO Themes logo" width="150"></a> &nbsp; <a href="https://github.com/d2themes" target="_blank"><img src="https://seothemes.com/wp-content/uploads/2018/08/d2themes.png" alt="D2 Themes logo" width="150"></a>

See also the list of [contributors](https://github.com/seothemes/core/graphs/contributors) who participated in this project.

## Special Thanks

[Craig Simpson](https://github.com/d2themes), [Gary Jones](https://github.com/gamajo)

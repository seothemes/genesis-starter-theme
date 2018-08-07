# Genesis Starter Theme

[![WordPress](https://img.shields.io/badge/wordpress-4.9.7%20tested-brightgreen.svg)]() [![License](https://img.shields.io/badge/license-GPL--3.0--or--later-blue.svg)](https://github.com/seothemes/genesis-starter-theme/blob/master/LICENSE.md)

This is a developer-friendly starter theme used for creating commercial child themes for the Genesis Framework. Check out the [live demo](https://demo.seothemes.com/genesis-starter).

It uses Composer to pull in the [D2 Core](https://github.com/d2themes/core) component library which provides the logic for the theme's configuration, and it uses [Gulp WP Toolkit](https://github.com/craigsimps/gulp-wp-toolkit) to automate mundane build tasks like compiling SCSS and minifying images. Design and styles are based on the latest version of the [Genesis Sample Theme](https://demo.studiopress.com/genesis-sample). 

## Table of Contents

* [Features](#features)
* [Requirements](#requirements)
* [Installation](#installation)
    * [One line command](#one-line-command)
    * [Individual commands](#individual-commands)
* [Setup](#setup)
* [Usage](#usage)
* [Development](#development)
* [Structure](#structure)
* [Contributing](#contributing)
* [Authors](#authors)
* [Special Thanks](#special-thanks)

## Features

The Genesis Starter Theme aims to modernize, organize and enhance some aspects of Genesis child theme development. Take a look at what is waiting for you:

- [Mobile-first Sass](https://github.com/seothemes/genesis-starter-theme/tree/master/resources/scss) for stylesheets
- [Gulp](https://gulpjs.com/) for automating development build tasks
- [Browsersync](https://browsersync.io/) for synchronized browser testing
- [Config-based](https://www.alainschlesser.com/config-files-for-reusable-code/), OOP modular architecture
- [CLI setup script](#setup) to automatically update information
- [Yarn](https://yarnpkg.com/lang/en/docs/install/#mac-stable) or [NPM](https://www.npmjs.com/) for managing Node dependencies
- [Composer](https://getcomposer.org/) for managing PHP dependencies
- [PSR-4](https://www.php-fig.org/psr/psr-4/) autoloading
- [Namespaced](http://php.net/manual/en/language.namespaces.basics.php) to avoid naming conflicts

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

### One line command:

Install the latest development version of the Genesis Starter Theme using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
composer create-project seothemes/genesis-starter-theme your-theme-name dev-master && cd "$(\ls -1dt ./*/ | head -n 1)" && sh setup.sh
```

### Individual commands:

Install the latest development version of the Genesis Starter Theme using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
composer create-project seothemes/genesis-starter-theme your-theme-name dev-master
```

Navigate into the theme's root directory:

```shell
cd your-theme-name
```

Run the setup script to rename the theme, build the theme assets and kick-off BrowserSync:

```shell
sh setup.sh
```

## Setup

The Genesis Starter Theme includes a powerful setup script which automates the process of updating theme details:

<a href="https://github.com/seothemes/genesis-starter-theme/blob/master/setup.sh" target="_blank"><img src="https://seothemes.com/wp-content/uploads/2018/07/genesis-starter-theme-setup-script.png" alt="Genesis Starter Theme setup script" width="500"></a>

It replaces the following details with your own:

- Theme name
- Theme textdomain
- Theme author
- Theme author URL
- Theme development URL
- Theme namespace
- Theme version

## Usage

The Genesis Starter Theme is intended to be used with [D2 Core Components](https://packagist.org/packages/d2/). All changes to the child theme should be made via the theme configuration file. This can be used to change almost every aspect of the theme, including theme features, navigation menus, image sizes, widget areas and more. An example config file is included with this theme. 

The `app` directory is provided to house project-specific PHP files if additional functionality is required. It comes pre-configured with PSR-4 autoloading. Refer to the [App readme](https://github.com/seothemes/genesis-starter-theme/blob/master/app/README.md) for more information.

Project details such as theme name, author, version number etc should only ever be changed from the `package.json` file. The Gulp build task reads this file and automatically places the relevant information to the correct locations throughout the theme. 

Static assets are organized in the `resources` directory. This folder contains theme scripts, styles, images, fonts, views and language translation files.

## Development

Please refer to the [Gulp WP Toolkit Instructions](https://github.com/craigsimps/gulp-wp-toolkit#tasks) for a complete list of available build tasks.

In addition to Gulp WP Toolkit's tasks, there is also a `zip` task which can be used to generate an archive of your theme, including the required composer package files and none of the unnecessary files. The list of included files can be modified from the `toolkit.extendConfig.src.zip` config in the Gulpfile.

## Structure

```shell
your-theme-name/      # → Theme root directory
├── app/              # → Theme PHP files
│   └── README.md     # → App directory instructions
├── config/           # → Theme config directory
│   └── config.php    # → Theme settings
├── resources/        # → Front-end assets
│   ├── demo/         # → Theme demo files
│   ├── fonts/        # → Theme fonts
│   ├── img/          # → Theme images
│   ├── js/           # → Theme JavaScript
│   ├── lang/         # → Language translation files
│   ├── scss/         # → Sass partials
│   └── views/        # → Theme templates
├── node_modules/     # → Node.js packages (never edit)
├── vendor/           # → Composer packages (never edit)
├── composer.json     # → Composer settings (never edit)
├── functions.php     # → Composer autoloader
├── Gulpfile.js       # → Gulp config
├── package.json      # → Node.js dependencies
├── screenshot.png    # → Theme screenshot for WP admin
├── setup.sh          # → CLI setup script
├── style.css         # → Theme stylesheet
└── woocommerce.css   # → WooCommerce stylesheet
```

## Contributing

Contributions are welcome from everyone. We have [contributing guidelines](https://github.com/seothemes/genesis-starter-theme/blob/master/.github/CONTRIBUTING.md) to help you get started.

## Authors

<a href="https://seothemes.com" target="_blank"><img src="https://seothemes.com/wp-content/uploads/2018/07/seothemes-genesis-starter-theme.png" alt="SEO Themes logo" width="200"></a> &nbsp; <a href="https://github.com/d2themes" target="_blank" rel="nofollow"><img src="https://seothemes.com/wp-content/uploads/2018/08/d2themes.png" alt="D2 Themes logo" width="200"></a>

See also the list of [contributors](https://github.com/seothemes/genesis-starter-theme/graphs/contributors) who participated in this project.

## Special Thanks

A shout out to anyone who's code was used in or provided inspiration to this project:

<a href="https://github.com/craigsimps/" target="_blank">Craig Simpson</a>, 
<a href="https://github.com/christophherr/" target="_blank">Christoph Herr</a>, 
<a href="https://github.com/garyjones/" target="_blank">Gary Jones</a>, 
<a href="https://github.com/timothyjensen/" target="_blank">Tim Jensen</a>, 
<a href="https://github.com/billerickson/" target="_blank">Bill Erickson</a>, 
<a href="https://github.com/srikat/" target="_blank">Sridhar Katakam</a>, 
<a href="https://github.com/nathanrice/" target="_blank">Nathan Rice</a>, 
<a href="https://github.com/bgardner/" target="_blank">Brian Gardner</a>

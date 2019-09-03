# Genesis Starter Theme

[![WordPress](https://img.shields.io/badge/wordpress-4.9.8%20tested-brightgreen.svg)]() [![License](https://img.shields.io/badge/license-GPL--3.0--or--later-blue.svg)](https://github.com/seothemes/genesis-starter-theme/blob/master/LICENSE.md)

A developer-friendly starter theme used for creating commercial child themes for the Genesis Framework.

It uses [Gulp WP Toolkit](https://github.com/craigsimps/gulp-wp-toolkit) to automate mundane build tasks like compiling SCSS and minifying images.

Check out the [live demo](https://demo.seothemes.com/genesis-starter)

<img src="https://seothemes.com/wp-content/uploads/2018/09/starter-screenshot.png" alt="Genesis Starter Theme screenshot" width="500">

## Table of Contents

* [Features](#features)
* [Requirements](#requirements)
* [Installation](#installation)
    * [One line command](#one-line-command)
    * [Individual commands](#individual-commands)
* [Usage](#usage)
    * [Autoloading classes and files](#autoloading-classes-and-files)
* [Development](#development)
* [Structure](#structure)
* [Contributing](#contributing)
* [Authors](#authors)
* [Special Thanks](#special-thanks)

## Features

The Genesis Starter Theme aims to modernize, organize and enhance some aspects of Genesis child theme development. Take a look at what is waiting for you:

- [Bourbon](https://github.com/seothemes/genesis-starter-theme/tree/master/assets/scss) as a lightweight Sass toolkit
- [Gulp](https://gulpjs.com/) for automating development build tasks
- [Browsersync](https://browsersync.io/) for synchronized browser testing
- [Config-based](https://www.alainschlesser.com/config-files-for-reusable-code/), OOP modular architecture
- [CLI setup script](#setup) to automatically update information
- [Yarn](https://yarnpkg.com/lang/en/docs/install/#mac-stable) or [NPM](https://www.npmjs.com/) for managing Node dependencies
- [Composer](https://getcomposer.org/) for managing PHP dependencies
- [PSR-4](https://www.php-fig.org/psr/psr-4/) class autoloading
- [Namespaced](http://php.net/manual/en/language.namespaces.basics.php) to avoid naming conflicts
- [AMP](https://wordpress.org/plugins/amp/) support with the WordPress AMP plugin
- [Gutenberg](https://wordpress.org/plugins/gutenberg/) support for latest blocks and admin editor styles

## Requirements

| Requirement | How to Check | How to Install |
| :---------- | :----------- | :------------- |
| PHP >= 5.4 | `php -v` | [php.net](http://php.net/manual/en/install.php) |
| WordPress >= 5.2 | `Admin Footer` | [wordpress.org](https://codex.wordpress.org/Installing_WordPress) |
| Genesis >= 3.1.1 | `Theme Page` | [studiopress.com](http://www.shareasale.com/r.cfm?b=346198&u=1459023&m=28169&urllink=&afftrack=) |
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
composer create-project seothemes/genesis-starter-theme your-theme-name dev-master && cd "$(\ls -1dt ./*/ | head -n 1)" && npm install && gulp
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

Install node dependencies, build the theme assets and kick-off BrowserSync:

```shell
npm install && gulp
```

## Structure

```shell
your-theme-name/    # → Root directory
├── assets/         # → Front-end assets
├── config/         # → Config directory
├── lib/            # → Theme functions
│   ├── functions/  # → General functions
│   ├── plugins/    # → Plugin functions
│   ├── shortcodes/ # → Shortcode functions
│   ├── structure/  # → Structural functions
│   └── init.php    # → File autoloader 
├── templates/      # → Page templates
├── tests/          # → PHP Unit tests
├── vendor/         # → Composer packages
├── node_modules/   # → Node.js packages
├── composer.json   # → Composer settings
├── package.json    # → Node dependencies
├── Gulpfile.js     # → Gulp config
├── screenshot.png  # → Theme screenshot
├── functions.php   # → Loads init files
└── style.css       # → Blank stylesheet
```

## Usage

Project details such as theme name, author, version number etc should only ever be changed from the `package.json` file. The Gulp build task reads this file and automatically places the relevant information to the correct locations throughout the theme. 

Static assets are organized in the `assets` directory. This folder contains theme scripts, styles, images, fonts, views and language translation files. All of the main theme styles are contained in the `assets/css/main.css` file, the `style.css` file at the root of the theme is left blank intentionally. 

### Autoloading classes and files

#### Classes

The Genesis Starter Theme automatically loads classes placed in the `lib/classes/` directory via the Composer autoloader. Once you have added your additional files, run the following command to regenerate the autoloader:

```shell
composer dump-autoload --no-dev
```

#### Files

File loading is handled by the `lib/init.php` file. Simply add or remove files from the directory/filename array. 

## Development

Please refer to the [Gulp WP Toolkit Instructions](https://github.com/craigsimps/gulp-wp-toolkit#tasks) for a complete list of available build tasks.

In addition to Gulp WP Toolkit's tasks, there is also a `zip` task which can be used to generate an archive of your theme, including the required composer package files and none of the unnecessary files. The list of included files can be modified from the `toolkit.extendConfig.src.zip` config in the Gulpfile.

### Removing Commercial Features (coming soon)

This theme is intended to be used for commercial child theme development, however with a few tweaks it can be transformed into a lightweight, powerful starter theme for developers building custom one-off themes. Below is an example of how to strip out the commercial theme features:

**Remove Composer Packages**

Run the following command to remove unwanted Composer packages:

```shell
composer remove aristath/kirki
composer remove richtabor/merlin-wp
composer remove tgmpa/tgm-plugin-activation
composer remove proteusthemes/edd-theme-updater
composer update --no-dev
```

**Delete Config Files**

You will also want to delete some unneeded config files from the `do-not-edit/config` directory:

```shell
rm -Rf do-not-edit/config/kirki.php
rm -Rf do-not-edit/config/merlin.php
rm -Rf do-not-edit/config/tgmpa.php
rm -Rf do-not-edit/config/updater.php
```

## Contributing

Contributions are welcome from everyone. We have [contributing guidelines](https://github.com/seothemes/genesis-starter-theme/blob/master/.github/CONTRIBUTING.md) to help you get started.

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

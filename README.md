# Genesis Starter Theme

[![WordPress](https://img.shields.io/badge/wordpress-4.9.8%20tested-brightgreen.svg)]() [![License](https://img.shields.io/badge/license-GPL--3.0--or--later-blue.svg)](https://github.com/seothemes/genesis-starter-theme/blob/master/LICENSE.md)

A developer-friendly starter theme used for creating commercial child themes for the Genesis Framework.

It uses [Laravel Mix](https://laravel.com/docs/5.8/mix) as a build tool to automate mundane development tasks like compiling SCSS and minifying images.

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
- [Laravel Mix](https://laravel.com/docs/5.8/mix) for automating development build tasks
- [Browsersync](https://browsersync.io/) for synchronized browser testing
- [Config-based](https://www.alainschlesser.com/config-files-for-reusable-code/), OOP modular architecture
- [CLI setup script](#setup) to automatically update information
- [Yarn](https://yarnpkg.com/lang/en/docs/install/#mac-stable) or [NPM](https://www.npmjs.com/) for managing Node dependencies
- [Composer](https://getcomposer.org/) for managing PHP dependencies and autoloading
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

## Installation

### One line command:

Install the latest development version of the Genesis Starter Theme using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
composer create-project seothemes/genesis-starter-theme your-theme-name dev-master && cd "$(\ls -1dt ./*/ | head -n 1)" && npm install && npm run build
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
npm install && npm run build
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
├── webpack.mix.js  # → Laravel mix config
├── screenshot.png  # → Theme screenshot
├── functions.php   # → Loads init files
└── style.css       # → Blank stylesheet
```

## Usage

Project details such as theme name, author, version number etc should only ever be changed from the `package.json` file. Laravel Mix reads this file and automatically places the relevant information to the correct locations throughout the theme. 

Static assets are organized in the `assets` directory. This folder contains theme scripts, styles, images, fonts, views and language translation files. All of the main theme styles are contained in the `assets/css/main.css` file, the `style.css` file at the root of the theme is left blank intentionally and only contains the required stylesheet header comment. 

### Autoloading classes and files

#### Classes

The Genesis Starter Theme automatically loads classes placed in the `lib/classes/` directory via the Composer autoloader. Once you have added your additional files, run the following command to regenerate the autoloader:

```shell
composer dump-autoload --no-dev
```

#### Files

File loading is handled by the `lib/init.php` file. Simply add or remove files from the directory/filename array. 

## Development

Please refer to the [Laravel Mix](https://laravel.com/docs/5.8/mix) documentation for further information on how to use the `webpack.mix.js` file.

All build tasks are located in the theme's `package.json` file, under the *scripts* section.

## Contributing

Contributions are welcome from everyone. We have [contributing guidelines](https://github.com/seothemes/genesis-starter-theme/blob/master/.github/CONTRIBUTING.md) to help you get started.

See also the list of [contributors](https://github.com/seothemes/genesis-starter-theme/graphs/contributors) who participated in this project.

## Special Thanks

A shout out to anyone who's code was used in or provided inspiration to this project:

<a href="https://github.com/christophherr/" target="_blank">Christoph Herr</a>, 
<a href="https://github.com/garyjones/" target="_blank">Gary Jones</a>, 
<a href="https://github.com/hellofromtonya/" target="_blank">Tonya Mork</a>, 
<a href="https://github.com/timothyjensen/" target="_blank">Tim Jensen</a>, 
<a href="https://github.com/justintadlock/" target="_blank">Justin Tadlock</a> 

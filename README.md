# Genesis Starter Theme

This is a developer-friendly starter theme used for creating commercial child themes for the Genesis Framework. 

It uses the [Child Theme Library](https://github.com/seothemes/child-theme-library) to control all of the theme's logic which can be customized from the child theme's configuration file, and it uses [Gulp WP Toolkit](https://github.com/craigsimps/gulp-wp-toolkit) to automate mundane build tasks like compiling SCSS and minifying images. Design and styles are based on the latest version of the [Genesis Sample Theme](https://demo.studiopress.com/genesis-sample). 

Check out the live demo <a href="https://demo.seothemes.com/genesis-starter" target="_blank">here</a>.

A zipped, ready-to-install and supported version is a available for purchase at [seothemes.com](https://seothemes.com/themes/genesis-starter/)

### Requirements

| Requirement | How to Check | How to Install |
| :---------- | :----------- | :------------- |
| PHP >= 5.3 | `php -v` | [php.net](http://php.net/manual/en/install.php) |
| WordPress >= 4.8 | `Admin Footer` | [wordpress.org](https://codex.wordpress.org/Installing_WordPress) |
| Genesis >= 2.6 | `Theme Page` | [studiopress.com](http://www.shareasale.com/r.cfm?b=346198&u=1459023&m=28169&urllink=&afftrack=) |
| Composer >= 1.5.0 | `composer --version` | [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) |
| Node >= 9.10.1 | `node -v` | [nodejs.org](https://nodejs.org/) |
| NPM >= 5.6.0 | `npm -v` | [npm.js](https://www.npmjs.com/) |
| Yarn >= 0.2.x | `yarn -v` | [yarnpkg.com](https://yarnpkg.com/lang/en/docs/install/#mac-stable) |
| Gulp CLI >= 1.3.0 | `gulp -v` | [gulp.js](https://gulpjs.com/) |
| Gulp = 3.9.1 | `gulp -v` | [gulp.js](https://gulpjs.com/) |

## Installation

Install the Genesis Starter Theme using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
composer create-project seothemes/genesis-starter-theme your-theme-name dev-master
```

Navigate into the theme root directory:

```shell
cd your-theme-name
```

Run the setup script to rename the theme:

```shell
sh setup.sh
```

## Development

Navigate into the theme root directory:

```shell
cd your-theme-name
```

Run default Gulp task to kick-off development:

```shell
gulp
```

Refer to the [Gulp WP Toolkit Instructions](https://github.com/craigsimps/gulp-wp-toolkit#tasks) for a complete list of build tasks.

In addition to Gulp WP Toolkit's tasks, there is also a `zip` task which can be used to generate an archive of your theme, including the required composer package files and no unnecessary files. The list of included files can be modified from the `toolkit.extendConfig.src.zip` config in the Gulpfile.

## Structure

```shell
theme/  
├── assets/
│   ├── fonts/
│   ├── img/
│   ├── js/
│   ├── lang/
│   ├── scss/
│   └── views/
├── config/
│   └── config.php
├── .csscomb.json
├── .editorconfig
├── .gitattributes
├── .gitignore
├── .jsbeautifyrc
├── .jshintrc
├── .stylelintignore
├── CHANGELOG.md
├── composer.json
├── composer.lock
├── CONTRIBUTING.md
├── customizer.dat
├── functions.php
├── Gulpfile.js
├── LICENSE.md
├── package.json
├── package-lock.json
├── phpcs.xml.dist
├── README.md
├── sample.xml
├── screenshot.png
├── setup.sh
├── style.css
├── stylelint.config.js
├── widgets.wie
├── woocommerce.css
└── yarn.lock
```

## Support

Please visit https://github.com/seothemes/genesis-starter-theme/issues/ to open a new issue.

## License

This project is licensed under the GNU General Public License - see the LICENSE.md file for details.

## Authors

- **Lee Anthony** - [SEO Themes](https://seothemes.com/)

See also the list of [contributors](https://github.com/seothemes/genesis-starter-theme/graphs/contributors) who participated in this project.

## Acknowledgments

A shout out to anyone who's code was used in or provided inspiration to this project:

<a href="https://github.com/christophherr/" target="_blank">Christoph Herr</a>, 
<a href="https://github.com/garyjones/" target="_blank">Gary Jones</a>, 
<a href="https://github.com/craigsimps/" target="_blank">Craig Simpson</a>, 
<a href="https://github.com/timothyjensen/" target="_blank">Tim Jensen</a>, 
<a href="https://github.com/billerickson/" target="_blank">Bill Erickson</a>, 
<a href="https://github.com/srikat/" target="_blank">Sridhar Katakam</a>, 
<a href="https://github.com/cpaul007/" target="_blank">Chinmoy Paul</a>, 
<a href="https://github.com/nathanrice/" target="_blank">Nathan Rice</a>, 
<a href="https://github.com/bgardner/" target="_blank">Brian Gardner</a>

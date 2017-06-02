# Genesis Starter Theme

A search engine optimized, mobile-first starter theme for the Genesis Framework with a modern development workflow.


## Features

* Optimized HTML, CSS & JS output
* Sass for stylesheets
* Gulp for compiling assets, optimizing images
* Customizer support
* WooCommerce support
* Page Builder support
* Video background
* Page templates
* Front page content setting
* Front page order setting
* Front page widgets setting
* Footer widgets setting
* Flexible widget areas


## Requirements

* PHP > 5.6
* WordPress > 4.7
* Genesis Framework > 2.0
* Node.js > 6.9
* Gulp.js > 3.9


## Installation

1. Upload and install Genesis
2. Upload, install and activate Genesis Starter
3. Install and activate recommended plugins
4. Delete existing post, pages, comments & widgets
5. Import sample.xml from Tools > Import
6. Import widgets.wie from Tools > Widget Importer & Exporter
7. Go to Appearance > Customize > Site Identity to upload a logo
8. Go to Appearamce > Customize > Header Media to upload hero image or video
9. Go to Appearance > Customize > Menus to create menus
11. Go to Appearance > Customize > Static Front Page and configure to your liking
12. Go to Appearance > Customize > Site Layout and configure to your liking
13. Go to Genesis > Theme Settings and enable Breadcrumbs on all pages


## Widget Areas

* Before header
* Header right
* After header
* Primary sidebar
* Shop sidebar
* Before footer
* Front page (unlimited) 
* Footer widget (unlimited)


## Structure

```shell
theme/  
├── assets/
│   ├── fonts/
│   ├── images/
│   ├── scripts/
│   └── styles/
├── includes/
│   ├── class-clean-gallery.php
│   ├── class-optimizations.php
│   ├── class-plugin-activation.php
│   ├── customizer-settings.php
│   ├── customizer-output.php
│   ├── helper-functions.php
│   ├── theme-defaults.php
│   ├── widget-areas.php
│   └── woocommerce.php
├── languages/
│   └── genesis-starter.pot
├── templates/
│   ├── page-builder.php
│   └── page-landing.php
├── .editorconfig
├── CHANGELOG.md
├── front-page.php
├── functions.php
├── gulpfile.js
├── package.json
├── README.md
├── sample.xml
├── screenshot.png
├── style.css
├── style.css.map
└── widgets.wie
```


## Development

Genesis Starter uses [Gulp](http://gulpjs.com/) as a build tool and [npm](https://www.npmjs.com/) to manage front-end packages.

### Install dependencies

From the command line on your host machine, navigate to the theme directory then run `npm install`:

```shell
# @ themes/your-theme-name/
$ npm install
```

You now have all the necessary dependencies to run the build process.

### Build commands

* `gulp sass` — Compile, autoprefix and minify Sass files.
* `gulp scripts` — Minify javascript files.
* `gulp images` — Compress and optimize images.
* `gulp watch` — Compile assets when file changes are made, start Browsersync
* `gulp` — Default task - runs all of the above tasks.


#### Additional commands

* `gulp i18n` — Scan the theme and create a POT file.
* `gulp zip` — Package theme into zip file for distribution.

### Using Browsersync

To use Browsersync you need to update `dev_url` on line 43 of `gulpfile.js` to reflect your local development hostname.

If your local development URL is `my-site.dev`, update the file to read:

```javascript
...
  var dev_url = 'my-site.dev',
...
```


## Support

Please visit https://seothemes.net/support/ for theme support.

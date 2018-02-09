# Genesis Starter Theme

A search engine optimized, mobile-first, flexbox-based starter theme for the Genesis Framework with development automation tools. Demo - [https://demo.seothemes.com/genesis-starter](https://demo.seothemes.com/genesis-starter)


![Screenshot](https://s3-us-west-1.amazonaws.com/seo-themes/screenshot.png)

## Features

#### Automation

* BrowserSync to inject CSS and reload browser when file changes
* Automatically compile Sass, output minified and non-minifed stylesheets
* Combines CSS rules, selectors and media queries for the smallest minification possible
* Automatically optimizes PNG and JPG images
* Automatically translates theme into POT file
* Automatically concatenate JavaScript files into single file
* Automatically minify JavaScript files
* Automatically adds _:focus_ rules after every _:hover_ rule
* Gulp task for packaging theme into a distribution ZIP file
* Gulp task for bumping theme version
* Helpful Sass/SCSS partials, variables, mixins and functions included
* Contains POT file for internationalization (i18n)

#### Scripts & Styles

* 100% mobile-first, flexbox-based CSS 
* Pure CSS menu-toggle and sub-menu toggle buttons
* Includes the Genesis Responsive menu script
* Menu's combine into one on smaller screens
* Superfish menu for keyboard navigation and other accessibility enhancements
* Enqueues basic Google Font

#### Plugins

* Includes TGM Plugin Activation script for recommended plugins
* Full support for WooCommerce
* Only recommends Genesis Connect if WooCommerce is active
* Only loads WooCommerce styles on WooCommerce pages
* Uses Genesis Widget Column Classes for flexible layouts
* Built in support for [Simple Social Icons](https://en-au.wordpress.org/plugins/simple-social-icons/) and [Gravity Forms](http://www.gravityforms.com/) plugins
* Removes Simple Social Icons default stylesheets
* Adds mobile-first, flexbox Gravity Forms and Simple Social Icons SCSS
* Includes workaround to allow for different styling on multiple Simple Social Icons widgets

#### Customizer

* Custom Logo instead of Custom Header for better SEO
* Custom Header for uploading a page header background image or YouTube video
* Custom Colors with RGBA/transparency option
* Custom Layout included to easily extend the Genesis page layouts
* Includes CSS minification function to compress all inline CSS output by Customizer

#### Optimization

* Removes secondary sidebar widget area
* Removes the unnecessary (and discouraged) blog and archive templates
* Removes blog metabox from Genesis theme settings
* Removes all three-column page layouts
* Corrects the site title and logo schema microdata
* Corrects the Front Page 1 widget title schema microdata 

#### Modification

* Reposition child theme stylesheet to a later priority to override plugins
* Reposition primary navigation menu to the header right area
* Reposition the secondary navigation menu after the header
* Reposition footer widgets inside site footer for better semantics
* Reposition page title inside a custom 'page header' section

#### Templates

* Includes a widgetized, full-width front-page template
* Includes a full-width Page Builder template for use with plugins
* Includes a blank landing page template
* Includes a 404 page template to correct page title (until next Genesis update)

#### Advanced

* Follows WordPress coding standards _and_ StudioPress best practices
* Accessible skip links and read more links with descriptive screen-reader text
* Additional hooks added before and after Genesis structural wraps
* Includes a function to prevent automatic updates

## Recommendations

* PHP > 7.0
* WordPress > 4.8
* Genesis Framework > 2.4
* Node.js > 6.9
* NPM > 5.6.0
* Gulp.js > 3.9 

## Installation

1. Upload and install Genesis
2. Upload, install and activate Genesis Starter
3. Install and activate recommended plugins
4. *Important* Delete unwanted existing posts, pages, comments & widgets
5. Import sample.xml from Tools > Import
6. Import widgets.wie from Tools > Widget Importer & Exporter

## Renaming

The following instructions require the use of a text editor with search and replace functionality. You will need to perform a search and replace on all files in the theme folder. If using NPM, the theme should be renamed before running `npm install`. You do not want to edit any files in the `node_modules` directory.

1. Search and replace `genesis-starter` with your theme text domain.
2. Search and replace `genesis_starter_` with your theme function prefix.
3. Search and replace `Genesis Starter` with your theme name.

You can also use the Gulp [rename](#additional-commands) task included with the theme.

## Customization

1. Go to Appearance > Customize > Site Identity to upload a logo
2. Go to Appearamce > Customize > Header Media to upload hero image or video
3. Go to Appearance > Customize > Menus to create menus
4. Go to Appearance > Customize > Static Front Page and configure to your liking
5. Go to Appearance > Customize > Site Layout and configure to your liking
6. Go to Genesis > Theme Settings to enable Breadcrumbs on pages

## Widget Areas

* Header right
* Primary sidebar
* Before footer
* Front page (default 5) 
* Footer (default 3)

## Structure

```shell
theme/  
├── assets/
│   ├── fonts/
│   ├── images/
│   ├── scripts/
│   ├── scripts/
│   │   ├── concat/
│   │   └── min/
│   └── styles/
│       └── min/
├── includes/
│   ├── customize.php
│   ├── defaults.php
│   ├── extras.php
│   ├── header.php
│   ├── helpers.php
│   ├── plugins.php
│   ├── rgba.php
│   └── widgets.php
├── languages/
│   └── genesis-starter.pot
├── templates/
│   ├── page-blank.php
│   ├── page-builder.php
│   └── page-landing.php
├── .editorconfig
├── .gitignore
├── 404.php
├── CHANGELOG.md
├── front-page.php
├── functions.php
├── gulpfile.js
├── LICENSE.md
├── package.lock.json
├── package.json
├── README.md
├── sample.xml
├── screenshot.png
├── style.css
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

* `gulp styles` — Compile, autoprefix and minify Sass files.
* `gulp scripts` — Minify javascript files.
* `gulp images` — Compress and optimize images.
* `gulp watch` — Compile assets when file changes are made, start Browsersync
* `gulp` — (Default task) runs all of the above tasks.

#### Additional commands

* `gulp translate` — Scan the theme and create `languages.pot` POT file.
* `gulp zip` — Package theme into zip file for distribution, ignoring `node_modules`.
* `gulp bump` - Bumps version number in all files. See options in example below.
  - `--major` version when you make incompatible API changes
  - `--minor` version when you add functionality in a backwards-compatible manner
  - `--patch` version when you make backwards-compatible bug fixes
  - `--to` allows you to define a custom version number, e.g. `gulp bump --to 0.1.0`
* `gulp rename` - Rename theme Title, Text Domain and Function Prefix.
  - `--to` name for your theme e.g: `gulp rename --to your-theme-name`

### Using Browsersync

To use Browsersync you need to update the proxy URL in `gulpfile.js` to reflect your local development hostname.

If your local development URL is `my-site.dev`, update the file to read:

```javascript
...
  proxy: 'my-site.dev',
...
```

By default, BrowserSync is configured to use a HTTP connection. If you are using an SSL certificate for local development uncomment the HTTPS settings and change the proxy URL accordingly.

## Support

Please visit https://seothemes.com/support/ for theme support.

## Authors

- **Lee Anthony** - [SEO Themes](https://seothemes.com/)

See also the list of [contributors](https://github.com/seothemes/genesis-starter/graphs/contributors) who participated in this project.

## License

This project is licensed under the GNU General Public License - see the LICENSE.md file for details.

## Acknowledgments

A shout out to anyone who's code was used:

- Gary Jones
- Tim Jensen
- Craig Watson
- Bill Erickson
- Sridhar Katakam
- Chinmoy Paul
- Nathan Rice
- Calvin Koepke
- Jen Baumann
- Brian Gardner
- Robin Cornett

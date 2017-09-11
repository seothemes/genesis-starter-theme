# Genesis Starter Theme

A search engine optimized, mobile-first, flexbox-based starter theme for the Genesis Framework with a modern development workflow. Demo - [https://demo.seothemes.com/genesis-starter](https://demo.seothemes.com/genesis-starter)


![Screenshot](https://s3-us-west-1.amazonaws.com/seo-themes/screenshot.png)


## Features

* Fully responsive, lightweight menus with pure CSS menu-toggle buttons that combine into one on small screens.
* Superfish menu for keyboard navigation and other accessibility enhancements.
* Accessible skip links and read more links with descriptive screen-reader text.
* Mobile-first, flexbox-based CSS with combined rules, selectors and media queries for the smallest minification possible.
* Robust Gulpfile included for automatically compiling assets, optimizing images, i18n, theme zip packaging and more.
* Sass/SCSS partials, variables, mixins and functions included.
* Custom logo, header and background support with postMessage transport.
* Custom colors with RGBA/transparency settings.
* Front page Hero section widget area with custom background image or video upload.
* Flexbox-based widget areas that automatically adjust column widths.
* Built in support for [Simple Social Icons](https://en-au.wordpress.org/plugins/simple-social-icons/), [Gravity Forms](http://www.gravityforms.com/) plugins.
* Gravity Forms and Simple Social Icons CSS/SCSS reset.
* Contains POT file for internationalization (i18n)


## Recommendations

* PHP > 7.0
* WordPress > 4.8
* Genesis Framework > 2.4
* Node.js > 6.9
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
2. Search and replace `starter_` with your theme function prefix.
3. Search and replace `Genesis Starter` with your theme name.


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
│   └── styles/
├── includes/
│   ├── customize.php
│   ├── defaults.php
│   ├── header.php
│   ├── helpers.php
│   └── plugins.php
├── languages/
│   └── genesis-starter.pot
├── templates/
│   ├── page-landing.php
│   └── page-builder.php
├── .editorconfig
├── .gitignore
├── 404.php
├── CHANGELOG.md
├── front-page.php
├── functions.php
├── gulpfile.js
├── languages.pot
├── package.json
├── README.md
├── screenshot.png
└── style.css
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
* `gulp` — Default task - runs all of the above tasks.


#### Additional commands

* `gulp i18n` — Scan the theme and create `languages.pot` POT file.
* `gulp zip` — Package theme into zip file for distribution, ignoring `node_modules`.
* `gulp bump` - Bumps theme version in `package.json`, `style.css`, `style.scss` and `functions.php`. 


### Using Browsersync

To use Browsersync you need to update the proxy URL in `gulpfile.js` to reflect your local development hostname.

If your local development URL is `my-site.dev`, update the file to read:

```javascript
...
  proxy: 'my-site.dev',
...
```

By default, BrowserSync is configured to use an SSL certificate for local development. If using a Non-HTTPS local site, remove the HTTPS BrowserSync configuration and uncomment the HTTP settings.




## Support

Please visit https://seothemes.com/support/ for theme support.

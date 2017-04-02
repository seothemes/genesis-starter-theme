# Genesis Starter Theme

A search engine optimized starter theme for the Genesis Framework with a modern development workflow.


## Features

* Optimized HTML, CSS & JS output
* Sass for stylesheets
* Gulp for compiling assets, optimizing images
* Customizer toolkit
* WooCommerce support
* Hero section
* Video background
* Page templates


## Requirements

* PHP > 5.6
* WordPress > 4.7
* Genesis Framework > 2.0
* Node.js > 6.9
* Gulp.js > 3.9


## Installation

1. Upload the Genesis Starter theme folder via FTP to your wp-content/themes/ directory. (The Genesis parent theme needs to be in the wp-content/themes/ directory as well.)
2. Go to your WordPress dashboard and select Appearance.
3. Activate the Genesis Starter theme.
4. Inside your WordPress dashboard, go to Genesis > Theme Settings and configure them to your liking.
5. Inside your WordPress dashboard, go to Appearance > Customize and customize to your liking.


## Structure

```shell
theme/  
├── assets  
│   ├── demo/  
│   ├── fonts/  
│   ├── images/  
│   ├── scripts/  
│   └── styles/  
├── languages  
│   └── genesis-starter.pot  
├── lib/  
│   ├── classes/  
│   │   ├── class-genesis-hero.php  
│   │   └── class-require-plugins.php  
│   ├── clean-up/  
│   │   ├── clean-body-class.php  
│   │   ├── clean-gallery.php  
│   │   ├── clean-genesis.php  
│   │   ├── clean-jquery.php  
│   │   ├── clean-wordpress.php  
│   │   └── clean.php  
│   ├── customize/  
│   │   ├── customize-colors.php  
│   │   ├── customize-header.php  
│   │   ├── customize-typography.php  
│   │   ├── class-starter-kirki.php  
│   │   ├── include-kirki.php  
│   │   └── customize.php  
│   ├── demo-import.php  
│   ├── header-functions.php  
│   ├── theme-defaults.php  
│   ├── theme-setup.php  
│   ├── widget-areas.php  
│   └── woocommerce.php  
├── node_modules/  
├── templates/  
│   ├── image-widget.php/  
│   ├── page-narrow.php/  
│   └── page-wide.php/  
├── .editorconfig  
├── CHANGELOG.md  
├── functions.php  
├── gulpfile.js  
├── package.json  
├── README.md  
├── screenshot.png  
├── style.css  
└── style.css.map  
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


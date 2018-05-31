# Genesis Starter Theme

A search engine optimized, mobile-first, flexbox-based starter theme for the Genesis Framework with development automation tools.

Demo - [https://demo.seothemes.com/genesis-starter](https://demo.seothemes.com/genesis-starter)

## Recommendations

* PHP > 7.0
* WordPress > 4.8
* Genesis Framework > 2.4
* Node.js > 6.9
* NPM > 5.6.0
* Gulp.js > 3.9

### Requirements

<table width="100%">
	<thead>
		<tr>
			<th align="left" width="25%">Requirement</th>
			<th align="left" width="25%">How to Check</th>
			<th align="left" width="50%">How to Install</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>PHP >= 5.3</td>
			<td><code>php -v</code></td>
			<td><a href="http://php.net/manual/en/install.php" target="_blank">php.net</a></td>
		</tr>
		<tr>
			<td>Node.js 6.x</td>
			<td><code>node -v</code></td>
			<td><a href="http://nodejs.org/" target="_blank">nodejs.org</a></td>
		</tr>
		<tr>
			<td>yarn 0.2.x</td>
			<td><code>yarn -v</code></td>
			<td><code><a href="https://yarnpkg.com/en/docs/instal" target="_blank">Install Yarn</a></code></td>
		</tr>
		<tr>
			<td>Gulp CLI</td>
			<td><code>gulp -v</code></td>
			<td><code>npm install -g gulp-cli</td>
		</tr>
		<tr>
            <td>WordPress >= 4.8</td>
            <td><code>php -v</code></td>
            <td><a href="https://codex.wordpress.org/Installing_WordPress" target="_blank">WordPress.org</a></td>
        </tr>
        <tr>
            <td>Genesis >= 2.6</td>
            <td><code>php -v</code></td>
            <td><a href="http://www.shareasale.com/r.cfm?b=346198&u=1459023&m=28169&urllink=&afftrack=" target="_blank">Genesis Framework</a></td>
        </tr>
	</tbody>
</table>

## Installation

1. Do a "recursive" Git clone so that the child theme library will be added as a sub-module:

```shell
git clone --recurse-submodules https://github.com/seothemes/genesis-starter.git theme-name
```

2. Navigate into the theme directory:

```shell
cd theme-name
```

Install node modules:

```shell
yarn install
```

Run the setup script and follow the command prompt:

```shell
sh setup.sh
```

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
│   ├── js/
│   └── scss/
├── config/
│   └── config.php
├── lib/ # (https://github.com/seothemes/child-theme-library.git)
├── .csscomb.json
├── .editorconfig
├── .gitignore
├── .gitmodules
├── .jsbeautifyrc
├── .jshintrc
├── .stylelintignore
├── .stylelintscssrc.js
├── CHANGELOG.md
├── composer.json
├── customizer.dat
├── functions.php
├── Gulpfile.js
├── LICENSE.md
├── package.json
├── package.lock.json
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

To use Browsersync you need to update the proxy URL in `Gulpfile.js` to reflect your local development hostname.

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

# Genesis Starter Theme

This is a developer-friendly starter theme used for creating commercial child themes for the Genesis Framework. 

It uses the <a href="https://github.com/seothemes/child-theme-library" target="_blank">Child Theme Library</a> to control all of the theme's logic which can be customized from the child theme's configuration file. Styling is based on the latest version of the <a href="https://demo.studiopress.com/genesis-sample" target="_blank">Genesis Sample Theme</a>. This theme uses <a href="https://github.com/craigsimps/gulp-wp-toolkit" target="_blank">Gulp WP Toolkit</a> to automate mundane build tasks like compiling SCSS and minifying images.

Check out the live demo <a href="https://demo.seothemes.com/genesis-starter" target="_blank">here</a>.

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
			<td>Yarn 0.2.x</td>
			<td><code>yarn -v</code></td>
			<td><a href="https://yarnpkg.com/lang/en/docs/install/#mac-stable" target="_blank">yarnpkg.com</a></td>
		</tr>
		<tr>
			<td>Gulp CLI</td>
			<td><code>gulp -v</code></td>
			<td><a href="https://gulpjs.com/" target="_blank">gulpjs.com</a></td>
		</tr>
		<tr>
            <td>WordPress >= 4.8</td>
            <td><code>Admin Footer</code></td>
            <td><a href="https://codex.wordpress.org/Installing_WordPress" target="_blank">wordpress.org</a></td>
        </tr>
        <tr>
            <td>Genesis >= 2.6</td>
            <td><code>Theme Page</code></td>
            <td><a href="http://www.shareasale.com/r.cfm?b=346198&u=1459023&m=28169&urllink=&afftrack=" target="_blank">studiopress.com</a></td>
        </tr>
	</tbody>
</table>

## Installation

### Composer (recommended)

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

Run default Gulp task to kick-off development:

```shell
gulp
```

### Git

Do a "recursive" Git clone so that the child theme library will be added as a sub-module (replace `your-theme-name` below with the name of your theme):

```shell
git clone --recurse-submodules https://github.com/seothemes/genesis-starter-theme.git your-theme-name
```

Navigate into the theme root directory:

```shell
cd your-theme-name
```

Run the setup script to rename the theme:

```shell
sh setup.sh
```

Install node modules with yarn:

```shell
yarn install
```

Run default Gulp task to kick-off development:

```shell
gulp
```

### Manual

Download the zip file and upload to your WordPress installation.

Replace any occurrences of 'Genesis Starter Theme' with your theme name and 'genesis-starter-theme' with your theme's ID.

Open the theme in your Terminal and run `gulp` to kick off the build process.

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
├── [lib/](https://github.com/seothemes/child-theme-library.git)
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
├── composer.lock
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

## Support

Please visit https://github.com/seothemes/genesis-starter-theme/issues/ to open a new issue.

## Authors

<a href="https://github.com/seothemes/" target="_blank">Lee Anthony</a>

See also the list of <a href="https://github.com/seothemes/genesis-starter/graphs/contributors" target="_blank">contributors</a> who participated in this project.

## License

This project is licensed under the GNU General Public License - see the LICENSE.md file for details.

## Acknowledgments

A shout out to anyone who's code was used:

<a href="https://github.com/garyjones/" target="_blank">Gary Jones</a>, 
<a href="https://github.com/craigsimps/" target="_blank">Craig Simpson</a>, 
<a href="https://github.com/christophherr/" target="_blank">Christoph Herr</a>, 
<a href="https://github.com/timothyjensen/" target="_blank">Tim Jensen</a>, 
<a href="https://github.com/billerickson/" target="_blank">Bill Erickson</a>, 
<a href="https://github.com/srikat/" target="_blank">Sridhar Katakam</a>, 
<a href="https://github.com/cpaul007/" target="_blank">Chinmoy Paul</a>, 
<a href="https://github.com/cjkoepke/" target="_blank">Calvin Koepke</a>, 
<a href="https://github.com/nathanrice/" target="_blank">Nathan Rice</a>, 
<a href="https://github.com/dreamwhisper/" target="_blank">Jen Baumann</a>, 
<a href="https://github.com/bgardner/" target="_blank">Brian Gardner</a>

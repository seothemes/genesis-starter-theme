/**
 * Gulp task config file.
 */

'use strict';

var gulp    = require( 'gulp' ),
	pkg     = require( './package.json' ),
	globs   = require( 'gulp-src-ordered-globs' ),
	toolkit = require( 'gulp-wp-toolkit' ),
	zip     = require( 'gulp-zip' );

toolkit.extendConfig(
	{
		theme: {
			name: pkg.theme.name,
			themeuri: pkg.theme.uri,
			description: pkg.description,
			author: pkg.author,
			authoruri: pkg.theme.authoruri,
			version: pkg.version,
			license: pkg.license,
			licenseuri: pkg.theme.licenseuri,
			tags: pkg.theme.tags,
			textdomain: pkg.theme.textdomain,
			domainpath: pkg.theme.domainpath,
			template: pkg.theme.template,
			notes: pkg.theme.notes
		},
		src: {
			php: ['**/*.php', '!vendor/**'],
			images: 'resources/img/**/*',
			scss: 'resources/scss/**/*.scss',
			css: ['**/*.css', '!node_modules/**', '!develop/vendor/**'],
			js: ['resources/js/**/*.js', '!node_modules/**'],
			json: ['**/*.json', '!node_modules/**'],
			i18n: './resources/lang/',
			zip: [
				'./**/*',
				'!./*.zip',
				'!./git',
				'!./git/**/*',
				'!./node_modules',
				'!./node_modules/**/*',
				'!./vendor',
				'!./vendor/**/*',
				'./vendor/composer/*.php',
				'./vendor/composer/installed.json',
				'./vendor/seothemes/child-theme-library/src/*.php',
				'./vendor/tgmpa/tgm-plugin-activation/languages/*',
				'./vendor/tgmpa/tgm-plugin-activation/class-tgm-plugin-activation.php'
			]
		},
		css: {
			basefontsize: 10, // Used by postcss-pxtorem.
            remmediaquery: false,
			scss: {
				'style': {
					src: 'resources/scss/style.scss',
					dest: './',
					outputStyle: 'expanded'
				},
				'woocommerce': {
					src: 'resources/scss/woocommerce.scss',
					dest: './',
					outputStyle: 'expanded'
				}
			}
		},
		dest: {
            i18npo: './resources/lang/',
            i18nmo: './resources/lang/',
			images: './resources/img/',
			js: './resources/js/'
		},
		server: {
            proxy: 'https://genesis-starter.test',
            port: '8000',
            https: {
            	'key': '/Users/seothemes/.valet/Certificates/genesis-starter.test.key',
            	'cert': '/Users/seothemes/.valet/Certificates/genesis-starter.test.crt'
            }
		}
	}
);

toolkit.extendTasks( gulp, {
	'zip': function() {
		return globs(toolkit.config.src.zip, {base: './'}).
		pipe(zip(pkg.name + '-' + pkg.version + '.zip')).
		pipe(gulp.dest('../'));
	}
} );

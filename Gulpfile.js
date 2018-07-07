/**
 * Gulp task config file.
 *
 * @package SEOThemes\GenesisStarter
 */

'use strict';

var gulp    = require( 'gulp' ),
	pkg     = require( './package.json' ),
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
			images: 'assets/images/**/*',
			scss: 'assets/scss/**/*.scss',
			css: ['**/*.css', '!node_modules/**', '!develop/vendor/**'],
			js: ['assets/js/**/*.js', '!node_modules/**'],
			json: ['**/*.json', '!node_modules/**'],
			i18n: './assets/lang/',
			zip: [
				'./**/*',
				'!./*.zip',
				'!./node_modules',
				'!./node_modules/**/*',
				'!./vendor',
				'!./vendor/**/*',
				'!./git',
				'!./git/**/*',
				'!./lib/.git',
				'!./lib/.git/**/*'
			]
		},
		css: {
			basefontsize: 10, // Used by postcss-pxtorem.
            remmediaquery: false,
			scss: {
				'style': {
					src: 'assets/scss/style.scss',
					dest: './',
					outputStyle: 'expanded'
				},
				'woocommerce': {
					src: 'assets/scss/woocommerce/index.scss',
					dest: './',
					outputStyle: 'expanded'
				}
			}
		},
		dest: {
            i18npo: './assets/lang/',
            i18nmo: './assets/lang/',
			images: './assets/images/',
			js: './assets/js/'
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
		return gulp.src(toolkit.config.src.zip, {base: './'}).
		pipe(zip(pkg.name + '-' + pkg.version + '.zip')).
		pipe(gulp.dest('../'));
	}
} );

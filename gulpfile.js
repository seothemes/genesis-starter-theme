/**
 * Gulp task config file.
 *
 * @package SEOThemes\GenesisStarter
 */

'use strict';

let gulp    = require( 'gulp' ),
	csscomb = require( 'gulp-csscomb' ),
	pkg     = require( './package.json' ),
	toolkit = require( 'gulp-wp-toolkit' );

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
			textdomain: pkg.name,
			domainpath: pkg.theme.domainpath,
			template: pkg.theme.template,
			notes: pkg.theme.notes
		},
		src: {
			php: ['**/*.php', '!vendor/**'],
			images: 'assets/images/**/*',
			scss: 'assets/styles/**/*.scss',
			css: ['**/*.css', '!node_modules/**', '!develop/vendor/**'],
			js: ['assets/scripts/**/*.js', '!node_modules/**'],
			json: ['**/*.json', '!node_modules/**'],
			i18n: 'languages/'
		},
		css: {
			basefontsize: 10, // Used by postcss-pxtorem.
			scss: {
				'style': {
					src: 'assets/styles/index.scss',
					dest: './',
					outputStyle: 'expanded',
				},
				'style.min': {
					src: 'assets/styles/index.scss',
					dest: './assets/styles/min/',
					outputStyle: 'compressed',
				}
			},
		},
		js: {
			'theme': [
				'scripts/scripts/scripts.js'
			]
		},
		dest: {
			images: './assets/images/',
			js: './assets/scripts/min/'
		},
		server: {
			url: 'https://genesis-starter.test'
		}
	}
);

toolkit.extendTasks( gulp, {
	csscomb: function() {
			return gulp.src('./style.css')
				.pipe(csscomb())
				.pipe(gulp.dest('./'));
		},
} );

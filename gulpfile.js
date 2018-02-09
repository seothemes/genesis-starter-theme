//process.env.DISABLE_NOTIFIER = true; // Uncomment to disable all Gulp notifications.

/**		
 * Genesis Starter.		
 *		
 * This file adds gulp tasks to the Genesis Starter theme.		
 *		
 * @author SEO themes		
 */

// Require our dependencies.
var args         = require('yargs').argv,
	autoprefixer = require('autoprefixer'),
	browsersync  = require('browser-sync'),
	bump         = require('gulp-bump'),
	changecase   = require('change-case'),
	del          = require('del'),
	mqpacker     = require('css-mqpacker'),
	fs           = require('fs'),
	gulp         = require('gulp'),
	beautify     = require('gulp-cssbeautify'),
	cache        = require('gulp-cached'),
	cleancss     = require('gulp-clean-css'),
	concat       = require('gulp-concat'),
	csscomb      = require('gulp-csscomb'),
	cssnano      = require('gulp-cssnano'),
	filter       = require('gulp-filter'),
	imagemin     = require('gulp-imagemin'),
	notify       = require('gulp-notify'),
	pixrem       = require('gulp-pixrem'),
	plumber      = require('gulp-plumber'),
	postcss      = require('gulp-postcss'),
	rename       = require('gulp-rename'),
	replace      = require('gulp-replace'),
	s3           = require('gulp-s3-publish'),
	sass         = require('gulp-sass'),
	sort         = require('gulp-sort'),
	sourcemaps   = require('gulp-sourcemaps'),
	uglify       = require('gulp-uglify'),
	wpPot        = require('gulp-wp-pot'),
	zip          = require('gulp-zip'),
	focus        = require('postcss-focus');

// Set assets paths.
var paths = {
	all:     ['./**/*', '!./node_modules/', '!./node_modules/**', '!./screenshot.png', '!./assets/images/**'],
	concat:  ['assets/scripts/concat/*.js'],
	images:  ['assets/images/*', '!assets/images/*.svg'],
	php:     ['./*.php', './**/*.php', './**/**/*.php'],
	scripts: ['assets/scripts/scripts.js', 'assets/scripts/customize.js'],
	styles:  ['assets/styles/*.scss', '!assets/styles/min/']
};

/**
 * Compile WooCommerce styles.
 *
 * https://www.npmjs.com/package/gulp-sass
 */
gulp.task('woocommerce', function () {

	/**
	 * Process WooCommerce styles.
	 */
	gulp.src('assets/styles/woocommerce.scss')

		// Notify on error
		.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))

		// Initialize source map.
		.pipe(sourcemaps.init())

		// Process sass
		.pipe(sass({
			outputStyle: 'expanded'
		}))

		// Pixel fallbacks for rem units.
		.pipe(pixrem())

		// Parse with PostCSS plugins.
		.pipe(postcss([
			autoprefixer({
				browsers: 'last 2 versions'
			}),
			mqpacker({
				sort: true
			}),
			focus(),
		]))

		// Combine similar rules.
		.pipe(cleancss({
			level: {
				2: {
					all: true
				}
			}
		}))

		// Minify and optimize style.css again.
		.pipe(cssnano({
			safe: false,
			discardComments: {
				removeAll: true,
			},
		}))

		// Add .min suffix.
		.pipe(rename({
			suffix: '.min'
		}))

		// Write source map.
		.pipe(sourcemaps.write('./', {
			includeContent: false,
		}))

		// Output non minified css to theme directory.
		.pipe(gulp.dest('assets/styles/min/'))

		// Inject changes via browsersync.
		.pipe(browsersync.reload({
			stream: true
		}))

		// Filtering stream to only css files.
		.pipe(filter('**/*.css'))

		// Notify on successful compile (uncomment for notifications).
		.pipe(notify("Compiled: <%= file.relative %>"));

});

/**
 * Compile Sass.
 *
 * https://www.npmjs.com/package/gulp-sass
 */
gulp.task('styles', ['woocommerce'], function () {

	gulp.src('assets/styles/style.scss')

		// Notify on error
		.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))

		// Initialize source map.
		.pipe(sourcemaps.init())

		// Process sass
		.pipe(sass({
			outputStyle: 'expanded'
		}))

		// Pixel fallbacks for rem units.
		.pipe(pixrem())

		// Parse with PostCSS plugins.
		.pipe(postcss([
			autoprefixer({
				browsers: 'last 2 versions'
			}),
			mqpacker({
				sort: true
			}),
			focus(),
		]))

		// Format non-minified stylesheet.
		.pipe(csscomb())

		// Output non minified css to theme directory.
		.pipe(gulp.dest('./'))

		// Inject changes via browsersync.
		.pipe(browsersync.reload({
			stream: true
		}))

		// Process sass again.
		.pipe(sass({
			outputStyle: 'compressed'
		}))

		// Combine similar rules.
		.pipe(cleancss({
			level: {
				2: {
					all: true
				}
			}
		}))

		// Minify and optimize style.css again.
		.pipe(cssnano({
			safe: false,
			discardComments: {
				removeAll: true,
			},
		}))

		// Add .min suffix.
		.pipe(rename({
			suffix: '.min'
		}))

		// Write source map.
		.pipe(sourcemaps.write('./', {
			includeContent: false,
		}))

		// Output the compiled sass to this directory.
		.pipe(gulp.dest('assets/styles/min'))

		// Filtering stream to only css files.
		.pipe(filter('**/*.css'))

		// Notify on successful compile (uncomment for notifications).
		.pipe(notify("Compiled: <%= file.relative %>"));

});

/**
 * Concat javascript files.
 *
 * https://www.npmjs.com/package/gulp-uglify
 */
gulp.task('concat', function () {

	gulp.src(paths.concat)

		// Notify on error.
		.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))

		// Concatenate scripts.
		.pipe(concat('scripts.js'))

		// Output the processed js to this directory.
		.pipe(gulp.dest('assets/scripts'))

		// Inject changes via browsersync.
		.pipe(browsersync.reload({
			stream: true
		}))

} );

/**
 * Minify javascript files.
 *
 * https://www.npmjs.com/package/gulp-uglify
 */
gulp.task('scripts', ['concat'], function () {

	gulp.src(paths.scripts)

		// Notify on error.
		.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))

		// Source maps init.
		.pipe(sourcemaps.init())

		// Cache files to avoid processing files that haven't changed.
		.pipe(cache('scripts'))

		// Add .min suffix.
		.pipe(rename({
			suffix: '.min'
		}))

		// Minify.
		.pipe(uglify())

		// Write source map.
		.pipe(sourcemaps.write('./', {
			includeContent: false,
		}))

		// Output the processed js to this directory.
		.pipe(gulp.dest('assets/scripts/min'))

		// Inject changes via browsersync.
		.pipe(browsersync.reload({
			stream: true
		}))

		// Notify on successful compile.
		.pipe(notify("Minified: <%= file.relative %>"));

});

/**
 * Optimize images.
 *
 * https://www.npmjs.com/package/gulp-imagemin
 */
gulp.task('images', function () {

	return gulp.src(paths.images)

		// Notify on error.
		.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))

		// Cache files to avoid processing files that haven't changed.
		.pipe(cache('images'))

		// Optimize images.
		.pipe(imagemin({
			progressive: true
		}))

		// Output the optimized images to this directory.
		.pipe(gulp.dest('assets/images'))

		// Inject changes via browsersync.
		.pipe(browsersync.reload({
			stream: true
		}))

		// Notify on successful compile.
		.pipe(notify("Optimized: <%= file.relative %>"));

});

/**
 * Scan the theme and create a POT file.
 *
 * https://www.npmjs.com/package/gulp-wp-pot
 */
gulp.task('translate', function () {

	return gulp.src(paths.php)

		.pipe(plumber({
			errorHandler: notify.onError("Error: <%= error.message %>")
		}))

		.pipe(sort())

		.pipe(wpPot({
			domain: 'genesis-starter',
			destFile: 'genesis-starter.pot',
			package: 'Genesis Starter',
			bugReport: 'https://seothemes.com/support',
			lastTranslator: 'Lee Anthony <seothemeswp@gmail.com>',
			team: 'SEO Themes <seothemeswp@gmail.com>'
		}))

		.pipe(gulp.dest('./languages/'));

});

/**
 * Package theme.
 *
 * https://www.npmjs.com/package/gulp-zip
 */
gulp.task('zip', function () {

	gulp.src(['./**/*', '!./node_modules/', '!./node_modules/**', '!./aws.json'])
		.pipe(zip(__dirname.split("/").pop() + '.zip'))
		.pipe(gulp.dest('../'));

});

/**
 * Publish packaged theme to S3.
 *
 * https://www.npmjs.com/package/gulp-s3
 */
gulp.task('publish', function () {

	gulp.src('../genesis-starter.zip')
		.pipe(s3(aws));

});

/**
 * Rename theme.
 *
 * https://www.npmjs.com/package/change-case
 * https://www.npmjs.com/package/yargs
 */
gulp.task('rename', function () {

	var old_proxy = 'genesis-starter.dev',
		old_name = 'Genesis Starter',
		old_domain = 'genesis-starter',
		old_prefix = 'genesis_starter_',
		old_package = 'GenesisStarter';

	var new_proxy = args.to + '.dev',
		new_name = changecase.titleCase(args.to) + ' Pro',
		new_domain = changecase.paramCase(args.to) + '-pro',
		new_prefix = changecase.snakeCase(args.to) + '_pro',
		new_package = changecase.pascalCase(args.to) + 'Pro';

	del(['./languages/' + old_domain + '.pot']);

	gulp.src(paths.all)
		.pipe(replace(old_proxy, new_proxy))	
		.pipe(replace(old_name, new_name))
		.pipe(replace(old_domain, new_domain))
		.pipe(replace(old_prefix, new_prefix))
		.pipe(replace(old_package, new_package))
		.pipe(gulp.dest('./'));

});

/**
 * Bump version.
 *
 * https://www.npmjs.com/package/gulp-bump
 */
gulp.task('bump', function () {

	if (args.major) {
		var kind = 'major';
	}

	if (args.minor) {
		var kind = 'minor';
	}

	if (args.patch) {
		var kind = 'patch';
	}

	gulp.src(['./package.json', './style.css'])
		.pipe(bump({
			type: kind,
			version: args.to
		}))
		.pipe(gulp.dest('./'));

	gulp.src(['./functions.php'])
		.pipe(bump({
			key: "'CHILD_THEME_VERSION',",
			type: kind,
			version: args.to
		}))
		.pipe(gulp.dest('./'));

	gulp.src('./assets/styles/style.scss')
		.pipe(bump({
			type: kind,
			version: args.to
		}))
		.pipe(gulp.dest('./assets/styles/'));

});

/**
 * Process tasks and reload browsers on file changes.
 *
 * https://www.npmjs.com/package/browser-sync
 */
gulp.task('watch', function () {

	// HTTPS (optional).
	browsersync({
		proxy: 'http://genesis-starter.dev',
		port: 8000,
		notify: false,
		open: false,
		// https: {
		// 	"key": "/Users/seothemes/.valet/Certificates/genesis-starter.dev.key",
		// 	"cert": "/Users/seothemes/.valet/Certificates/genesis-starter.dev.crt"
		// }
	});

	// Run tasks when files change.
	gulp.watch(paths.styles, ['styles']);
	gulp.watch(paths.scripts, ['scripts']);
	gulp.watch(paths.images, ['images']);
	gulp.watch(paths.php).on('change', browsersync.reload);

});

/**
 * Create default task.
 */
gulp.task('default', ['watch'], function () {

	gulp.start('styles', 'scripts', 'images');

});


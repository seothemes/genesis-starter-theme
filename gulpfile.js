/**
 * Gulp tasks for the Genesis Starter theme.
 *
 * @author Seo Themes
 * @version 1.4.0
 */

'use strict';

// Require our dependencies.
var autoprefixer = require( 'autoprefixer' );
var browserSync  = require( 'browser-sync' );
var mqpacker 	 = require( 'css-mqpacker' );
var gulp         = require( 'gulp' );
var beautify  	 = require( 'gulp-cssbeautify' );
var cache        = require( 'gulp-cached' );
var cssnano 	 = require( 'gulp-cssnano');
var filter       = require( 'gulp-filter' );
var imagemin     = require( 'gulp-imagemin' );
var notify       = require( 'gulp-notify' );
var pixrem 		 = require( 'gulp-pixrem' );
var plumber      = require( 'gulp-plumber' );
var postcss 	 = require( 'gulp-postcss');
var rename       = require( 'gulp-rename' );
var sass         = require( 'gulp-sass' );
var sort 		 = require( 'gulp-sort' );
var sourcemaps   = require( 'gulp-sourcemaps' );
var uglify       = require( 'gulp-uglify' );
var wpPot 		 = require( 'gulp-wp-pot' );
var zip 		 = require( 'gulp-zip' );

// Set assets paths.
var js_src       = ['assets/scripts/*.js', '!assets/scripts/*.min.js'];
var js_dest      = 'assets/scripts/min';
var sass_src     = 'assets/styles/*.scss';
var sass_dest    = './';
var img_src      = ['assets/images/*', '!assets/images/*.svg'];
var img_dest     = 'assets/images';
var php_src		 = ['./*.php', './**/*.php', './**/**/*.php'];
var php_dest	 = './';

// Set BrowserSync proxy url.
var dev_url       = 'genesis-starter.dev';
var reload       = browserSync.reload;

/**
 * Autoprefixed browser support.
 *
 * https://github.com/ai/browserslist
 */
const AUTOPREFIXER_BROWSERS = [
	'last 2 version',
	'> 1%',
	'ie >= 9',
	'ie_mob >= 10',
	'ff >= 30',
	'chrome >= 34',
	'safari >= 7',
	'opera >= 23',
	'ios >= 7',
	'android >= 4',
	'bb >= 10'
];

/**
 * Compile Sass.
 *
 * https://www.npmjs.com/package/gulp-sass
 */
gulp.task( 'sass', function () {

    gulp.src( sass_src )

        // Notify on error
        .pipe( plumber( { errorHandler: notify.onError( "Error: <%= error.message %>" ) } ) )

        // Source maps init
        .pipe( sourcemaps.init() )

        // Process sass
        .pipe( sass( {
            outputStyle: 'expanded'
        } ) )

        // Pixel fallbacks for rem units.
		.pipe( pixrem() )

        // Parse with PostCSS plugins.
		.pipe( postcss( [
			autoprefixer( {
				browsers: AUTOPREFIXER_BROWSERS
			} ),
			mqpacker( {
				sort: true
			} ),
		] ) )

        // Minify and optimize style.css.
        .pipe(cssnano( {
        	safe: true // Use safe optimizations.
        } ) )

        // Write source map
        .pipe( sourcemaps.write( sass_dest ) )

        // Output the compiled sass to this directory
        .pipe( gulp.dest( sass_dest ) )

        // Filtering stream to only css files
        .pipe( filter( '**/*.css' ) )

        // Inject changes via browsersync
        .pipe( reload( {stream: true } ) )

        // Notify on successful compile (uncomment for notifications)
        .pipe( notify( "Compiled: <%= file.relative %>" ) );
} );

/**
 * Minify javascript files.
 *
 * https://www.npmjs.com/package/gulp-uglify
 */
gulp.task( 'scripts', function () {

    gulp.src( js_src )
        // Notify on error.
        .pipe( plumber( { errorHandler: notify.onError( "Error: <%= error.message %>" ) } ) )

        // Cache files to avoid processing files that haven't changed.
        .pipe( cache( 'scripts' ) )

        // Add .min suffix.
        .pipe( rename( { suffix: '.min' } ) )

        // Minify.
        .pipe( uglify() )

        // Output the processed js to this directory.
        .pipe( gulp.dest( js_dest ) )

        // Inject changes via browsersync.
        .pipe( reload( { stream: true } ) )

        // Notify on successful compile.
        .pipe( notify( "Minified: <%= file.relative %>" ) );
} );

/**
 * Optimize images.
 *
 * https://www.npmjs.com/package/gulp-imagemin
 */
gulp.task( 'images', function () {
    return gulp.src( img_src )
        // Notify on error.
        .pipe( plumber( {errorHandler: notify.onError( "Error: <%= error.message %>" ) } ) )

        // Cache files to avoid processing files that haven't changed.
        .pipe( cache( 'images' ) )

        // Optimise images.
        .pipe( imagemin( {
            progressive: true
        } ) )

        // Output the optimised images to this directory.
        .pipe( gulp.dest( img_dest ) )

        // Inject changes via browsersync.
        .pipe( reload( { stream: true } ) )

        // Notify on successful compile.
        .pipe( notify( "Optimised: <%= file.relative %>" ) );
} );

/**
 * Scan the theme and create a POT file.
 *
 * https://www.npmjs.com/package/gulp-wp-pot
 */
gulp.task( 'i18n', function() {
	return gulp.src( php_src )
	.pipe( plumber( { errorHandler: notify.onError( "Error: <%= error.message %>" ) } ) )
	.pipe( sort() )
	.pipe( wpPot( {
		domain: 'genesis-starter',
		destFile:'genesis-starter.pot',
		package: 'genesis-starter',
		bugReport: 'http://genesis-starter.com',
		lastTranslator: 'Lee Anthony <seothemeswp@gmail.com>',
		team: 'Seo Themes <seothemeswp@gmail.com>'
	} ) )
	.pipe( gulp.dest( 'languages/' ) );
} );

/**
 * Process tasks and reload browsers on file changes.
 *
 * https://www.npmjs.com/package/browser-sync
 */
gulp.task( 'watch', function() {

	// Kick off BrowserSync.
    browserSync( {
        proxy: dev_url,
        notify: false,
        open: false
    } );

    // Run tasks when files change.
    gulp.watch( [sass_src, 'assets/styles/**/*.scss'], ['sass'] );
    gulp.watch( js_src, ['scripts'] );
    gulp.watch( img_src, ['images'] );
    gulp.watch( php_src ).on( "change", reload );
} );

/**
 * Package theme.
 *
 * https://www.npmjs.com/package/gulp-zip
 */
gulp.task( 'zip', function() {

	gulp.src( '*.css' )

        // Beautify CSS.
        .pipe( beautify() )
	    .pipe( gulp.dest( './' ) );

	// Create zip file and ignore the following.
	gulp.src( [ './**/*', '!./node_modules/', '!./node_modules/**' ] )
		.pipe( zip( __dirname.split( "/" ).pop() + '.zip' ) )
		.pipe( gulp.dest( '../' ) );

} );

/**
 * Create default task.
 */
gulp.task( 'default', ['watch'], function() {
    gulp.start( 'sass', 'scripts', 'images' );
} );

/**
 * Gulp tasks for the Genesis Starter theme.
 *
 * @author Seo Themes
 * @version 1.4.0
 */

'use strict';

// Define all gulp plugins.
var gulp         = require( 'gulp' );
var sass         = require( 'gulp-sass' );
var sourcemaps   = require( 'gulp-sourcemaps' );
var cache        = require( 'gulp-cached' );
var imagemin     = require( 'gulp-imagemin' );
var filter       = require( 'gulp-filter' );
var autoprefixer = require( 'gulp-autoprefixer' );
var uglify       = require( 'gulp-uglify' );
var rename       = require( 'gulp-rename' );
var lineec       = require( 'gulp-line-ending-corrector' );
var notify       = require( 'gulp-notify' );
var mmq          = require( 'gulp-merge-media-queries' );
var beautify  	 = require( 'gulp-cssbeautify' );
var plumber      = require( 'gulp-plumber' );
var zip 		 = require( 'gulp-zip' );
var browserSync  = require( 'browser-sync' );
var reload       = browserSync.reload;

// Define file paths.
var js_src       = 'js/*.js';
var js_dest      = 'js/min';
var sass_src     = 'sass/*.scss';
var sass_dest    = './';
var img_src      = 'images/*';
var img_dest     = 'images';

// Define BrowserSync proxy url.
var bs_url       = 'genesis-starter.dev';

// Browsers you care about for autoprefixing.
// Browserlist https        ://github.com/ai/browserslist
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

// Sass.
gulp.task( 'sass', function () {

    gulp.src( sass_src )

        // Notify on error
        .pipe( plumber( {errorHandler: notify.onError( "Error: <%= error.message %>" )} ) )

        // Source maps init
        .pipe( sourcemaps.init() )

        // Process sass
        .pipe( sass( {
            outputStyle: 'compressed'
        } ) )

        // Autoprefix that css!
        .pipe( autoprefixer( AUTOPREFIXER_BROWSERS ) )

        // Write source map
        .pipe( sourcemaps.write( sass_dest ) )

        // Consistent Line Endings for non UNIX systems.
        .pipe( lineec() )

        // Output the compiled sass to this directory
        .pipe( gulp.dest(sass_dest) )

        // Filtering stream to only css files
        .pipe( filter( '**/*.css' ) )

        // Inject changes via browsersync
        .pipe( reload( {stream: true } ) )

        // Notify on successful compile (uncomment for notifications)
        .pipe( notify( "Compiled: <%= file.relative %>" ) );
} );

// Scripts.
gulp.task( 'scripts', function () {

    gulp.src(js_src)
        // Notify on error.
        .pipe( plumber( { errorHandler: notify.onError( "Error: <%= error.message %>") } ) )

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

// Images.
gulp.task( 'images', function () {
    return gulp.src(img_src)
        // Notify on error.
        .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")} ) )

        // Cache files to avoid processing files that haven't changed.
        .pipe(cache( 'images' ) )

        // Optimise images.
        .pipe(imagemin({
            progressive: true
        } ) )

        // Output the optimised images to this directory.
        .pipe(gulp.dest(img_dest) )

        // Inject changes via browsersync.
        .pipe(reload({stream: true} ) )

        // Notify on successful compile.
        .pipe(notify("Optimised: <%= file.relative %>") );
} );

// Browsersync.
gulp.task( 'browsersync', function() {
    browserSync({
        proxy: bs_url,
        notify: false
    } );

    // Watch for changes.
    gulp.watch( sass_src, ['sass'] );
    gulp.watch( js_src, ['scripts'] );
    gulp.watch( 'images/**/*', ['images'] );
    gulp.watch("**/*.php").on("change", reload);
} );

// Package theme.
gulp.task( 'zip', function() {

	gulp.src( '*.css' )

		// Merge media queries.
    	.pipe( mmq( {
        	log: true
        } ) )

        // Beautify CSS.
        .pipe( beautify() )
	    .pipe( gulp.dest( './' ) );

	// Create zip file and ignore the following.
	gulp.src( [ './**/*', '!./node_modules/', '!./node_modules/**' ] )
		.pipe( zip( __dirname.split("/").pop() + '.zip' ) )
		.pipe( gulp.dest( '../' ) );

} );

// Default task.
gulp.task( 'default', ['browsersync'], function() {
    gulp.start( 'sass', 'scripts', 'images' );
} );

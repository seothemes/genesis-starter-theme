process.env.DISABLE_NOTIFIER = true;

/**
 * Gulp task config file.
 */

var pkg     = require( './package.json' ),
    gulp    = require( 'gulp' ),
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
			textdomain: pkg.theme.textdomain,
			domainpath: pkg.theme.domainpath,
			template: pkg.theme.template,
			notes: pkg.theme.notes
		},
		src: {
			php: ['**/*.php', '!vendor/**'],
			images: './assets/img/**/*',
			scss: './assets/scss/**/*.scss',
			css: ['**/*.css', '!node_modules/**'],
			js: ['./assets/js/**/*.js', '!node_modules/**'],
			json: ['**/*.json', '!node_modules/**'],
			i18n: './assets/lang/',
			zip: [
				'./**/*',
				'!./*.zip',
				'!./git',
				'!./git/**/*',
				'!./node_modules',
				'!./node_modules/**/*',
				'!./vendor',
				'!./vendor/**/*'
			]
		},
		js: {
			'main': [
				'./assets/js/hide-show.js',
				'./assets/js/smooth-scroll.js',
				'./assets/js/sticky-header.js'
			]
		},
		css: {
			basefontsize: 10, // Used by postcss-pxtorem.
            remmediaquery: false,
            cssnano: {
                discardComments: {
                    removeAll: true
                },
                zindex: false
            },
			scss: {
                'style': {
                    src: './assets/scss/tools/_functions.scss',
                    dest: './',
                    outputStyle: 'expanded',
                    sourceMap: 'false'
                },
				'main': {
					src: './assets/scss/main.scss',
					dest: './assets/css/',
					outputStyle: 'compressed'
				},
                'editor': {
                    src: './assets/scss/editor.scss',
                    dest: './assets/css/',
                    outputStyle: 'compressed'
                },
                'woocommerce': {
                    src: './assets/scss/plugins/woocommerce/__index.scss',
                    dest: './assets/css/',
                    outputStyle: 'compressed'
                },
                'fontawesome': {
                    src: './assets/scss/plugins/fontawesome/__index.scss',
                    dest: './assets/css/',
                    outputStyle: 'compressed'
                }
			}
		},
		dest: {
            i18npo: './assets/lang/',
            i18nmo: './assets/lang/',
			images: './assets/img/',
			js: './assets/js/min/'
		},
		server: {
            notify: false,
            proxy: 'https://genesis-starter.test',
			// host: 'genesis-starter.test',
			open: 'external',
            port: '8000',
            https: {
            	   'key': '/Users/seothemes/.config/valet/Certificates/genesis-starter.test.key',
            	   'cert': '/Users/seothemes/.config/valet/Certificates/genesis-starter.test.crt'
            }
		}
	}
);

toolkit.extendTasks(gulp, { /* Task Overrides */ });

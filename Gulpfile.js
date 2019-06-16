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
			images: './do-not-edit/assets/img/**/*',
			scss: './do-not-edit/assets/scss/**/*.scss',
			css: ['**/*.css', '!node_modules/**'],
			js: ['./do-not-edit/assets/js/**/*.js', '!node_modules/**'],
			json: ['**/*.json', '!node_modules/**'],
			i18n: './do-not-edit/assets/lang/',
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
		css: {
			basefontsize: 10, // Used by postcss-pxtorem.
            remmediaquery: false,
			scss: {
                'style': {
                    src: './do-not-edit/assets/scss/tools/_functions.scss',
                    dest: './',
                    outputStyle: 'expanded',
                    sourceMap: 'false'
                },
				'main': {
					src: './do-not-edit/assets/scss/main.scss',
					dest: './do-not-edit/assets/css/',
					outputStyle: 'compressed'
				},
                'woocommerce': {
                    src: './do-not-edit/assets/scss/woocommerce/__index.scss',
                    dest: './do-not-edit/assets/css/',
                    outputStyle: 'compressed'
                }
			}
		},
		dest: {
            i18npo: './do-not-edit/assets/lang/',
            i18nmo: './do-not-edit/assets/lang/',
			images: './do-not-edit/assets/img/',
			js: './do-not-edit/assets/js/'
		},
		server: {
            proxy: 'https://genesis-starter.test',
			host: 'genesis-starter.test',
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

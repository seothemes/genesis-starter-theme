# Genesis Starter Theme Changelog

## [3.0.0-beta] - 2018-06-01
* Switch to Child Theme Library
* Switch to Gulp WP Toolkit

## [2.2.7] - 2018-02-09
* Add and run PostCSS auto focus gulp function
* Add support for search and 404 page settings
* Move widget area functions to own file
* Update README.md for postcss-focus gulp function
* Fix home page hero height at bigger breakpoints
* Fix date typo in changelog
* Fix Task 'i18n' is not in your gulpfile

## [2.2.6] - 2018-02-01
* Add basic support and styling for Gutenberg
* Add support for WooCommerce gallery features
* Add asset concatenation gulp task/combine front-end JS into single file
* Add Blank Page page template
* Add sourcemaps for WooCommerce styles
* Add Customizer data and jsbeautify config
* Fix hero-section removal in all page templates
* Fix hero-section CSS being output when no header image is set
* Fix strings in functions for gulp rename issue
* Fix hero-section height when nav-secondary is active
* Remove theme support for title-tag to fix SEO settings conflict
* Remove Gravity Forms CSS override

## [2.2.5] - 2017-01-12
* Add secondary color to Customizer
* Change default HTTP connection method for BrowserSync

## [2.2.4] - 2017-12-28
* Fix incorrect schema when title moved outside of entry

## [2.2.3] - 2017-10-08
* Add support for fixed header
* Add gulp rename task
* Add gulp bump task
* Update gulp build task
* Remove aws.json file from gulp publish task

## [2.2.2] - 2017-09-30
* Add support for fixed header
* Add theme.js file
* Add LICENSE.md file
* Update README.md
* Remove /inludes/header.php - moved to /includes/helpers.php and /functions.php
* Remove editor styles

## [2.2.1] - 2017-09-11
* Add structural wrap hooks function
* Improve styling for accessibility
* Update front page template

## [2.2.0] - 2017-09-10
* Add hero-section section
* Add custom 404 template
* Avoid hijacking the genesis flow on front page template
* Add custom header callback
* Add function to prevent updates
* Add editor style CSS
* Add column class variable to utilities.scss
* Update standards and restructure helper functions
* Remove gravity forms json file
* Fix responsive menu margin

## [2.1.0] - 2017-07-18
* Add RGBA customizer color settings
* Add custom page layout
* Add support for default structural wraps (removed custom)
* Improve support for Simple Social Icons
* Separate WooCommerce CSS from style.css
* Bring responsive menu script current with Genesis Sample
* Enable shortcodes in widgets by default
* Rename navigation menus to defaults
* Remove front page and footer customizer settings
* Remove complex functions from front-page.php
* Remove menus.php and sidebars.php
* Remove 'all' (*) selectors from stylesheet
* Remove postMessage customizer support (in favor of RGBA)
* Remove Cleaner Gallery from recommended plugins


## [2.0.1] - 2017-06-14
* Add custom nav menu function
* Add customize partial refresh support for site title and tagline
* Add `role="navigation"` to all menus
* Add `includes/menus.php` to organize menu related functions
* Menus, site title and tagline now have edit icons in customizer
* Combine Superfish with theme menu script to reduce requests
* Remove hoverIntent script
* Clean up gulp file
* Make front-page-1 full-screen with fix to prevent mobile jump

## [2.0.0] - 2017-06-13
* Add compatibility for WordPress 4.8 & Genesis 2.6
* Add support for new media widgets
* Add support for Superfish accessible menus
* Add CSS only menu and sub-menu toggle buttons
* Add Gravity Forms reset styles
* Add support for footer navigation menu
* Add support for no JavaScript menus
* Add Simple Social Icons CSS to theme and remove plugin CSS output for easy overwriting and to remove !important styles
* Add .gitignore for node modules, xml & wie files
* Add better support for WP Featherlight jQuery lightbox
* Switch everything to flexbox based CSS/SCSS where possible
* Switch to Genesis Sample style design for consistency
* Switch to Genesis Sample menu script for combining menus on mobile
* Upgrade all customizer settings to use postMessage
* Update to normalize.css v7.0.0 and combine selectors
* Rename `templates/` to `views/` for better organization (so it can contain more than templates)
* Move front-page.php to `views/` subfolder
* Move .pot file out of subfolder until translations are submitted
* Replace superfish args for nicer drop-down menus
* Replace all px with rem or em
* Remove Cleaner Gallery script and add theme support for plugin instead
* Remove 'Flexible Widget' functions, using flexbox CSS instead
* Reduce style.css from ~40kb to ~25kb, even with plugin styles

## [1.6.0] - 2017-06-02
* NEW: Add front-page, landing-page and page-builder templates
* NEW: Added front-page widgets and footer widgets customizer settings
* NEW: Added front-page customizer settings
* NEW: Added accessible 'read more' links with descriptive text
* Added 'dynamic widgets' functionality
* Added some helper functions
* Improved gulp configuration
* Move theme functionality back to functions.php
* Rename `lib/` to `includes/` 
* Remove 'Hero' section on inner pages - use plugin instead
* Remove Kirki customizer support 
* Remove Easy Widget Columns support
* Remove WP Page Widget support
* Remove WooCommerce support
* Remove optimizations class

## [1.5.0] - 2017-04-02
* Add video background feature
* Add WooCommerce support
* Add customizer colors
* Add customizer fonts
* Add sticky header customizer option
* Add one-click demo import
* Add new page templates
* Add 'i18n' gulp task
* Add back to top scroll button
* Add cleaner-gallery
* Add cleaner-body classes
* Add jquery cdn with local fallback
* Add support for Genesis Testimonials plugin
* Add support for Easy Widget Columns plugin
* Add custom logo schema microdata
* Update clean-up functions
* Update hero-section class
* Update gulp (postcss, cssnano & mqpacker)
* Update Sass, split-up partials
* Update assets, moved to /assets/ direcrory
* Update list of recommended plugins
* Remove front-page.php (now uses widgetized template)
* Remove front page widget areas (now uses Easy Widget Columns)
* Remove backstretch
* Remove compression class to avoid plugin conflicts
* Other minor improvements

## [1.4.0] - 2017-03-03
* Add backstretch
* Add autoprefix for more browsers
* Add 'zip' task to gulpfile
* Convert all custom functionality into theme features
* Move everything out of functions.php into correct file in /lib.
* Combine customize.php and output.php into custom-colors.php
* Rename theme-compression and plugin-activation classes

## [1.3.1] - 2017-02-26
* Add readme & changelog
* Update Gulpfile.js to enable theme packaging
* Remove font variables in functions.php

## [1.3.0] - 2017-02-26
* Remove WP-SCSS support
* Remove register-plugins.php (moved to class-plugin-activation.php)
* Remove Google Fonts Customizer support
* Add helper-functions.php
* Add output.php
* Add theme-defaults.php

## [1.2.0] - 2017-02-21
* Fix header image issues

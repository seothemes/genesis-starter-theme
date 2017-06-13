# Genesis Starter Theme Changelog

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
* Update gulpfile.js to enable theme packaging
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

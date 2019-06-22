# WP content importer used in OCDI and WP Merlin

List of files from the original repo:

- class-logger-cli.php,
- class-logger.php,
- class-wxr-importer.php


One click demo import plugin page: https://wordpress.org/plugins/one-click-demo-import/

One click demo import github page: https://github.com/proteusthemes/one-click-demo-import

WP Merlin: https://github.com/richtabor/MerlinWP


## Changelog

*February 7th 2018*
- Clean up the WXRImporter code
- Created a "wrapper" class `Importer.php` with additional functionality (importing by smaller parts -> users, categories, tags, terms and posts)
- tagging versin 2.0

*October 29th 2016*

- Cleaned up this forked repo, to only include the thing we need in the OCDI plugin.
- Changed the class names and use psr-4 autoloading in composer.json

*October 26th 2016*

- made a fork form the original repo
- merged a pull request for "term meta data" from the original repo: https://github.com/humanmade/WordPress-Importer/pull/18

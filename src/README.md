# Source Directory

This directory holds all of the source code for the theme.

Organize your theme's source code by it's single purpose, grouping like features and functionality into individual directories. This architectural structure improves the readability and reusability of your code.

For example, if you need:
 
- For custom post type and taxonomy, place those into a `custom` folder.  
- For metaboxes and settings/options screens, add those into an `admin` folder. 
- For theme served templates, add a `templates` folder.

Don't forget to separate concerns by keeping the business logic and HTML separate.  A `views` folder is available in the `assets` directory of your theme which should be used to house the HTML view files.
 
How about the root of the directory?

At the root of this directory, you typically place the theme's main controller.  This controller handles the routing of various tasks.

## Autoloading

This directory is pre-configured to use PSR-4 Autoloading for class files with the SEOThemes\GenesisStarterTheme namespace. See an example below:

```php
<?php

namespace SEOThemes\GenesisStarterTheme;

class Example {
	
	public function __construct() {
		
	}
	
}
```

The name of this file must be the same as the class, in this case it would be `Example.php`. The object can then be created from the `functions.php` file, without the use of a `require` statement. E.g:

```php
new Example();
``` 

*Note: To use a non-prefixed example like above, the functions.php file will also need to contain the SEOThemes\GenesisStarterTheme namespace at the beginning of the file.* 

If namespaces and classes are not your thing, there is also a simple file autoloader provided by the Child Theme Library. To use the file autoloader, add your file names to the 'autoload' config in the theme's configuration file.
    

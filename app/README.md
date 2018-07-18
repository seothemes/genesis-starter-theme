# App Directory

This directory holds all of the source code for your theme. It is pre-configured to use PSR-4 Autoloading for classes with the SEOThemes\GenesisStarterTheme namespace. Files and folders in this directory should be named using the PSR-4 naming convention, e.g `ClassName.php` or `ModuleName/ClassName.php`.
 
Below is an example class:

```php
<?php

namespace SEOThemes\GenesisStarterTheme;

class ClassName {
	
	public function __construct() {
		
		echo 'This is an example class';
		
	}
	
}
```

The name of this file must be the same as the class, in this case it would be a root level file named `ClassName.php`. Classes in subdirectories should add the name of the subdirectory to the namespace. For example, the `ModuleName/ClassName.php` file should use the following:

 ```php
 <?php
 
 namespace SEOThemes\GenesisStarterTheme\ModuleName;
 
 class ClassName {
 	
 	public function __construct() {
 		
 		echo 'This is an example class in a subdirectory';
 		
 	}
 	
 }
 ```
  
 These objects can then be created from any PHP file in your theme, without the use of a `require` statement. There are three different options when autoloading the classes:

Creating the object in the same namespace:

```php
namespace SEOThemes\GenesisStarterTheme;
new ClassName();
```
```php
namespace SEOThemes\GenesisStarterTheme;
new ModuleName\ClassName();
```

Importing/aliasing with the `use` operator:

```php
use SEOThemes\GenesisStarterTheme\ClassName;
new ClassName();
```
```php
use SEOThemes\GenesisStarterTheme\ModuleName\ClassName;
new ClassName();
```

Using the fully qualified class name:

```php
new SEOThemes\GenesisStarterTheme\ClassName();
```
```php
new SEOThemes\GenesisStarterTheme\ModuleName\ClassName();
```

If namespaces and classes are not your thing, there is also a simple file autoloader provided by the Child Theme Library. To use the file autoloader, add your file names to the `autoload` config in the theme configuration file. Using the file autoloader doesn't require the use of PSR-4 naming convention, so you are free to use a typical WordPress file name such as `custom-functions.php`. This file can then be automatically loaded by adding `app/custom-functions` to the autoload config array.
    

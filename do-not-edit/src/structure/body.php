<?php
/**
 * Genesis Starter Theme
 *
 * WARNING: This file should never be modified under any circumstances.
 * Customizations should be made in the form of a core-functionality
 * plugin so that the theme can be updated without losing changes.
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\GenesisStarterTheme;

add_filter( 'body_class', __NAMESPACE__ . '\body_classes' );
/**
 * Add additional classes to the body element.
 *
 * @since  3.4.0
 *
 * @param  array $classes Body classes.
 *
 * @return array
 */
function body_classes( $classes ) {
	$classes[] = 'no-js';

	return $classes;
}

add_action( 'genesis_before', __NAMESPACE__ . '\js_nojs_script', 1 );
/**
 * Echo out the script that changes 'no-js' class to 'js'.
 *
 * @since  3.4.0
 *
 * @return void
 */
function js_nojs_script() {
	?>
	<script>
        //<![CDATA[
        (function () {
            var c = document.body.classList;
            c.remove('no-js');
            c.add('js');
        })();
        //]]>
	</script>
	<?php
}



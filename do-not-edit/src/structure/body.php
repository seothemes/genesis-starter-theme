<?php

namespace SeoThemes\GenesisStarterTheme;

add_filter( 'body_class', __NAMESPACE__ . '\body_classes' );
/**
 * Add additional classes to the body element.
 *
 * @since  0.1.0
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
 * @since  1.0.0
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

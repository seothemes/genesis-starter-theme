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

	// Add no-js class.
	$classes[] = 'no-js';

	// Remove unnecessary page template classes.
	$template  = get_page_template_slug();
	$basename  = basename( $template, '.php' );
	$directory = str_replace( [ '/', basename( $template ) ], '', $template );
	$classes   = array_diff( $classes, [
		'page-template-' . $directory,
		'page-template-' . $directory . $basename . '-php',
	] );

	// Add blocks class.
	global $post;

	$blocks = \parse_blocks( $post->post_content );
	$has_h1 = search_blocks( $blocks );

	if ( $has_h1 ) {
		$classes[] = 'has-heading-block';
	}

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



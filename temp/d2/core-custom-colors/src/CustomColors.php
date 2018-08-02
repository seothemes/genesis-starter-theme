<?php
/**
 * Add color settings to Customizer.
 *
 * @package   D2\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2018, SEO Themes
 * @license   MIT
 */

namespace D2\Core;

/**
 * Add color settings to Customizer.
 *
 * Example config (usually located at config/defaults.php):
 *
 * ```
 * use D2\Core\CustomColors;
 *
 * $custom_colors = [
 *     'background' => [
 *         'default' => '#ffffff',
 *         'output'  => [
 *             [
 *                 'elements'   => [
 *                     'body',
 *                     '.site-container',
 *                 ],
 *                 'properties' => [
 *                     'background-color' => '%s',
 *                 ],
 *             ],
 *         ],
 *     ],
 * ];
 *
 * return [
 *     CustomColors::class => $custom_colors,
 * ];
 * ```
 */
class CustomColors extends Core {

	public function init() {

		add_action( 'customize_register', [ $this, 'add_settings' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'output_css' ], 100 );

	}

	/**
	 * Sets up the theme customizer sections, controls, and settings.
	 *
	 * @since  0.1.0
	 *
	 * @param  object $wp_customize Global customizer object.
	 *
	 * @return void
	 */
	public function add_settings( $wp_customize ) {

		foreach ( $this->config as $color => $settings ) {

			$setting = "child_theme_{$color}_color";
			$label   = ucwords( str_replace( '_', ' ', $color ) ) . __( ' Color', 'child-theme-library' );

			$wp_customize->add_setting(
				$setting,
				array(
					'default'           => $settings['default'],
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new \WP_Customize_Color_Control(
					$wp_customize,
					$setting,
					array(
						'section'  => 'colors',
						'label'    => $label,
						'settings' => $setting,
					)
				)
			);
		}
	}

	/**
	 * Logic to output customizer styles.
	 *
	 * @since  0.1.0
	 *
	 * @return void
	 */
	public function output_css() {

		$css = '';

		foreach ( $this->config as $color => $settings ) {

			$custom_color = get_theme_mod(
				"child_theme_{$color}_color",
				$settings['default']
			);

			if ( $settings['default'] !== $custom_color ) {

				foreach ( $settings['output'] as $rule ) {

					$counter = 0;

					foreach ( $rule['elements'] as $element ) {

						$comma = ( 0 === $counter ++ ? '' : ',' );
						$css  .= $comma . $element;

					}

					$css .= '{';

					foreach ( $rule['properties'] as $property => $pattern ) {

						$css .= $property . ':' . sprintf( $pattern, $custom_color ) . ';';

					}

					$css .= '}';

				}
			}
		}

		if ( ! empty( $css ) ) {

			wp_add_inline_style( get_stylesheet(), $this->minify_css( $css ) );

		}

	}

	/**
	 * Quick and dirty way to mostly minify CSS.
	 *
	 * @since  0.1.0
	 *
	 * @author Gary Jones
	 *
	 * @param  string $css CSS to minify.
	 *
	 * @return string Minified CSS
	 */
	public function minify_css( $css ) {

		// Normalize whitespace
		$css = preg_replace( '/\s+/', ' ', $css );

		// Remove spaces before and after comment
		$css = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css );

		// Remove comment blocks, everything between /* and */, unless
		// preserved with /*! ... */ or /** ... */
		$css = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $css );

		// Remove ; before }
		$css = preg_replace( '/;(?=\s*})/', '', $css );

		// Remove space after , : ; { } */ >
		$css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );

		// Remove space before , ; { } ( ) >
		$css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );

		// Strips leading 0 on decimal values (converts 0.5px into .5px)
		$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );

		// Strips units if value is 0 (converts 0px to 0)
		$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );

		// Converts all zeros value into short-hand
		$css = preg_replace( '/0 0 0 0/', '0', $css );

		// Shortern 6-character hex color codes to 3-character where possible
		$css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );

		return trim( $css );

	}

}

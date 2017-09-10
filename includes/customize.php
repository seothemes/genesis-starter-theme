<?php
/**
 * This file adds customizer settings to the Genesis Starter theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.com/themes/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

/*
 * Add any theme custom colors here.
 */
$starter_colors = array(
	'primary' => '#b0b5ba',
);

add_action( 'customize_register', 'starter_customize_register' );
/**
 * Sets up the theme customizer sections, controls, and settings.
 *
 * @access public
 * @param  object $wp_customize Global customizer object.
 *
 * @return void
 */
function starter_customize_register( $wp_customize ) {

	// Globals.
	global $wp_customize, $starter_colors;

	/**
	 * RGBA Color Picker Customizer Control
	 *
	 * This control adds a second slider for opacity to the stock
	 * WordPress color picker, and it includes logic to seamlessly
	 * convert between RGBa and Hex color values as opacity is
	 * added to or removed from a color.
	 */
	class RGBA_Customize_Control extends WP_Customize_Control {

		/**
		 * Official control name.
		 *
		 * @var string $type Control name.
		 */
		public $type = 'alpha-color';

		/**
		 * Add support for palettes to be passed in.
		 *
		 * Supported palette values are true, false,
		 * or an array of RGBa and Hex colors.
		 *
		 * @var array $palette Color palettes.
		 */
		public $palette;

		/**
		 * Add support for showing the opacity value on the slider handle.
		 *
		 * @var bool $show_opacity Show opacity.
		 */
		public $show_opacity;

		/**
		 * Enqueue scripts and styles.
		 *
		 * Ideally these would get registered and given proper paths
		 * before this control object gets initialized, then we could
		 * simply enqueue them here, but for completeness as a stand
		 * alone class we'll register and enqueue them here.
		 */
		public function enqueue() {

			wp_enqueue_script(
				'rgba-color-picker',
				get_stylesheet_directory_uri() . '/assets/scripts/min/customize.min.js',
				array( 'jquery', 'wp-color-picker' ),
				'1.0.0',
				true
			);

			wp_enqueue_style(
				'rgba-color-picker',
				get_stylesheet_directory_uri() . '/assets/styles/min/customize.min.css',
				array( 'wp-color-picker' ),
				'1.0.0'
			);

		}

		/**
		 * Render the control.
		 */
		public function render_content() {

			// Process the palette.
			if ( is_array( $this->palette ) ) {

				$palette = implode( '|', $this->palette );

			} else {

				// Default to true.
				$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';

			}

			// Support passing show_opacity as string or boolean. Default to true.
			$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';

			// Begin the output. 
			?>
			<label>
				<?php
				// Output the label and description if they were passed in.
				if ( isset( $this->label ) && '' !== $this->label ) {

					echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';

				}

				if ( isset( $this->description ) && '' !== $this->description ) {

					echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';

				}
				?>
				<input class="alpha-color-control" type="text" data-show-opacity="<?php echo esc_html( $show_opacity ); ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?>  />
			</label>
			<?php

		}

	}

	/**
	 * Custom colors.
	 *
	 * Loop through the global variable array of colors and
	 * register a customizer setting and control for each.
	 * To add additional color settings, do not modify this
	 * function, instead add your color name and hex value to
	 * the $starter_colors` array at the start of this file.
	 */
	foreach ( $starter_colors as $id => $rgba ) {

		// Format ID and label.
		$setting = "starter_{$id}_color";
		$label   = ucwords( str_replace( '_', ' ', $id ) ) . __( ' Color', 'starter-pro' );

		// Add color setting.
		$wp_customize->add_setting(
			$setting,
			array(
				'default'           => $rgba,
				'sanitize_callback' => 'sanitize_rgba_color',

			)
		);

		// Add color control.
		$wp_customize->add_control(
			new RGBA_Customize_Control(
				$wp_customize,
				$setting,
				array(
					'section'      => 'colors',
					'label'        => $label,
					'settings'     => $setting,
					'show_opacity' => true,
					'palette'      => array(
						'#000000',
						'#ffffff',
						'#dd3333',
						'#dd9933',
						'#eeee22',
						'#81d742',
						'#1e73be',
						'#8224e3',
					),
				)
			)
		);
	}
}

add_action( 'wp_enqueue_scripts', 'starter_customizer_output', 100 );
/**
 * Output customizer styles.
 *
 * Checks the settings for the colors defined in the settings.
 * If any of these value are set the appropriate CSS is output.
 *
 * @var   array $starter_colors Global theme colors.
 */
function starter_customizer_output() {

	// Set in customizer-settings.php.
	global $starter_colors;

	/**
	 * Loop though each color in the global array of theme colors
	 * and create a new variable for each. This is just a shorthand
	 * way of creating multiple variables that we can reuse. The
	 * benefit of using a foreach loop over creating each variable
	 * manually is that we can just declare the colors once in the
	 * `$starter_colors` array, and they can be used in multiple ways.
	 */
	foreach ( $starter_colors as $id => $hex ) {

		${"$id"} = get_theme_mod( "starter_{$id}_color",  $hex );

	}

	// Ensure $css var is empty.
	$css = '';

	/**
	 * Build the CSS.
	 *
	 * We need to concatenate each one of our colors to the $css
	 * variable, but first check if the color has been changed by
	 * the user from the theme customizer. If the theme mod is not
	 * equal to the default color then the string is appended to $css.
	 */
	$css .= ( $starter_colors['primary'] !== $primary ) ? sprintf( '

		.button:hover,
		button:hover,
		input[type="button"]:hover,
		input[type="reset"]:hover,
		input[type="submit"]:hover,
		.button.secondary,
		button.secondary,
		.archive-pagination a:hover,
		.archive-pagination .active a,
		.sidebar-primary .widget:first-of-type input[type="button"],
		.sidebar-primary .widget:first-of-type input[type="submit"] {
			background-color: %1$s;
		}

		a,
		.entry-title a:hover,
		.menu-item a:hover,
		.menu-item.current-menu-item > a {
			color: %1$s;
		}		

		', $primary ) : '';

	// Style handle is the name of the theme.
	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

	// Output CSS if not empty.
	if ( ! empty( $css ) ) {

		// Add the inline styles, also minify CSS first.
		wp_add_inline_style( $handle, starter_minify_css( $css ) );

	}

}

<?php

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
		if ( isset( $this->label ) && '' !== $this->label ) {

			echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';

		}

		?>
        <label>
			<?php
			if ( isset( $this->description ) && '' !== $this->description ) {

				echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';

			}
			?>
            <input class="alpha-color-control" type="text" data-show-opacity="<?php echo esc_html( $show_opacity ); ?>"
                   data-palette="<?php echo esc_attr( $palette ); ?>"
                   data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?> />
        </label>
		<?php

	}

}
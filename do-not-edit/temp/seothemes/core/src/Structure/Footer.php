<?php

namespace SeoThemes\Core\Structure;

use SeoThemes\Core\Component;

class Footer extends Component {

	const REPOSITION_WIDGETS = 'reposition-widgets';
	const FOOTER_CREDITS     = 'footer-credits';
	const BACK_TO_TOP        = 'back-to-top';

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init() {
		if ( isset( $this->config[ self::REPOSITION_WIDGETS ] ) ) {
			remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
			add_action( 'child_theme_before_footer_wrap', 'genesis_footer_widget_areas' );
		}

		if ( isset( $this->config[ self::FOOTER_CREDITS ] ) ) {
			add_filter( 'genesis_structural_wrap-footer', [ $this, 'footer_credits' ], 10, 2 );
		}
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @param $output
	 * @param $original_output
	 *
	 * @return string
	 */
	function footer_credits( $output, $original_output ) {
		if ( 'open' == $original_output ) {
			$output = '<div class="footer-credits">' . $output;
		} elseif ( 'close' == $original_output ) {
			$output    = $output . $output;
			$backtotop = isset( $this->config[ self::FOOTER_CREDITS ][ self::BACK_TO_TOP ] ) ? $this->config[ self::FOOTER_CREDITS ][ self::BACK_TO_TOP ] : false;

			if ( $backtotop ) {
				$link = sprintf(
					'<a href="%s" rel="nofollow" class="%s">%s</a>',
					$backtotop['url'],
					$backtotop['class'],
					$backtotop['text']
				);

				$output = $link . $output;
			}
		}

		return $output;
	}
}

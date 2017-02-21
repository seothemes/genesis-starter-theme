<?php
/**
 * Compress HTML, inline CSS and inline JS.
 *
 * This file adds compression functionality to the Genesis Starter theme.
 *
 * @package      Genesis Starter
 * @version      1.1.2
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

/**
 * Theme_Compression Class
 *
 * @package      Genesis Starter
 * @author       Seo Themes
 */
class Theme_Compression {

	/**
	 * CSS settings
	 *
	 * @var boolean
	 */
	protected $compress_css = true;

	/**
	 * JS settings
	 *
	 * @var boolean
	 */
	protected $compress_js = true;

	/**
	 * Comment settings
	 *
	 * @var boolean
	 */
	protected $info_comment = true;

	/**
	 * Remove comments
	 *
	 * @var boolean
	 */
	protected $remove_comments = true;

	/**
	 * HTML variable
	 *
	 * @var [type]
	 */
	protected $html;

	/**
	 * Constructor
	 *
	 * @param object $html HTML Object.
	 */
	public function __construct( $html ) {

		if ( ! empty( $html ) ) {

			$this->parse_html( $html );
		}
	}

	/**
	 * Convert to string
	 *
	 * @return string Convert to string.
	 */
	public function __toString() {

		return $this->html;
	}

	/**
	 * Minify HTML
	 *
	 * @param  string $html Current html.
	 * @return string $html Minified html.
	 */
	protected function minify_html( $html ) {

		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all( $pattern, $html, $matches, PREG_SET_ORDER );
		$overriding = false;
		$raw_tag = false;

		// Variable reused for output.
		$html = '';

		foreach ( $matches as $token ) {

			$tag = ( isset( $token['tag'] ) ) ? strtolower( $token['tag'] ) : null;
			$content = $token[0];

			if ( is_null( $tag ) ) {

				if ( ! empty( $token['script'] ) ) {

					$strip = $this->compress_js;

				} elseif ( ! empty( $token['style'] ) ) {

					$strip = $this->compress_css;

				} elseif ( '<!--wp-html-compression no compression-->' === $content ) {

					$overriding = ! $overriding;

					// Don't print the comment.
					continue;

				} elseif ( $this->remove_comments ) {

					if ( ! $overriding && 'textarea' !== $raw_tag ) {

						// Remove any HTML comments, except MSIE conditional comments.
						$content = preg_replace( '/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content );
					}
				}
			} else {

				if ( 'pre' === $tag || 'textarea' === $tag || 'script' === $tag ) {

					$raw_tag = $tag;

				} elseif ( '/pre' === $tag || '/textarea' === $tag || '/script' === $tag ) {

					$raw_tag = false;

				} else {

					if ( $raw_tag || $overriding ) {

						$strip = false;

					} else {

						$strip = true;

						// Remove any empty attributes, except action, alt, content, src.
						$content = preg_replace( '/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content );

						// Remove any space before the end of self-closing XHTML tags. JS excluded.
						$content = str_replace( ' />', '/>', $content );
					}
				}
			} // End if().
			if ( $strip ) {
				$content = $this->remove_white_space( $content );
			}

			$html .= $content;

		} // End foreach().
		return $html;

	}

	/**
	 * Parse HTML
	 *
	 * @param  string $html Built up HTML.
	 */
	public function parse_html( $html ) {

		$this->html = $this->minify_html( $html );
	}

	/**
	 * Remove White Space
	 *
	 * @param  string $str String containing HTML.
	 * @return string $str Stripped HTML.
	 */
	protected function remove_white_space( $str ) {

		$str = str_replace( "\n",  '', $str );
		$str = str_replace( "\t", '', $str );
		$str = str_replace( "\r",  '', $str );

		while ( stristr( $str, '  ' ) ) {

			$str = str_replace( '  ', ' ', $str );
		}

		return $str;
	}
}

/**
 * Finish compression
 *
 * @param  string $html Theme_Compression settings.
 * @return object Theme_Compression
 */
function wp_html_compression_finish( $html ) {

		return new Theme_Compression( $html );
}

/**
 * Start compression
 */
function wp_html_compression_start() {

		ob_start( 'wp_html_compression_finish' );
}
add_action( 'get_header', 'wp_html_compression_start' );

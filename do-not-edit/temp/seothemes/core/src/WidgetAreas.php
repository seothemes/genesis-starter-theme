<?php
/**
 * Register, unregister and display widget areas through configuration.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class WidgetAreas
 *
 * @package SeoThemes\Core
 */
class WidgetAreas extends Component {

	const REGISTER     = 'register';
	const UNREGISTER   = 'unregister';
	const ID           = 'id';
	const NAME         = 'name';
	const DESCRIPTION  = 'description';
	const LOCATION     = 'location';
	const BEFORE       = 'before';
	const AFTER        = 'after';
	const BEFORE_TITLE = 'before_title';
	const AFTER_TITLE  = 'after_title';
	const PRIORITY     = 'priority';
	const CONDITIONAL  = 'conditional';
	const HEADER_RIGHT = 'header-right';
	const SIDEBAR      = 'sidebar';
	const SIDEBAR_ALT  = 'sidebar-alt';

	/**
	 * Register, unregister or display widget areas through configuration.
	 *
	 * @since 0.2.0
	 *
	 * @return void
	 */
	public function init() {
		if ( isset( $this->config[ self::REGISTER ] ) ) {
			$this->register( $this->config[ self::REGISTER ] );
			$this->display( $this->config[ self::REGISTER ] );
		}

		if ( isset( $this->config[ self::UNREGISTER ] ) ) {
			$this->unregister( $this->config[ self::UNREGISTER ] );
		}

		add_filter( 'widget_text', 'do_shortcode' );
	}

	/**
	 * Register widget areas.
	 *
	 * @since 0.2.0
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/register_sidebar
	 * @link  genesis/lib/functions/widgetize.php.
	 *
	 * @param array $config Register config.
	 *
	 * @return array
	 */
	protected function register( $config ) {
		return array_map( 'genesis_register_widget_area', $config );
	}

	/**
	 * Unregister widget areas.
	 *
	 * @since 0.2.0
	 *
	 * @param array $config Unregister config.
	 *
	 * @return array
	 */
	protected function unregister( $config ) {
		return array_map( 'unregister_sidebar', $config );
	}

	/**
	 * Displays widget areas.
	 *
	 * @since 0.3.0
	 *
	 * @param array $config Register config.
	 *
	 * @return void
	 */
	protected function display( $config ) {
		foreach ( $config as $widget_area => $args ) {
			if ( ! isset( $args[ self::LOCATION ] ) ) {
				return;
			}

			add_action( $args[ self::LOCATION ], function () use ( $args ) {
				$before      = isset( $args[ self::BEFORE ] ) ? $args[ self::BEFORE ] : '<div class="' . $args[ self::ID ] . ' widget-area"><div class="wrap">';
				$after       = isset( $args[ self::AFTER ] ) ? $args[ self::AFTER ] : '</div></div>';
				$conditional = isset( $args[ self::CONDITIONAL ] ) ? $args[ self::CONDITIONAL ] : '__return_true';

				if ( is_callable( $conditional ) && $conditional() ) {
					genesis_widget_area( $args[ self::ID ], [
						self::BEFORE => is_callable( $before ) ? $before() : $before,
						self::AFTER  => is_callable( $after ) ? $after() : $after,
					] );
				}
			}, isset( $args[ self::PRIORITY ] ) ? $args[ self::PRIORITY ] : 10 );
		}
	}
}

<?php
/**
 * Register AMP ready responsive menu.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class ResponsiveMenu
 *
 * @package SeoThemes\Core
 */
class ResponsiveMenu extends Component {

	/**
	 * Initialize component.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'after_setup_theme', [ $this, 'register_menus' ] );
	}

	/**
	 * Register responsive menus.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function register_menus() {
		genesis_register_responsive_menus( $this->config );
	}
}

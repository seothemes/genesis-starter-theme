<?php
/**
 * Register and unregister page templates through configuration.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @author    Craig Simpson <craig@craigsimpson.scot>
 * @copyright 2018, D2 Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Register and unregister page templates through configuration.
 *
 * Example config (usually located at config/defaults.php):
 *
 * ```
 * use SeoThemes\Core\PageTemplate;
 *
 * $core_page_templates = [
 *     PageTemplate::REGISTER   => [
 *         '/resources/views/example.php' => 'Example Template',
 *     ],
 *     PageTemplate::UNREGISTER => [
 *         PageTemplate::ARCHIVE,
 *         PageTemplate::BLOG,
 *     ],
 * ];
 *
 * return [
 *     PageTemplate::class => $core_page_templates,
 * ];
 * ```
 *
 * @package SeoThemes\Core
 */
class PageTemplates extends Component {

	/**
	 * Add filter to register and unregister page templates.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function init() {
		add_filter( 'theme_page_templates', [ $this, 'add_templates' ] );
		add_filter( 'template_include', [ $this, 'get_template' ] );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 0.1.0
	 *
	 * @param array $templates Templates to register.
	 *
	 * @return array
	 */
	public function add_templates( $templates ) {
		return array_merge( $templates, $this->config );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @param $template
	 *
	 * @return mixed
	 */
	public function get_template( $template ) {
		$name     = get_post_meta( get_the_ID(), '_wp_page_template', true );
		$file     = Theme::$path . "assets/views/$name";
		$override = apply_filters( 'seothemes_core_template_path', get_stylesheet_directory() . '/templates/' );

		if ( is_readable( $file ) ) {
			$template = $file;
		}

		if ( is_readable( $override . $name ) ) {
			$template = $override . $name;
		}

		return $template;
	}
}

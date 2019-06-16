<?php
/**
 * Load theme scripts and stylesheets through configuration.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @author    Craig Simpson <craig@craigsimpson.scot>
 * @copyright 2018, D2 Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Merges configured breadcrumbs arguments with defaults.
 *
 * Example config (usually located at config/defaults.php):
 *
 * ```
 * use SeoThemes\Core\GenesisBreadcrumbs;
 *
 * $core_genesis_breadcrumbs = [
 *     GenesisBreadcrumbs::SEP    => ' → ',
 *     GenesisBreadcrumbs::LABELS => [
 *         GenesisBreadcrumbs::PREFIX => '',
 *     ],
 * ];
 *
 * return [
 *     GenesisBreadcrumbs::class => $core_genesis_breadcrumbs,
 * ];
 * ```
 *
 * @package SeoThemes\Core
 */
class Breadcrumb extends Component {

	const HOME                     = 'home';
	const SEP                      = 'sep';
	const LIST_SEP                 = 'list_sep';
	const PREFIX                   = 'prefix';
	const SUFFIX                   = 'suffix';
	const HIERARCHICAL_ATTACHMENTS = 'heirarchial_attachments';
	const HIERARCHICAL_CATEGORIES  = 'heirarchial_categories';
	const LABELS                   = 'labels';
	const AUTHOR                   = 'author';
	const CATERGORY                = 'category';
	const TAG                      = 'tag';
	const DATE                     = 'date';
	const SEARCH                   = 'search';
	const TAX                      = 'tax';
	const POST_TYPE                = 'post_type';
	const FOUROHFOUR               = '404';

	/**
	 * Initialize class.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function init() {
		add_filter( 'genesis_breadcrumb_args', [ $this, 'breadcrumb_args' ] );
	}

	/**
	 * Filter default Genesis breadcrumb args.
	 *
	 * @since 0.1.0
	 *
	 * @param array $args Existing breadcrumb args.
	 *
	 * @return mixed Amended breadcrumb args.
	 */
	public function breadcrumb_args( array $args ) {
		return array_replace_recursive( $args, $this->config );
	}
}

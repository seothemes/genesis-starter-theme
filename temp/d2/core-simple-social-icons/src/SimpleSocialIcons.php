<?php
/**
 * Sets default Simple Social Icon values.
 *
 * @package   D2\Core
 * @author    D2 Themes <https://d2themes.com>
 * @copyright 2018, D2 Themes
 * @license   MIT
 */

namespace D2\Core;

/**
 * Add constants to child theme.
 *
 * Example config (usually located at config/defaults.php):
 *
 *
 * For example:
 *
 * ```
 * use D2\Core\SimpleSocialIcons;
 *
 * $d2_simple_social_icons = [
 *     SimpleSocialIcons::DEFAULTS => [
 *         SimpleSocialIcons::NEW_WINDOW => 1,
 *         SimpleSocialIcons::SIZE       => 40,
 *     ],
 * ];
 *
 * return [
 *     SimpleSocialIcons::class => $d2_simple_social_icons,
 * ];
 * ```
 *
 * @package D2\Core
 */
class SimpleSocialIcons extends Core {

	const DEFAULTS = 'defaults';

	const TITLE = 'title';
	const NEW_WINDOW = 'new_window';
	const SIZE = 'size';
	const BORDER_RADIUS = 'border_radius';
	const BORDER_WIDTH = 'border_width';
	const BORDER_COLOR = 'border_color';
	const BORDER_COLOR_HOVER = 'border_color_hover';
	const ICON_COLOR = 'icon_color';
	const ICON_COLOR_HOVER = 'icon_color_hover';
	const BACKGROUND_COLOR = 'background_color';
	const BACKGROUND_COLOR_HOVER = 'background_color_hover';
	const ALIGNMENT = 'alignment';
	const BEHANCE = 'behance';
	const BLOGLOVIN = 'bloglovin';
	const DRIBBBLE = 'dribbble';
	const EMAIL = 'email';
	const FACEBOOK = 'facebook';
	const FLICKR = 'flickr';
	const GITHUB = 'github';
	const GPLUS = 'gplus';
	const INSTAGRAM = 'instagram';
	const LINKEDIN = 'linkedin';
	const MEDIUM = 'medium';
	const PERISCOPE = 'periscope';
	const PHONE = 'phone';
	const PINTEREST = 'pinterest';
	const RSS = 'rss';
	const SNAPCHAT = 'snapchat';
	const STUMBLEUPON = 'stumbleupon';
	const TUMBLR = 'tumblr';
	const TWITTER = 'twitter';
	const VIMEO = 'vimeo';
	const XING = 'xing';
	const YOUTUBE = 'youtube';

	public function init() {
		add_filter( 'simple_social_default_styles', [ $this, 'simple_social_defaults' ] );
	}

	/**
	 * Simple Social Icons default settings.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $defaults Default Simple Social Icons settings.
	 *
	 * @return array Custom settings.
	 */
	public function simple_social_defaults( $defaults ) {
		foreach ( $this->config[ self::DEFAULTS ] as $key => $value ) {
			$defaults[ $key ] = $value;
		}

		return $defaults;
	}
}

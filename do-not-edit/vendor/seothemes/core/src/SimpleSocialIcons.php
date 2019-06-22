<?php
/**
 * Set Simple Social Icons default values through configuration.
 *
 * @package   SeoThemes\Core
 * @author    Lee Anthony <seothemeswp@gmail.com>
 * @copyright 2019, SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\Core;

/**
 * Class SimpleSocialIcons
 *
 * @package SeoThemes\Core
 */
class SimpleSocialIcons extends Component {

	const DEFAULTS               = 'defaults';
	const TITLE                  = 'title';
	const NEW_WINDOW             = 'new_window';
	const SIZE                   = 'size';
	const BORDER_RADIUS          = 'border_radius';
	const BORDER_WIDTH           = 'border_width';
	const BORDER_COLOR           = 'border_color';
	const BORDER_COLOR_HOVER     = 'border_color_hover';
	const ICON_COLOR             = 'icon_color';
	const ICON_COLOR_HOVER       = 'icon_color_hover';
	const BACKGROUND_COLOR       = 'background_color';
	const BACKGROUND_COLOR_HOVER = 'background_color_hover';
	const ALIGNMENT              = 'alignment';
	const BEHANCE                = 'behance';
	const BLOGLOVIN              = 'bloglovin';
	const DRIBBBLE               = 'dribbble';
	const EMAIL                  = 'email';
	const FACEBOOK               = 'facebook';
	const FLICKR                 = 'flickr';
	const GITHUB                 = 'github';
	const GPLUS                  = 'gplus';
	const INSTAGRAM              = 'instagram';
	const LINKEDIN               = 'linkedin';
	const MEDIUM                 = 'medium';
	const PERISCOPE              = 'periscope';
	const PHONE                  = 'phone';
	const PINTEREST              = 'pinterest';
	const RSS                    = 'rss';
	const SNAPCHAT               = 'snapchat';
	const STUMBLEUPON            = 'stumbleupon';
	const TUMBLR                 = 'tumblr';
	const TWITTER                = 'twitter';
	const VIMEO                  = 'vimeo';
	const XING                   = 'xing';
	const YOUTUBE                = 'youtube';

	/**
	 * Filter plugin defaults if this component is in use.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function init() {
		add_filter( 'simple_social_default_styles', [ $this, 'simple_social_defaults' ] );
	}

	/**
	 * Set Simple Social Icons default settings.
	 *
	 * @since 0.1.0
	 *
	 * @param array $defaults Default Simple Social Icons settings.
	 *
	 * @return array
	 */
	public function simple_social_defaults( $defaults ) {
		foreach ( $this->config as $key => $value ) {
			$defaults[ $key ] = $value;
		}

		return $defaults;
	}
}

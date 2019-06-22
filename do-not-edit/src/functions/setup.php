<?php
/**
 * Genesis Starter Theme
 *
 * WARNING: This file should never be modified under any circumstances.
 * Customizations should be made in the form of a core-functionality
 * plugin so that the theme can be updated without losing changes.
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace SeoThemes\GenesisStarterTheme;

use SeoThemes\Core\Theme;

// Load Genesis Framework.
require_once get_template_directory() . '/lib/init.php';

// Get config path.
$config = dirname( dirname( __DIR__ ) ) . '/config';

// Setup theme.
Theme::setup( $config );

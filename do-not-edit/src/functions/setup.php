<?php

namespace SeoThemes\GenesisStarterTheme;

use SeoThemes\Core\Theme;

// Load Genesis Framework.
require_once get_template_directory() . '/lib/init.php';

// Get config path.
$config = dirname( dirname( __DIR__ ) ) . '/config';

// Setup theme.
Theme::setup( $config );

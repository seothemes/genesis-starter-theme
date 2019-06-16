<?php

namespace SeoThemes\Core;

// Load Genesis Framework.
require_once get_template_directory() . '/lib/init.php';

// Get core path.
$core_path = dirname( dirname( dirname( __DIR__ ) ) );

// Load text domain.
load_child_theme_textdomain( get_stylesheet(), $core_path . '/assets/lang' );

// Setup theme.
Theme::setup( apply_filters( 'seothemes_core_config', $core_path . '/config' ) );

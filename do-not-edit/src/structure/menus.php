<?php

namespace SeoThemes\GenesisStarterTheme;

// Reposition primary nav.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_after_title_area', 'genesis_do_nav' );

// Reposition secondary nav.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_after_header_wrap', 'genesis_do_subnav' );

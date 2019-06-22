<?php

namespace SeoThemes\GenesisStarterTheme;

add_action( 'genesis_before', __NAMESPACE__ . '\center_content' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function center_content() {
	if ( 'center-content' === genesis_site_layout() ) {
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
	}
}

/**
 * Handles the customizer live preview settings.
 */
jQuery( document ).ready( function() {

	/*
	 * Shows a live preview of changing the site title.
	 */
	wp.customize( 'blogname', function( value ) {

		value.bind( function( to ) {

			jQuery( '.site-title a' ).html( to );

		} ); // value.bind

	} ); // wp.customize

	/*
	 * Shows a live preview of changing the site description.
	 */
	wp.customize( 'blogdescription', function( value ) {

		value.bind( function( to ) {

			jQuery( '.site-description' ).html( to );

		} ); // value.bind

	} ); // wp.customize

	/*
	 * Handles the header textcolor.  This code also accounts for the possibility that the header text color
	 * may be set to 'blank', in which case, any text in the header is hidden.
	 */
	wp.customize( 'header_textcolor', function( value ) {

		value.bind( function( to ) {

			/* If set to 'blank', hide the branding section and secondary menu. */
			if ( 'blank' === to ) {

				/* Hides branding and menu-secondary. */
				jQuery( '.site-title, .site-description' ).
					css( 'display', 'none' );

			}

			/* Change the header and secondary menu colors. */
			else {

				/* Makes sures both branding and menu-secondary display. */
				jQuery( '.site-title, .site-description' ).
					css( 'display', 'block' );

				/* Changes the color of the site title link. */
				jQuery( '.site-title a, .site-description' ).
					css( 'color', to );
			} // endif

		} ); // value.bind

	} ); // wp.customize

	/*
	 * Handes the header image.  This code replaces the "src" attribute for the image.
	 */
	wp.customize( 'header_image', function( value ) {

		value.bind( function( to ) {

			/* If removing the header image, make sure to hide it so there's not an error image. */
			if ( 'remove-header' === to ) {
				jQuery( '.wp-custom-header img' ).hide();
				jQuery( '.wp-custom-header video' ).hide();
			}

			/* Else, make sure to show the image and change the source. */
			else {
				jQuery( '.wp-custom-header img' ).show();
				jQuery( '.wp-custom-header img' ).attr( 'src', to );
				jQuery( '.wp-custom-header video' ).show();
				jQuery( '.wp-custom-header video' ).attr( 'src', to );
			}

		} ); // value.bind

	} ); // wp.customize

	/**
	 * Primary color.
	 */
	wp.customize( 'starter_primary_color', function( value ) {

		value.bind( function( to ) {

			// Background color.
			jQuery( '.button.secondary, button.secondary, .archive-pagination .active a, .sidebar-primary .widget:first-of-type input[type="button"], .sidebar-primary .widget:first-of-type input[type="submit"]' ).css( 'background-color', to );

			// Background color hover.
			jQuery( '.button, button, input[type="button"], input[type="reset"], input[type="submit"], .archive-pagination a' ).not( '.archive-pagination .active a, .sidebar-primary .widget:first-of-type input[type="button"], .sidebar-primary .widget:first-of-type input[type="submit"]' ).hover(
				function() {
					jQuery( this ).css( 'background-color', to );
				},
				function() {
					jQuery( this ).css( 'background-color', '' );
				}
			);

			// Text color.
			jQuery( 'a, .current-menu-item > a' ).not( '.site-title a, .entry-title a, .menu-item a, .archive-pagination .active a' ).css( 'color', to );

			// Text color hover.
			jQuery( '.entry-title a, .menu-item a' ).not( '.archive-pagination a' ).hover(
				function() {
					jQuery( this ).css( 'color', to );
				},
				function() {
					jQuery( this ).css( 'color', '' );
				}
			);

		} ); // value.bind

	} ); // wp.customize

} ); // jQuery( document ).ready

/**
 * Add any custom theme JavaScript to this file.
 */

( function ( document, $ ) {
	
	'use strict';

	/**
	 * Add shrink class to header on scroll.
	 */
	$( window ).scroll( function() {
		var scroll = $( window ).scrollTop();
		var height = $( '.page-header' ).outerHeight();
		var header = $( '.site-header' ).outerHeight();
		if ( scroll >= header) {
			$( '.site-header' ).addClass( 'shrink' );
		} else {
			$( '.site-header' ).removeClass( 'shrink' );
		}
	} );

} )( document, jQuery );

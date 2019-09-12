( function( document, $, undefined ) {

	'use strict';

	$( document ).ready( function() {

		$( '.js-superfish' ).superfish( {
			'delay': 100,
			'animation': {
				'opacity': 'show',
				'height': 'show'
			},
			'speed': 3000,
			'dropShadows': false
		} );
	} );

}( document, jQuery ) );


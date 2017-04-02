/**
 * This script adds the accessibility-ready responsive menu
 * to the Genesis Starter theme.
 *
 * @author SeoThemes
 * @link https://github.com/seothemes/genesis-starter
 * @version 1.1.0
 * @license GPL-2.0+
 */
( function ( document, $, undefined ) {

	'use strict';

	// Add js class.
	$( 'body' ).addClass( 'js' );

	/**
	 * Keep hero below the header section.
	 *
	 * Gets the site header height and hero section
	 * bottom padding value and calculates the hero
	 * padding top value.
	 */
	$( window ).resize( function() {

		var siteHeader  = $( '.site-header' ).outerHeight();
		var padding = parseInt( $( '.hero-section' ).css( "padding-bottom" ), 10 );
		$( ".hero-section" ).css( { "padding-top": ( siteHeader + padding ) } );

	} ).resize();

	// Site header shrink.
	$( document ).on( "scroll", function() {

		var header = $( '.site-header' );
		//console.log( $( header ).css( 'position' ) );

		if( $( document ).scrollTop() > 0 ){
			if( $( header ).css( 'position' ) === 'fixed' ) {
				$( header ).addClass( 'shrink' );
			}
		} else {
			$( header ).removeClass( 'shrink' );
		}
	} );

	// Add before header close button.
	$( '.before-header .wrap' ).append( '<button class="close-before-header" role="button">Close</button>' );

	// Add menu-toggle button
	$( '.nav-primary' ).before( '<button class="menu-toggle toggle-primary" role="button">Menu <span></span><span></span><span></span><span></span></button>' );

	// Add menu-toggle button
	$( '.nav-secondary .wrap' ).before( '<button class="menu-toggle toggle-secondary" role="button">Menu <span></span><span></span><span></span><span></span></button>' );

	// Add sub-menu-toggle buttons
	$( '.menu-item-has-children' ).append(
		'<button class="sub-menu-toggle" role="button"></button>'
		);

	// Add aria labels
	$( '.menu-toggle, .sub-menu-toggle' ).attr( { "aria-expanded":false, "aria-pressed": false } );

	// Close before header section.
	$( '.close-before-header' ).on( "click", function() {
	    $( '.before-header' ).slideToggle( 100, function() {
		    var siteHeader  = $( '.site-header' ).height();
		    var padding = parseInt( $( '.hero-section' ).css( "padding-bottom" ), 10 );
		    $( ".hero-section" ).css( { "padding-top": ( siteHeader + padding ) } );
		} );
	} );

	// Smaller screens responsive menu
	$( '.toggle-primary' ).on( "click", function() {
		$( this ).toggleClass( "activated" );
	    $( '.nav-primary' ).slideToggle( 100 );
	    // Toggle aria attributes
	    $( this ).attr( 'aria-expanded',$( this ).attr( 'aria-expanded' ) === 'true'?'false':'true' );
	    $( this ).attr( 'aria-pressed',$( this ).attr( 'aria-pressed' ) === 'true'?'false':'true' );
	} );

	$( '.toggle-secondary' ).on( "click", function() {
		$( this ).toggleClass( "activated" );
	    $( '.nav-secondary .wrap' ).slideToggle( 100 );
	    // Toggle aria attributes
	    $( this ).attr( 'aria-expanded',$( this ).attr( 'aria-expanded' ) === 'true'?'false':'true' );
	    $( this ).attr( 'aria-pressed',$( this ).attr( 'aria-pressed' ) === 'true'?'false':'true' );
	});

	$( ".menu-item-has-children .sub-menu-toggle" ).on( "click", function() {
		$( this ).toggleClass( "activated" );
	    $( this ).siblings( ".sub-menu" ).slideToggle( 100 );
	    // Toggle aria attributes
	    $( this ).attr( 'aria-expanded',$( this ).attr( 'aria-expanded' ) === 'true'?'false':'true' );
	    $( this ).attr( 'aria-pressed',$( this ).attr( 'aria-pressed' ) === 'true'?'false':'true' );
	});

	// Back to top.
	$( '.site-container' ).attr( 'id', 'top' );
	$( '.site-footer > .wrap' ).append( '<a href="#top" class="back-to-top"><span></span></a>' );

} )( document, jQuery );

// Smooth scrolling.
(function($) {
	$( '.back-to-top' ).click(function() {
	    if ( location.pathname.replace( /^\//,'' ) == this.pathname.replace( /^\//,'' ) && location.hostname == this.hostname ) {
			var target = $( this.hash );
	      	target = target.length ? target : $( '[name=' + this.hash.slice(1) +']' );
			if ( target.length ) {
	        	$( 'html, body' ).animate( {
	          		scrollTop: target.offset().top
	        	}, 1000 );
	        	return false;
	      	}
	    }
	});
})(jQuery);

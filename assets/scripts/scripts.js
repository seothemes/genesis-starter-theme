/**
 * This script adds the accessibility-ready responsive menu
 * and jQuery functionality to the Genesis Starter theme.
 *
 * @author SeoThemes
 * @link https://github.com/seothemes/store-pro
 * @version 1.1.0
 * @license GPL-2.0+
 */
( function ( document, $, undefined ) {

	//'use strict';

	// Add js class.
	$( 'body' ).addClass( 'js' );

	// Add menu-toggle and search-toggle buttons.
	$( '.site-header > .wrap' ).append( '<button class="fa fa-search search-toggle" role="button"><span class="screen-reader-text">Toggle search</span></button><button class="menu-toggle" role="button" type="button"><span>Toggle Menu</span></button>' );

	// Add sub-menu-toggle buttons.
	$( '.menu-item-has-children' ).append( '<button class="sub-menu-toggle fa fa-angle-down" role="button"></button>' );

	// Add aria labels.
	$( '.menu-toggle, .sub-menu-toggle' ).attr( { "aria-expanded":false, "aria-pressed": false } );

	// Combine menus.
	$( '.nav-secondary .genesis-nav-menu > li' ).clone().appendTo( '.nav-primary .wrap > ul' ).addClass( 'clone' );

	// Show search box.
	$( '.search-toggle' ).on( "click", function() {
		$( this ).toggleClass( 'fa-search' );
		$( this ).toggleClass( 'fa-close' );
	    $( '.header-widget-area' ).fadeToggle( 100 );
	} );

	// Close before header section.
	$( '.before-header .fa-close' ).on( "click", function() {
	    $( '.before-header' ).slideToggle( 100 );
	} );

	// Smaller screens menu toggle.
	$( '.menu-toggle' ).on( "click", function() {
		$( this ).toggleClass( "activated" );
	    $( '.nav-primary' ).slideToggle( 300 );
	    $( this ).attr( 'aria-expanded',$( this ).attr( 'aria-expanded' ) === 'true'?'false':'true' );
	    $( this ).attr( 'aria-pressed',$( this ).attr( 'aria-pressed' ) === 'true'?'false':'true' );
	} );

	// Sub menu toggle.
	$( ".sub-menu-toggle" ).on( "click", function() {
		$( this ).toggleClass( "activated" );
	    $( this ).siblings( ".sub-menu" ).slideToggle( 100 );
	    $( this ).attr( 'aria-expanded',$( this ).attr( 'aria-expanded' ) === 'true'?'false':'true' );
	    $( this ).attr( 'aria-pressed',$( this ).attr( 'aria-pressed' ) === 'true'?'false':'true' );
	} );

	// Site header shrink.
	$( document ).on( "scroll", function() {

		var header = $( '.site-header' );

		if( $( document ).scrollTop() > 0 ){
			if( $( header ).css( 'position' ) === 'fixed' ) {
				$( header ).addClass( 'shrink' );
			}
		} else {
			$( header ).removeClass( 'shrink' );
		}
	} );

	// Back to top.
	$( '.site-container' ).attr( 'id', 'top' );
	$( '.site-footer > .wrap' ).append( '<a href="#top" class="back-to-top"><i class="fa fa-angle-up"></i></a>' );

	// Smooth scrolling.
	$( '.back-to-top' ).click( function() {
	    if ( location.pathname.replace( /^\//,'' ) == this.pathname.replace( /^\//,'' ) && location.hostname == this.hostname ) {
			var target = $( this.hash );
	      	target = target.length ? target : $( '[name=' + this.hash.slice( 1 ) +']' );
			if ( target.length ) {
	        	$( 'html, body' ).animate( {
	          		scrollTop: target.offset().top
	        	}, 1000 );
	        	return false;
	      	}
	    }
	} );

} )( document, jQuery );

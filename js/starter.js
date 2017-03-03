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

	$( '.site-header' ).addClass( 'responsive' );

	// Keep site header below the header section
	$( window ).resize( function() {

		var navbar = $( '.navbar' ).outerHeight();
		var navSecondary = $( '.nav-secondary' ).outerHeight();

		$( ".site-header" ).css( { "padding-top": ( navbar + navSecondary ) } );
		$( '.nav-secondary' ).css( { "top": navbar } );

	} ).resize();

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

} )( document, jQuery );

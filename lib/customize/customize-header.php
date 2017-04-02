<?php
/**
 * This file adds customizer header settings to the Genesis Starter theme.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register header settings with the Customizer.
 */
if ( class_exists( 'Starter_Kirki' ) ) {

	Starter_Kirki::add_field( 'starter', array(
		'type'        => 'radio',
		'settings'    => 'sticky_header',
		'label'       => __( 'Sticky Header', 'genesis-starter' ),
		'section'     => 'genesis_layout',
		'default'     => 'fixed',
		'priority'    => 1,
		'choices'     => array(
			'fixed'  	=> esc_attr__( 'Enable', 'genesis-starter' ),
			'absolute'  => esc_attr__( 'Disable', 'genesis-starter' ),
		),
		'output' => array(
			array(
			   'element'  => '.site-header',
			   'property' => 'position',
			   'suffix'   => ' !important',
			),
		),
	) );
}

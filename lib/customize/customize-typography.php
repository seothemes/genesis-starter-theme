<?php
/**
 * This file adds customizer font settings to the Genesis Starter theme.
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

if ( class_exists( 'Starter_Kirki' ) ) {

	Starter_Kirki::add_section( 'typography', array(
	    'title'          => __( 'Typography' ),
	    'priority'       => 30,
	    'capability'     => 'edit_theme_options',
	) );

	Starter_Kirki::add_field( 'starter', array(
		'type'        => 'typography',
		'settings'    => 'starter_body_font',
		'label'       => esc_attr__( 'Body Font', 'genesis-starter' ),
		'section'     => 'typography',
		'default'     => array(
			'font-family'    => 'Muli',
			'variant'        => '300',
			'line-height'    => '1.618',
			'letter-spacing' => '0',
			'color'          => '#333333',
		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element' => 'body',
			),
		),
	) );

	Starter_Kirki::add_field( 'starter', array(
		'type'        => 'typography',
		'settings'    => 'starter_heading_font',
		'label'       => esc_attr__( 'Heading Font', 'genesis-starter' ),
		'section'     => 'typography',
		'default'     => array(
			'font-family'    => 'Muli',
			'variant'        => 'regular',
			'line-height'    => '1.382',
			'letter-spacing' => '0',
			'color'          => '#333333',
			'text-transform' => 'none',
		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element' => array(
					'h1',
					'h2',
					'h3',
					'h4',
					'h5',
					'h6',
					'.site-title',
					'.widget-title',
				),
			),
		),
	) );
}

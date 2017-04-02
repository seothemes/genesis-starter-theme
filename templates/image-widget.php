<?php
/**
 * Widget template.
 *
 * This template overrides the default Image Widget
 * template to clean up the output.
 *
 * @package      Genesis Starter
 * @link         https://seothemes.net/genesis-starter
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 */

// Block direct requests.
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Before widget output.
echo $before_widget;

// Image.
echo $this->get_image_html( $instance, true );

// Title.
if ( ! empty( $title ) ) {
	echo $before_title . $title . $after_title;
}

// Description.
if ( ! empty( $description ) ) {
	echo wpautop( $description );
}

// After widget.
echo $after_widget;

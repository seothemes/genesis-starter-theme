<?php
/**
 * Template Name: No Hero
 *
 * Template Post Type: post, page, product, portfolio
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-2.0-or-later
 */

// Removes hero section.
remove_theme_support( 'hero-section' );

// Runs the Genesis loop.
genesis();

<?php
/**
 * Genesis Starter Theme.
 *
 * @package   SeoThemes\GenesisStarterTheme
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-2.0-or-later
 */

namespace SeoThemes\GenesisStarterTheme\Functions;

\add_action( 'genesis_onboarding_before_import_content', __NAMESPACE__ . '\backup_featured_images' );
/**
 * Workaround to backup deleted onboarding featured images.
 *
 * @since 3.5.3
 *
 * @todo  Remove when issue #2505 is fixed.
 *
 * @link  https://github.com/studiopress/genesis/issues/2505
 *
 * @return void
 */
function backup_featured_images() {
	$content = \genesis_onboarding_config()['content'];

	foreach ( $content as $slug => $post ) {
		if ( ! isset( $post['featured_image'] ) || ! $post['featured_image'] ) {
			continue;
		}

		include_once ABSPATH . '/wp-admin/includes/file.php';
		\WP_Filesystem();
		global $wp_filesystem;

		$image = $post['featured_image'];
		$base  = basename( $image );
		$temp  = \get_stylesheet_directory() . '/assets/temp/';

		if ( ! is_dir( $temp ) ) {
			\wp_mkdir_p( $temp );
		}

		if ( ! file_exists( $temp . $base ) && file_exists( $image ) ) {
			\copy( $image, $temp . $base );
		}
	}
}

\add_action( 'genesis_onboarding_after_import_content', __NAMESPACE__ . '\delete_image_backup', 98 );
/**
 * Workaround to delete the backup onboarding featured images.
 *
 * @since 3.5.3
 *
 * @todo  Remove when issue #2505 is fixed.
 *
 * @link  https://github.com/studiopress/genesis/issues/2505
 *
 * @return void
 */
function delete_image_backup() {
	$content = \genesis_onboarding_config()['content'];
	$temp    = \get_stylesheet_directory() . '/assets/temp/';

	include_once ABSPATH . '/wp-admin/includes/file.php';
	\WP_Filesystem();
	global $wp_filesystem;

	foreach ( $content as $slug => $post ) {
		if ( ! isset( $post['featured_image'] ) || ! $post['featured_image'] ) {
			continue;
		}

		$image = $post['featured_image'];
		$base  = basename( $image );

		if ( ! file_exists( $image ) && file_exists( $temp . $base ) ) {
			\copy( $temp . $base, $image );
		}
	}

	$wp_filesystem_direct = new \WP_Filesystem_Direct( false );

	if ( is_dir( $temp ) ) {
		$wp_filesystem_direct->rmdir( $temp, true );
	}
}

\add_action( 'genesis_onboarding_after_import_content', __NAMESPACE__ . '\update_thumbnail_ids', 99 );
/**
 * Workaround to fix Genesis multiple featured images issue.
 *
 * @since 3.5.3
 *
 * @todo  Remove when #2506 is fixed.
 *
 * @link  https://github.com/studiopress/genesis/issues/2506
 *
 * @return void
 */
function update_thumbnail_ids() {
	$posts = \get_posts( [
		'numberposts' => -1,
		'post_type'   => 'any',
	] );

	foreach ( $posts as $post ) {
		$thumbnail_id = \get_post_thumbnail_id( $post->ID );

		if ( $thumbnail_id ) {
			$attachment = \get_page_by_title( $thumbnail_id, OBJECT, 'attachment' );

			if ( ! $attachment ) {
				$attachments = \get_posts( [
					'numberposts' => -1,
					'post_type'   => 'attachment',
				] );

				foreach ( $attachments as $attachment_object ) {
					if ( false !== strpos( $post->post_title, $thumbnail_id ) ) {
						$attachment = $attachment_object;
					}
				}
			}

			if ( $attachment && $attachment->ID ) {
				\update_post_meta( $post->ID, '_thumbnail_id', $attachment->ID );
			}
		}
	}
}

add_action( 'genesis_onboarding_after_import_content', __NAMESPACE__ . '\set_permalink_structure', 100 );
/**
 * Set permalink structure and flush rules after importing content.
 *
 * @since 3.5.3
 *
 * @return void
 */
function set_permalink_structure() {
	global $wp_rewrite;

	$wp_rewrite->set_permalink_structure( '/%postname%/' );
	$wp_rewrite->flush_rules();
}

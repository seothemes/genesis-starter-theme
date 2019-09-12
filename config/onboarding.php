<?php
/**
 * Genesis Starter Theme
 *
 * Onboarding config shared between Starter Packs.
 *
 * Genesis Starter Packs give you a choice of content variation when activating
 * the theme. The content below is common to all packs for this theme.
 *
 * @package Genesis Starter Theme
 * @author  SEO Themes
 * @link    https://genesisstartertheme.com/
 * @license GPL-2.0-or-later
 */

return [
	'dependencies' => [
		'plugins'      => [
			[
				'name'       => 'Genesis Widget Column Classes',
				'slug'       => 'genesis-widget-column-classes/genesis-widget-column-classes.php',
				'public_url' => 'https://wordpress.org/plugins/genesis-widget-column-classes/',
			],
			[
				'name'       => 'Quick Featured Images',
				'slug'       => 'quick-featured-images/quick-featured-images.php',
				'public_url' => 'https://wordpress.org/plugins/quick-featured-images/',
			],
		],
	],
	'content'          => [
		'layouts' => [
			'post_title'     => 'Layouts',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1568083704:1',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom', 
			],
			'post_content'   => '',
		],
		'templates' => [
			'post_title'     => 'Templates',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1568083694:1',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom', 
			],
			'post_content'   => '',
		],
		'shop' => [
			'post_title'     => 'Shop',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1568028783:1',
				'_genesis_layout' => 'full-width-content',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom', 
			],
			'post_content'   => '',
		],
		'cart' => [
			'post_title'     => 'Cart',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'post_content'   => '<!-- wp:shortcode -->[woocommerce_cart]<!-- /wp:shortcode -->',
		],
		'checkout' => [
			'post_title'     => 'Checkout',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'post_content'   => '<!-- wp:shortcode -->[woocommerce_checkout]<!-- /wp:shortcode -->',
		],
		'my-account' => [
			'post_title'     => 'My Account',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1567676468:1',
				'_genesis_layout' => 'full-width-content',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_wp_page_template' => 'default', 
			],
			'post_content'   => '<!-- wp:shortcode -->
[woocommerce_my_account]
<!-- /wp:shortcode -->',
		],
		'another-post' => [
			'post_title'     => 'Another post',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'comment_status' => 'open',
			'ping_status'    => 'open',
			'featured_image' => \get_stylesheet_directory() . '/assets/img/placeholder.png',
			'meta_input'     => [ 
				'_pingme' => '1',
				'_encloseme' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_wp_page_template' => 'default',
				'_dp_original' => '1769',
				'_thumbnail_id' => 'placeholder',
				'_edit_last' => '1',
				'_wp_old_slug' => 'fourth-post-3',
				'_edit_lock' => '1567607569:1', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'sample-content' => [
			'post_title'     => 'Sample content',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'comment_status' => 'open',
			'ping_status'    => 'open',
			'featured_image' => \get_stylesheet_directory() . '/assets/img/placeholder.png',
			'meta_input'     => [ 
				'_pingme' => '1',
				'_encloseme' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_dp_original' => '1767',
				'_thumbnail_id' => 'placeholder',
				'_edit_last' => '1',
				'_wp_page_template' => 'default',
				'_wp_old_slug' => 'third-post-3',
				'_edit_lock' => '1567443139:1', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'another-title' => [
			'post_title'     => 'Another title',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'comment_status' => 'open',
			'ping_status'    => 'open',
			'featured_image' => \get_stylesheet_directory() . '/assets/img/placeholder.png',
			'meta_input'     => [ 
				'_pingme' => '1',
				'_encloseme' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_dp_original' => '1765',
				'_thumbnail_id' => 'placeholder',
				'_edit_last' => '1',
				'_wp_page_template' => 'default',
				'_wp_old_slug' => 'second-post-3',
				'_edit_lock' => '1567443161:1', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'example-headline' => [
			'post_title'     => 'Example headline',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'comment_status' => 'open',
			'ping_status'    => 'open',
			'featured_image' => \get_stylesheet_directory() . '/assets/img/placeholder.png',
			'meta_input'     => [ 
				'_pingme' => '1',
				'_encloseme' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_dp_original' => '1750',
				'_thumbnail_id' => 'placeholder',
				'_edit_last' => '1',
				'_wp_page_template' => 'default',
				'_wp_old_slug' => 'post-3',
				'_edit_lock' => '1567443170:1', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!-- /wp:paragraph -->',
		],
		'wordpress-post' => [
			'post_title'     => 'WordPress post',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'comment_status' => 'open',
			'ping_status'    => 'open',
			'meta_input'     => [ 
				'_pingme' => '1',
				'_encloseme' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_wp_page_template' => 'default',
				'_dp_original' => '1769',
				'_edit_last' => '1',
				'_wp_old_slug' => 'fourth-post-2',
				'_edit_lock' => '1567443186:1', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'third-post-2' => [
			'post_title'     => 'Third post',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'comment_status' => 'open',
			'ping_status'    => 'open',
			'featured_image' => \get_stylesheet_directory() . '/assets/img/placeholder.png',
			'meta_input'     => [ 
				'_pingme' => '1',
				'_encloseme' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_dp_original' => '1767',
				'_thumbnail_id' => 'placeholder',
				'_edit_last' => '1',
				'_wp_page_template' => 'default',
				'_edit_lock' => '1567443198:1', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'second-post-2' => [
			'post_title'     => 'Second post',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'comment_status' => 'open',
			'ping_status'    => 'open',
			'featured_image' => \get_stylesheet_directory() . '/assets/img/placeholder.png',
			'meta_input'     => [ 
				'_pingme' => '1',
				'_encloseme' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_dp_original' => '1765',
				'_thumbnail_id' => 'placeholder',
				'_edit_last' => '1',
				'_wp_page_template' => 'default',
				'_edit_lock' => '1567443204:1', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'example-title' => [
			'post_title'     => 'Example title',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'comment_status' => 'open',
			'ping_status'    => 'open',
			'featured_image' => \get_stylesheet_directory() . '/assets/img/placeholder.png',
			'meta_input'     => [ 
				'_pingme' => '1',
				'_encloseme' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_dp_original' => '1750',
				'_thumbnail_id' => 'placeholder',
				'_edit_last' => '1',
				'_wp_page_template' => 'default',
				'_wp_old_slug' => 'post-2',
				'_edit_lock' => '1567443209:1', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!-- /wp:paragraph -->',
		],
		'narrow' => [
			'post_title'     => 'Narrow',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1567213971:1',
				'_genesis_layout' => 'narrow-content',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'full-width' => [
			'post_title'     => 'Full Width',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1567213917:1',
				'_genesis_layout' => 'full-width-content',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'sidebar-content' => [
			'post_title'     => 'Sidebar Content',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1567213897:1',
				'_genesis_layout' => 'sidebar-content',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'content-sidebar' => [
			'post_title'     => 'Content Sidebar',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1567213882:1',
				'_genesis_layout' => 'content-sidebar',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'no-hero' => [
			'post_title'     => 'No Hero',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1567652359:1',
				'_wp_page_template' => 'templates/no-hero.php',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'features' => [
			'post_title'     => 'Features',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1567608397:1',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_genesis_layout' => 'narrow-content',
				'_wp_page_template' => 'default', 
			],
			'post_content'   => '<!-- wp:heading -->
<h2>Buttons</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:html -->
<a href="#" class="button">Default Button</a>
<a href="#" class="button outline">Outline Button</a>
<a href="#" class="button rounded">Rounded Button</a>
<a href="#" class="button fa fa-external-link-alt">Icon Button</a>
<br>
&nbsp;
<br>
<a href="#" class="button small">Small Button</a>
<a href="#" class="button small outline">Small Outline Button</a>
<a href="#" class="button small rounded">Small Rounded Button</a>
<a href="#" class="button small fa fa-external-link-alt icon-right">Small Icon Button</a>
<!-- /wp:html -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:code {"language":"xml"} -->
<pre class="wp-block-code"><code>&lt;a href="#" class="button">Default Button&lt;/a>
&lt;a href="#" class="button outline">Outline Button&lt;/a>
&lt;a href="#" class="button rounded">Rounded Button&lt;/a>
&lt;a href="#" class="button fa fa-external-link-alt">Icon Button&lt;/a>
&lt;a href="#" class="button small">Small Button&lt;/a>
&lt;a href="#" class="button small outline">Small Outline Button&lt;/a>
&lt;a href="#" class="button small rounded">Small Rounded Button&lt;/a>
&lt;a href="#" class="button small fa fa-external-link-alt icon-right">Small Icon Button&lt;/a></code></pre>
<!-- /wp:code -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading -->
<h2>Icons</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Font Awesome 5 icons <a href="https://fontawesome.com/icons?d=gallery&amp;q=link">https://fontawesome.com/icons</a> (requires <a href="https://wordpress.org/plugins/icon-widget/">Icon Widget</a> plugin).</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:html -->
<i class="fa fa-star fa-sm"></i>
<i class="fa fa-star fa-lg"></i>
<i class="fa fa-star fa-2x"></i>
<i class="fa fa-star fa-3x"></i>
<i class="fa fa-star fa-4x"></i>
<!-- /wp:html -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:code {"language":"xml"} -->
<pre class="wp-block-code"><code>&lt;i class="fa fa-star fa-sm">&lt;/i>
&lt;i class="fa fa-star fa-lg">&lt;/i>
&lt;i class="fa fa-star fa-2x">&lt;/i>
&lt;i class="fa fa-star fa-3x">&lt;/i>
&lt;i class="fa fa-star fa-4x">&lt;/i></code></pre>
<!-- /wp:code -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading -->
<h2>Modal</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:html -->
<button onclick="show(&apos;modal&apos;)">Show Modal</button>

<div class="modal">
    <h3>Modal popup</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
    <button onclick="hide(&apos;modal&apos;)">Close Modal</button>
    <button class="close" onclick="hide(&apos;modal&apos;)">Close Modal</button>
</div>
<!-- /wp:html -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:code {"language":"xml"} -->
<pre class="wp-block-code"><code>&lt;button onclick="show(&apos;modal&apos;)">Show Modal&lt;/button>

&lt;div class="modal">
    &lt;h3>Modal popup&lt;/h3>
    &lt;p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.&lt;/p>
    &lt;button onclick="hide(&apos;modal&apos;)">Close Modal&lt;/button>
    &lt;button class="close" onclick="hide(&apos;modal&apos;)">Close Modal&lt;/button>
&lt;/div></code></pre>
<!-- /wp:code -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading -->
<h2>Boxes</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:html -->
<div class="box">
    <h6>This is a box title</h6>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
</div>
<!-- /wp:html -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:code {"language":"xml"} -->
<pre class="wp-block-code"><code>&lt;div class="box">
    &lt;h6>This is a box title&lt;/h6>
    &lt;p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.&lt;/p>
&lt;/div></code></pre>
<!-- /wp:code -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading -->
<h2>Notice</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:html -->
<div class="notice">Default <button class="close alignright" onclick="hide(&apos;notice&apos;)"></button></div>
<div class="notice-success">Success <button class="close alignright" onclick="hide(&apos;notice-success&apos;)"></button></div>
<div class="notice-info">Info <button class="close alignright" onclick="hide(&apos;notice-info&apos;)"></button></div>
<div class="notice-warning">Warning <button class="close alignright" onclick="hide(&apos;notice-warning&apos;)"></button></div>
<div class="notice-error">Error <button class="close alignright" onclick="hide(&apos;notice-error&apos;)"></button></div>
<!-- /wp:html -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:code {"language":"xml"} -->
<pre class="wp-block-code"><code>&lt;div class="notice">Default &lt;button class="close alignright" onclick="hide(&apos;notice&apos;)">&lt;/button>&lt;/div>
&lt;div class="notice-success">Success &lt;button class="close alignright" onclick="hide(&apos;notice-success&apos;)">&lt;/button>&lt;/div>
&lt;div class="notice-info">Info &lt;button class="close alignright" onclick="hide(&apos;notice-info&apos;)">&lt;/button>&lt;/div>
&lt;div class="notice-warning">Warning &lt;button class="close alignright" onclick="hide(&apos;notice-warning&apos;)">&lt;/button>&lt;/div>
&lt;div class="notice-error">Error &lt;button class="close alignright" onclick="hide(&apos;notice-error&apos;)">&lt;/button>&lt;/div></code></pre>
<!-- /wp:code -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading -->
<h2>Colors</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:html -->
<div class="palette">
<div class="has-blue-background-color">Blue</div>
<div class="has-indigo-background-color">Indigo</div>
<div class="has-purple-background-color">Purple</div>
<div class="has-pink-background-color">Pink</div>
<div class="has-red-background-color">Red</div>
<div class="has-orange-background-color">Orange</div>
<div class="has-yellow-background-color">Yellow</div>
<div class="has-green-background-color">Green</div>
<div class="has-teal-background-color">Teal</div>
<div class="has-cyan-background-color">Cyan</div>
<div class="has-gray-100-background-color">100</div>
<div class="has-gray-200-background-color">200</div>
<div class="has-gray-300-background-color">300</div>
<div class="has-gray-400-background-color">400</div>
<div class="has-gray-500-background-color">500</div>
<div class="has-gray-600-background-color">600</div>
<div class="has-gray-700-background-color">700</div>
<div class="has-gray-800-background-color">800</div>
<div class="has-gray-900-background-color">900</div>
<div class="has-black-background-color">Black</div>
</div>
<!-- /wp:html -->

<!-- wp:spacer {"height":30} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:code {"language":"xml"} -->
<pre class="wp-block-code"><code>&lt;div class="palette">
&lt;div class="has-blue-background-color">Blue&lt;/div>
&lt;div class="has-indigo-background-color">Indigo&lt;/div>
&lt;div class="has-purple-background-color">Purple&lt;/div>
&lt;div class="has-pink-background-color">Pink&lt;/div>
&lt;div class="has-red-background-color">Red&lt;/div>
&lt;div class="has-orange-background-color">Orange&lt;/div>
&lt;div class="has-yellow-background-color">Yellow&lt;/div>
&lt;div class="has-green-background-color">Green&lt;/div>
&lt;div class="has-teal-background-color">Teal&lt;/div>
&lt;div class="has-cyan-background-color">Cyan&lt;/div>
&lt;div class="has-gray-100-background-color">100&lt;/div>
&lt;div class="has-gray-200-background-color">200&lt;/div>
&lt;div class="has-gray-300-background-color">300&lt;/div>
&lt;div class="has-gray-400-background-color">400&lt;/div>
&lt;div class="has-gray-500-background-color">500&lt;/div>
&lt;div class="has-gray-600-background-color">600&lt;/div>
&lt;div class="has-gray-700-background-color">700&lt;/div>
&lt;div class="has-gray-800-background-color">800&lt;/div>
&lt;div class="has-gray-900-background-color">900&lt;/div>
&lt;div class="has-black-background-color">Black&lt;/div>
&lt;/div></code></pre>
<!-- /wp:code -->',
		],
		'homepage' => [
			'post_title'     => 'Home',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1567680853:1',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_genesis_layout' => 'full-width-content',
				'_wp_page_template' => 'default', 
			],
			'post_content'   => '<!-- wp:group {"backgroundColor":"very-light-gray","align":"full"} -->
<div class="wp-block-group alignfull has-very-light-gray-background-color has-background"><div class="wp-block-group__inner-container"><!-- wp:heading -->
<h2>Welcome to the Genesis starter theme</h2>
<!-- /wp:heading --></div></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'contact' => [
			'post_title'     => 'Contact',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1568001665:1',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom', 
			],
			'post_content'   => '<!-- wp:html -->
<form>

  <p>
  <label for="name">Name</label>
  <input type="text" name="name">
  </p>

  <p>
  <label for="email">Email</label>
  <input type="email" name="email">
  </p>

  <p>
  <label for="message">Message</label>
  <textarea name="message" rows="8"></textarea>
  </p>

  <input type="submit" value="Send">

</form>
<!-- /wp:html -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->',
		],
		'landing' => [
			'post_title'     => 'Landing',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1567214584:1',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_wp_page_template' => 'templates/landing.php', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link" href="javascript:history.back()">Return to theme</a></div>
<!-- /wp:button -->',
		],
		'fourth-post' => [
			'post_title'     => 'Fourth post',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'comment_status' => 'open',
			'ping_status'    => 'open',
			'featured_image' => \get_stylesheet_directory() . '/assets/img/placeholder.png',
			'meta_input'     => [ 
				'_edit_lock' => '1567443221:1',
				'_pingme' => '1',
				'_encloseme' => '1',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_wp_page_template' => 'default',
				'_thumbnail_id' => 'placeholder', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'third-post' => [
			'post_title'     => 'Third post',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'comment_status' => 'open',
			'ping_status'    => 'open',
			'featured_image' => \get_stylesheet_directory() . '/assets/img/placeholder.png',
			'meta_input'     => [ 
				'_edit_lock' => '1568199531:1',
				'_pingme' => '1',
				'_encloseme' => '1',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_thumbnail_id' => 'placeholder', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'second-post' => [
			'post_title'     => 'Second post',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'comment_status' => 'open',
			'ping_status'    => 'open',
			'featured_image' => \get_stylesheet_directory() . '/assets/img/placeholder.png',
			'meta_input'     => [ 
				'_edit_lock' => '1568197615:1',
				'_pingme' => '1',
				'_encloseme' => '1',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_thumbnail_id' => 'placeholder', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Maecenas euismod lacinia turpis placerat gravida. Integer quis diam a diam vulputate mattis in sit amet justo. Aenean ornare iaculis libero, eu laoreet neque auctor a. Vestibulum interdum diam eu lacus pretium dignissim. Quisque lacus dui, maximus a blandit sed, faucibus at urna. Sed aliquam neque bibendum sapien vestibulum varius. Etiam semper bibendum turpis at vehicula. Etiam pretium vel augue quis laoreet. Sed at condimentum felis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sed at volutpat eros. Cras pellentesque dignissim lobortis. Nulla accumsan ex ligula, sed vestibulum ligula bibendum eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque quis ipsum et ante imperdiet euismod vel ut nunc. Morbi faucibus metus vel dolor laoreet porta.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ut consectetur venenatis libero sed tempus. Morbi accumsan nunc id tincidunt varius. Proin auctor felis vitae ligula scelerisque aliquam. Morbi ornare lacus ex, id aliquet tellus dignissim in. Suspendisse nisl sem, pretium nec ultrices id, pulvinar eget sapien.<br></p>
<!-- /wp:paragraph -->',
		],
		'blocks' => [
			'post_title'     => 'Blocks',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1567680785:1',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_wp_page_template' => 'templates/blocks.php',
				'_genesis_layout' => 'narrow-content', 
			],
			'post_content'   => '<!-- wp:cover {"url":"https://genesis-starter.test/wp-content/uploads/2019/06/hero.jpg","id":1774,"align":"full"} -->
<div class="wp-block-cover alignfull has-background-dim" style="background-image:url(https://genesis-starter.test/wp-content/uploads/2019/06/hero.jpg)"><div class="wp-block-cover__inner-container"><!-- wp:heading {"align":"center","level":1} -->
<h1 class="has-text-align-center">Page With Blocks</h1>
<!-- /wp:heading --></div></div>
<!-- /wp:cover -->

<!-- wp:spacer {"height":50} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"className":"has-2-columns"} -->
<div class="wp-block-columns has-2-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia. Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia. Suspendisse eros dui, fringilla sit amet ante et, fringilla tristique justo. In interdum vitae metus ut feugiat. Nulla id bibendum enim. Nulla fringilla metus eget sapien iaculis vulputate.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:gallery {"ids":[899,898,897,896,892,893,894,895],"columns":4,"align":"wide"} -->
<ul class="wp-block-gallery alignwide columns-4 is-cropped"><li class="blocks-gallery-item"><figure><img src="https://genesis-starter.test/wp-content/uploads/2017/07/product-stool-1024-1024.jpg" alt="" data-id="899" data-link="https://genesis-starter.test/product-stool-1024-1024/" class="wp-image-899"/></figure></li><li class="blocks-gallery-item"><figure><img src="https://genesis-starter.test/wp-content/uploads/2017/07/product-phone-1024-1024.jpg" alt="" data-id="898" data-link="https://genesis-starter.test/product-phone-1024-1024/" class="wp-image-898"/></figure></li><li class="blocks-gallery-item"><figure><img src="https://genesis-starter.test/wp-content/uploads/2017/07/product-mug-1024-1024.jpg" alt="" data-id="897" data-link="https://genesis-starter.test/product-mug-1024-1024/" class="wp-image-897"/></figure></li><li class="blocks-gallery-item"><figure><img src="https://genesis-starter.test/wp-content/uploads/2017/07/product-fan-1024-1024.jpg" alt="" data-id="896" data-link="https://genesis-starter.test/product-fan-1024-1024/" class="wp-image-896"/></figure></li><li class="blocks-gallery-item"><figure><img src="https://genesis-starter.test/wp-content/uploads/2017/07/product-amp-1024-1024.jpg" alt="" data-id="892" data-link="https://genesis-starter.test/product-amp-1024-1024/" class="wp-image-892"/></figure></li><li class="blocks-gallery-item"><figure><img src="https://genesis-starter.test/wp-content/uploads/2017/07/product-box-1024-1024.jpg" alt="" data-id="893" data-link="https://genesis-starter.test/product-box-1024-1024/" class="wp-image-893"/></figure></li><li class="blocks-gallery-item"><figure><img src="https://genesis-starter.test/wp-content/uploads/2017/07/product-camera-1024-1024.jpg" alt="" data-id="894" data-link="https://genesis-starter.test/product-camera-1024-1024/" class="wp-image-894"/></figure></li><li class="blocks-gallery-item"><figure><img src="https://genesis-starter.test/wp-content/uploads/2017/07/product-clock-1024-1024.jpg" alt="" data-id="895" data-link="https://genesis-starter.test/product-clock-1024-1024/" class="wp-image-895"/></figure></li></ul>
<!-- /wp:gallery -->

<!-- wp:spacer {"height":20} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading -->
<h2>Latest posts</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:latest-posts {"postsToShow":4,"displayPostContent":true,"excerptLength":24,"displayPostDate":true,"postLayout":"grid","columns":2} /-->

<!-- wp:spacer {"height":20} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->',
		],
		'post' => [
			'post_title'     => 'Post',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'comment_status' => 'open',
			'ping_status'    => 'open',
			'featured_image' => \get_stylesheet_directory() . '/assets/img/placeholder.png',
			'meta_input'     => [ 
				'_edit_lock' => '1568197604:1',
				'_pingme' => '1',
				'_encloseme' => '1',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_thumbnail_id' => 'placeholder', 
			],
			'post_content'   => '<!-- wp:paragraph -->
<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!-- /wp:paragraph -->',
		],
		'blog' => [
			'post_title'     => 'Blog',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => [ 
				'_edit_lock' => '1567214512:1',
				'_edit_last' => '1',
				'_genesis_scripts_body_position' => 'bottom',
				'_genesis_layout' => 'full-width-content', 
			],
			'post_content'   => '',
		],
		
	],
	'navigation_menus' => [
		'primary' => [
			'features' => [
				'title'  => 'Features',
				'id'     => 'features',
			],
			'templates' => [
				'title'  => 'Templates',
				'id'     => 'templates',
			],
			'blocks' => [
				'title'  => 'Blocks',
				'id'     => 'blocks',
				'parent' => 'templates',
			],
			'landing' => [
				'title'  => 'Landing',
				'id'     => 'landing',
				'parent' => 'templates',
			],
			'no-hero' => [
				'title'  => 'No Hero',
				'id'     => 'no-hero',
				'parent' => 'templates',
			],
			'layouts' => [
				'title'  => 'Layouts',
				'id'     => 'layouts',
			],
			'content-sidebar' => [
				'title'  => 'Content Sidebar',
				'id'     => 'content-sidebar',
				'parent' => 'layouts',
			],
			'sidebar-content' => [
				'title'  => 'Sidebar Content',
				'id'     => 'sidebar-content',
				'parent' => 'layouts',
			],
			'full-width' => [
				'title'  => 'Full Width',
				'id'     => 'full-width',
				'parent' => 'layouts',
			],
			'narrow' => [
				'title'  => 'Narrow',
				'id'     => 'narrow',
				'parent' => 'layouts',
			],
			'shop' => [
				'title'  => 'Shop',
				'id'     => 'shop',
			],
			'cart' => [
				'title'  => 'Cart',
				'id'     => 'cart',
				'parent' => 'shop',
			],
			'checkout' => [
				'title'  => 'Checkout',
				'id'     => 'checkout',
				'parent' => 'shop',
			],
			'my-account' => [
				'title'  => 'My Account',
				'id'     => 'my-account',
				'parent' => 'shop',
			],
			'blog' => [
				'title'  => 'Blog',
				'id'     => 'blog',
			],
			'contact' => [
				'title'  => 'Contact',
				'id'     => 'contact',
			],
		],
	],
	'widgets'          => [
				'header-right' => [
			[
				'type' => 'custom_html',
				'args' => [
					'title' => '',
					'content' => '<a href="#" class="button outline small">Start Now</a>',
				],
			],
		],
		'sidebar' => [
			[
				'type' => 'search',
				'args' => [
					'title' => 'Search',
				],
			],			[
				'type' => 'recent-posts',
				'args' => [
					'title' => '',
					'number' => '5',
					'show_date' => '',
				],
			],			[
				'type' => 'categories',
				'args' => [
					'title' => 'Categories',
					'count' => '0',
					'hierarchical' => '0',
					'dropdown' => '0',
				],
			],
		],
		'front-page-1' => [
			[
				'type' => 'custom_html',
				'args' => [
					'title' => 'Welcome to the Genesis Starter Theme',
					'content' => '<p>A configuration based starter theme built for developers.</p>

<br>

<button onclick="show(&apos;modal&apos;)">Get Genesis Starter</button>

<div class="modal">
	<h3>Modal popup</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</p>
	<a href="https://genesisstartertheme.com" target="_blank">Go to Website</a>
	<button class="close" onclick="hide(&apos;modal&apos;)">Close Modal</button>
</div>',
				],
			],
		],
		'front-page-2' => [
			[
				'type' => 'text',
				'args' => [
					'title' => 'Modern build process',
					'text' => '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</div>
<div></div>',
					'filter' => '1',
					'visual' => '1',
					'column-classes' => 'one-third',
					'column-classes-first' => '1',
				],
			],			[
				'type' => 'text',
				'args' => [
					'title' => 'Config based customization',
					'text' => '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</div>
<div></div>',
					'filter' => '1',
					'visual' => '1',
					'column-classes' => 'one-third',
				],
			],			[
				'type' => 'text',
				'args' => [
					'title' => 'Gutenberg & AMP ready',
					'text' => '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque venenatis augue eget lacinia.</div>
<div></div>',
					'filter' => '1',
					'visual' => '1',
					'column-classes' => 'one-third',
				],
			],
		],
		'front-page-3' => [
			[
				'type' => 'custom_html',
				'args' => [
					'title' => '',
					'content' => '<h3>Built for developers</h3>

<p>
	A configuration based drop-in library for extending Genesis child themes. See an example of how to integrate the library here or check out the live demo.
A configuration based drop-in library for extending Genesis child themes. See an example of how to integrate the library here or check out the live demo. A configuration based drop-in library for extending Genesis child themes.
</p>
<a href="#" class="button outline">Get Genesis Starter</a>',
					'column-classes' => 'one-half',
					'column-classes-first' => '1',
				],
			],			[
				'type' => 'media_image',
				'args' => [
					'attachment_id' => '0',
					'url' => 'https://via.placeholder.com/1280x720/f5f5f5/f5f5f5?text=Placeholder',
					'title' => '',
					'size' => 'large',
					'width' => '1280',
					'height' => '720',
					'caption' => '',
					'alt' => 'placeholder',
					'link_type' => 'custom',
					'link_url' => '',
					'image_classes' => '',
					'link_classes' => '',
					'link_rel' => '',
					'link_target_blank' => '',
					'image_title' => '',
					'column-classes' => 'one-half',
				],
			],
		],
		'front-page-4' => [
			[
				'type' => 'featured-post',
				'args' => [
					'title' => '',
					'posts_cat' => '0',
					'posts_num' => '3',
					'posts_offset' => '0',
					'orderby' => 'date',
					'order' => 'DESC',
					'gravatar_size' => '45',
					'gravatar_alignment' => 'alignnone',
					'show_image' => '1',
					'image_size' => 'featured',
					'image_alignment' => 'alignnone',
					'show_title' => '1',
					'show_byline' => '1',
					'post_info' => '[post_date] By [post_author_posts_link] [post_comments]',
					'show_content' => 'content-limit',
					'content_limit' => '200',
					'more_text' => '[Read More...]',
					'extra_title' => '',
					'extra_num' => '0',
					'more_from_category' => '1',
					'more_from_category_text' => 'More Posts from this Category',
					'column-classes' => 'full-width',
				],
			],
		],
		'front-page-5' => [
			[
				'type' => 'custom_html',
				'args' => [
					'title' => 'Ready to get started?',
					'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.',
					'column-classes' => 'three-fourths',
					'column-classes-first' => '1',
				],
			],			[
				'type' => 'custom_html',
				'args' => [
					'title' => '',
					'content' => '<a href="#" class="button alignright">Get Started</a>',
					'column-classes' => 'one-fourth',
				],
			],
		],
		'footer-1' => [
			[
				'type' => 'text',
				'args' => [
					'title' => 'Design',
					'text' => 'With an emphasis on typography, white space, and mobile-optimized design, your website will look absolutely breathtaking.

<a href="#">Learn more about design</a>',
					'filter' => '1',
					'visual' => '1',
				],
			],
		],
		'footer-2' => [
			[
				'type' => 'text',
				'args' => [
					'title' => 'Content',
					'text' => 'Our team will teach you the art of writing audience-focused content that will help you achieve the success you truly deserve.

<a href="#">Learn more about content</a>',
					'filter' => '1',
					'visual' => '1',
				],
			],
		],
		'footer-3' => [
			[
				'type' => 'text',
				'args' => [
					'title' => 'Strategy',
					'text' => 'We help creative entrepreneurs build their digital business by focusing on three key elements of a successful online platform.

<a href="#">Learn more about strategy</a>',
					'filter' => '1',
					'visual' => '1',
				],
			],
		],

	],
];
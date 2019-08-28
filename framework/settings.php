<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );

add_image_size('homepage-slide', 1920, 780, true);
add_image_size('homepage-featured-post', 688, 414, true);
add_image_size('produkte-image', 335, 289, true);

# Register option pages
if( function_exists('acf_add_options_sub_page') ){
	acf_add_options_page(array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'menu_slug'  => 'theme-options',
		'capability' => 'manage_options',
		//'icon_url'   => get_template_directory_uri() . '/images/icons/favicon.png'
	));
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');
<?php defined('ABSPATH') or die('Direct access is forbidden!');

/**
 * Enqueue scripts and styles for front-end.
 */
function theme_styles()
{
    # jQuery
    wp_enqueue_script('jquery');

    # Fonts
    wp_enqueue_style('fontawesome_style', public_dir() . '/css/fontawesome-all.min.css');
    wp_enqueue_style('fonts-style', public_dir() . '/fonts/fonts.css');

    # Stylesheets
    //wp_enqueue_style('stylesheet', get_template_directory_uri().'/css/custom.css', false, date('dmYHisu'));

    # Other(s)
    wp_enqueue_style('iealert_style', public_dir() . '/css/iealert/style.css');

    /**
     */

    # Other(s)
    wp_register_script('modernizer_script', public_dir() . '/js/modernizr_2.8.3.js', '', '', false);
    wp_enqueue_script('modernizer_script', array('jquery'));

    wp_register_script('iealert_script', public_dir() . '/js/iealert.min.js', '', '', true);
    wp_enqueue_script('iealert_script', array('jquery'));

    # Main JavaScript File
    //wp_register_script('scripts', get_template_directory_uri().'/js/custom.js', '', date('YmdHGis'), false);
    //wp_enqueue_script('scripts', array('jquery'), true);

    wp_register_script('scripts', public_dir() . '/js/script.js', '', false, true);
    wp_enqueue_script('scripts', array('jquery'));

    # Loads our main stylesheet.
    wp_enqueue_style('site-style', get_stylesheet_uri(), false, '');

}

add_action('wp_enqueue_scripts', 'theme_styles');




// add_filter('style_loader_tag', 'theme_styles_remove_type_attr', 10, 2);
// add_filter('script_loader_tag', 'theme_styles_remove_type_attr', 10, 2);
// function theme_styles_remove_type_attr($tag, $handle) {
//     return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
// }
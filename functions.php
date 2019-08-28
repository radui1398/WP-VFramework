<?php defined('ABSPATH') or die('Direct access is forbidden!');
/**
 * This is required for $_SESSION variables to work.
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

define('THEME_TEXT_DOMAIN', 'theme_slug');
define('THEME_DIR',get_template_directory_uri());

/**
 * FRAMEWORK
 */
# Functions Controller
require_once TEMPLATEPATH . '/controllers/WPFunctions.php';
# General theme setup,
require_once TEMPLATEPATH . '/framework/general.php';
# Register Enqueue
require_once TEMPLATEPATH . '/controllers/Enqueue.php';
# Register Post Type
require_once TEMPLATEPATH . '/framework/post-types.php';
# Register navigation menus
require_once TEMPLATEPATH . '/framework/navigation.php';
# Theme security
require_once TEMPLATEPATH . '/framework/security.php';
# Settings page
require_once TEMPLATEPATH . '/framework/settings.php';
# Util Functions
require_once TEMPLATEPATH . '/framework/util.php';

# TGM Plugin Activation
require_once dirname(__FILE__) . '/framework/addons/plugins/config.php';

$plugins = new Enqueue();
$plugins->addCSS('fontawesome-all.min');
$plugins->addFont('fonts.css');
$plugins->addCSS('iealert/style');
$plugins->addJS('modernizr_2.8.3');
$plugins->addJS('iealert.min');
$plugins->addPlugin('hc-navmenu');

$plugins->init();

$functions = new WPFunctions();

$functions->setAjax(true);
$functions->setAutoHomepage(true);
$functions->setHideAdminBar(true);
$functions->setTodo(false);
$functions->setWoocommerce(false);

$functions->init();



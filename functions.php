<?php
# Configuration
require_once TEMPLATEPATH . '/framework/config.php';

$plugins = new Enqueue();
$plugins->addCSS('fontawesome-all.min');
$plugins->addFont('fonts.css');
$plugins->addCSS('iealert/style');
$plugins->addJS('modernizr_2.8.3');
$plugins->addJS('iealert.min');
$plugins->addPlugin('hc-navmenu');
$plugins->addPlugin('slick');
$plugins->addCSS('slick-theme');
$plugins->init();

$theme = new Theme();

$theme->setAjax(true);
$theme->setAutoHomepage(true);
$theme->setHideAdminBar(true);
$theme->setTodo(false);
$theme->setWoocommerce(false);
$theme->customThumbnailSize(1400,475,true);

$theme->imageSize('homepage-slide', 1920, 780, true);


$theme->init();

$headerMenu = new Menu('header_menu','Header Menu', array('container'=> ''));

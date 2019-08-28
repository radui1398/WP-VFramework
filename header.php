<?php

include 'templates/head.php';
include 'controllers/Header.php';

/*
 * Options:
 * + SetHeaderColor($color);
 * + SetBodyColor($color);
 * + SetHeaderClass($class);
 * + SetBodyClass($class);
 * + SetBeforeHeaderHTML($html);
 * + setHeaderHTML($html);
 */
$header = new Header();
$header->generate();

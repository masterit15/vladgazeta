<?php
/* Define these, So that WP functions work inside this file */
define('WP_USE_THEMES', false);
require( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

$result = array('jopa'=>true);

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
echo json_encode($result);
<?php

ini_set('display_errors', 1);

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:GET');
header('Content-Type: application/json, text/html; charset=utf-8');
header('Access-Control-Allow-Headers: *');

include '../../includes/autoloader-class.php';
include '../../includes/utility.php';

if(authAPI()) {
    if(getParam()) {
        if(isset($_GET['res_id']) && isset($_GET['name'])) {
           $res_id = $_GET['res_id'];
           $menu = new ReviewView();
           echo $menu->showAllReviews($res_id);
        }
    }
}




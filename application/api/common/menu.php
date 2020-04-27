<?php

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:GET');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: *');

include '../../includes/autoloader-class.php';
include '../../includes/utility.php';

if(authAPI()) {
    if(getParam()) {
        if(isset($_GET['res_id']) && isset($_GET['name'])) {
           $res_id = $_GET['res_id'];
           $menu = new MenuView();
           echo $menu->showAllMenus($res_id);
        }
    }
}




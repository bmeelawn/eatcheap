<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, text/html; charset=UTF-8');
header('Access-Control-Allow-Method: POST');

include '../../includes/autoloader-class.php';
include '../../includes/utility.php';

if(authAPI()) {

    if(isset($_POST)) {
        $userlogin = new LoginView();
        echo $userlogin->viewUserDetails($_POST['username'], $_POST['password']);
    }   
}

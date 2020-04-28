<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, text/html; charset=UTF-8');
header('Access-Control-Allow-Method: POST');

include '../../includes/autoloader-class.php';
include '../../includes/utility.php';

if(authAPI()) {

    $userlogin = new LoginView();

    $headers = getallheaders();

    if($headers["Content-Type"]=="text/plain") {
        $_POST = json_decode(file_get_contents('php://input'),true);
    }

    if(isset($_POST['username']) && isset($_POST['password'])) {
        if(empty(isEmpty())) {
        echo $userlogin->viewUserDetails($_POST['username'], $_POST['password']);
        } else {
            echo isEmpty();
        }
    } 
} 

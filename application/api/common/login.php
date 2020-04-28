<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, text/html; charset=UTF-8');
header('Access-Control-Allow-Method: POST');

include '../../includes/autoloader-class.php';
include '../../includes/utility.php';

if(authAPI()) {

    $userlogin = new LoginView();

    if(isset($_POST['username']) && isset($_POST['password'])) {
        if(empty(isEmpty())) {
        echo $userlogin->viewUserDetails($_POST['username'], $_POST['password']);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Username and password not set",
                'data' => null
                ]); 
            }
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Param not set.",
            'data' => null
            ]); 
        } 
} 

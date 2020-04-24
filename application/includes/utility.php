<?php
include  $_SERVER['DOCUMENT_ROOT'].'/eatcheap/vendor/autoload.php';

function authAPI() {
    $headers = getallheaders(); // Get all Request headers
    $dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'].'/eatcheap'); // Innstanitation of dotenv class
    $dotenv->load();
    $authKey = $_ENV['API_KEY'];

    if(array_key_exists('x-api-key', $headers)) {  // Check if header x-api-key exist
        $x_api_key = $headers['x-api-key'];
        if($x_api_key === $authKey) {
            return true;
        } else {    // Show error if key is incorrect
        echo json_encode(

            array('status' => false,'message' => "API Key Incorrect")
            );
        }  
    }
        else { // If header x-api-key doesn't exists.
        echo json_encode(
        array(
            'status' => false,
            'message' => "API Key missing. Every request requires an API Key to be sent."
            )
        );
    }
}
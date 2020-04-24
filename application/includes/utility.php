<?php
function authAPI() {
    $headers = getallheaders(); // Get all Request headers
    $authKey = "12345";

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
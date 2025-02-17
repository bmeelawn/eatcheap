<?php

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:GET');
header('Content-Type: application/json');

include '../../includes/autoloader-class.php';
include '../../includes/utility.php';

if(authAPI()) {
    $entityBody = json_decode(file_get_contents('php://input'), true);
    $searchValue = $entityBody['searchValue'];
    $geocodeView = new GeocodeView();
    echo $geocodeView->showSearchResults($searchValue);
}






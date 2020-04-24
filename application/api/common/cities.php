<?php

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:GET');
header('Content-Type: application/json');

include '../../includes/autoloader-class.php';
include '../../includes/utility.php';

if(authAPI()) {
    $category = new CitiesView();
    echo $category->showAllCities();
}




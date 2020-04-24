<?php
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:GET');
header('Content-Type: application/json');

include '../../includes/autoloader-class.php';
include '../../includes/utility.php';

// if(authAPI()) {
$restaurant = new RestaurantView();
echo $restaurant->showAllRestaurant();
// }




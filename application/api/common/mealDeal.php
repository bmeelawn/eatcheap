<?php
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:GET');
header('Content-Type: application/json');

include '../../includes/autoloader-class.php';
include '../../includes/utility.php';

// if(authAPI()) {
$deal = new DealView();
echo $deal->showAllDeals();
// }




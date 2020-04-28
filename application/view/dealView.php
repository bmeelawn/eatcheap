<?php

include '../../model/dealModel.php';

class DealView extends DealModel {
    private $data = array();
    private $arrR;
    public function showAllDeals() {
       $results =  $this->getDeals();
       $count = $this->getCount();
       // Check Record > 0
       if($count > 0) {
       // Fetch Deals Data
       foreach($results as $key => $values) {

        // Get all Restaurants
        $this->viewAllRestaurants();     
         
        // Adding data into Array
           $arr = array(
            'food_id' => $results[$key]['meal_id'],
            'food_name' => $results[$key]['food_name'],
            'food_image' => $results[$key]['food_image'],
            'restaurants' => $this->arrR  
           );
           // Push Deals Data Into Data Array
           array_push($this->data, $arr);
       }
         // Set HTTP Response -200 OK
         http_response_code(200);
         // Show Data in JSON Format
         return json_encode([
            "status" => true,
            "message" => "Data is found.",
            "data" => $this->data    
            ]);
     } else {
         // Set HTTP Response -404 ERROR
         http_response_code(404);
         // Show Data in JSON Format
         return json_encode([
            "status" => false,
            "message" => "No data is found.",
            "data" => $this->data    
            ]);
     }
}

    function viewAllRestaurants() {
        $restaurant = $this->getResturant();
        $countReview = $this->getCount();

        $this->arrR = [];

        if($countReview > 0) {
        foreach($restaurant as $key => $values) {

             // IMAGE File Location
         $thmbImg = $restaurant[$key]['thumbnail_image'];
         $resImg = $restaurant[$key]['restaurant_image'];
         $imagePath = 'https'. '://' . $_SERVER['HTTP_HOST'] . '/images/restaurant/';
         $filePath = '../../../images/restaurant/';
 
         if(file_exists($filePath . $resImg)) {
             $resImgUrl = $imagePath . $resImg;
         }
         if(file_exists($filePath . $thmbImg)) {
             $thmbImgUrl = $imagePath . $thmbImg;
         }  

           $arrRes = [
            'restaurant_id' => $restaurant[$key]['res_id'],
            'country_name' => $restaurant[$key]['country_name'],
            'city_name' => $restaurant[$key]['city_name'],
            'restaurnat_name' => $restaurant[$key]['restaurant_name'],
            'restaurant_hours' => $restaurant[$key]['restaurant_hours'],
            'cuisine_name' => $restaurant[$key]['cuisine_name'],
            'cuisines' => $restaurant[$key]['cuisines'],
            'address' => $restaurant[$key]['location'],
            'establishment_name' => $restaurant[$key]['name'],
            'average_cost' => $restaurant[$key]['average_cost'],
            'restaurant_image' => $resImgUrl,
            'thumbnail_image' => $thmbImgUrl,
           ];
        array_push($this->arrR, $arrRes);
        } 
    }           
    }
}


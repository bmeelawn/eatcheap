<?php

include '../../model/dealModel.php';

class DealView extends DealModel {
    private $data = array();
    public function showAllDeals() {
       $results =  $this->getDeals();
       $count = $this->getCount();
       // Check Record > 0
       if($count > 0) {
       // Fetch Deals Data
       foreach($results as $key => $values) {

        // Get Review for a Restaurant
        $id = $results[$key]['res_id'];
        $reviews = $this->getReviews($id);
        $countReview = $this->getCount();

        // IMAGE File Location
        $thmbImg = $results[$key]['thumbnail_image'];
        $resImg = $results[$key]['restaurant_image'];
        $imagePath = 'https'. '://' . $_SERVER['HTTP_HOST'] . '/images/restaurant/';
        $filePath = '../../../images/restaurant/';

        if(file_exists($filePath . $resImg)) {
            $resImgUrl = $imagePath . $resImg;
        }
        if(file_exists($filePath . $thmbImg)) {
            $thmbImgUrl = $imagePath . $thmbImg;
        }  
         
        // Adding data into Array
           $arr = array(
            'food_id' => $results[$key]['meal_id'],
            'food_name' => $results[$key]['food_name'],
            'food_image' => $results[$key]['food_image'],      
           );

           $arrR = [];

           if($countReview > 0) {
           foreach($reviews as $key => $values) {
            $arrReview =[    
            'name' => $reviews[$key]['name'],
            'comment' => $reviews[$key]['review']
            ];  
            array_push($arrR, $arrReview);           
        }  
    }

           $arr['restaurant'] = [
            'country_name' => $results[$key]['country_name'],
            'city_name' => $results[$key]['city_name'],
            'restaurnat_name' => $results[$key]['restaurant_name'],
            'restaurant_hours' => $results[$key]['restaurant_hours'],
            'cuisine_name' => $results[$key]['cuisine_name'],
            'cuisines' => $results[$key]['cuisines'],
            'address' => $results[$key]['location'],
            'establishment_name' => $results[$key]['name'],
            'average_cost' => $results[$key]['average_cost'],
            'restaurant_image' => $resImgUrl,
            'thumbnail_image' => $thmbImgUrl,
            'review' => $arrR
           ];

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
}


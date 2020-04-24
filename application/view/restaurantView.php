<?php

include '../../model/restaurantModel.php';

class RestaurantView extends RestaurantModel {
    private $dataDetails= array();
    private $data = array();
    public function showAllRestaurant() {
       $resultLocation =  $this->getCities();
       $resultDetails = $this->getDetails();
       $count = $this->getCount();

       if($count > 0) {
       foreach($resultDetails as $key => $values) {

        $arr = array(
        'place_details' =>[
                'country_name' => $resultLocation[$key]['country_name'],
                'city_name' => $resultLocation[$key]['city_name']      
        ],
         'restaurant_id' => $resultDetails[$key]['restaurant_id'],
         'restaurant_name' => $resultDetails[$key]['restaurant_name'],
         'special_item' => $resultDetails[$key]['special_item'],
         'restaurant_hours' => $resultDetails[$key]['restaurant_hours'],
         'cuisine_name' => $resultDetails[$key]['cuisine_name'],
         'establishment_name' => $resultDetails[$key]['establishment_name'],
         'description' => $resultDetails[$key]['description'],
         'address' => $resultDetails[$key]['location'],
         'rating' => $resultDetails[$key]['rating'],
         'restaurant_image' => $resultDetails[$key]['restaurant_image'],
         'food_image' => $resultDetails[$key]['food_image'],
         'cuisine_name' => $resultDetails[$key]['cuisine_name'],
         'establishment_name' => $resultDetails[$key]['establishment_name'],
         'thumbnail_image' => $resultDetails[$key]['thumbnail_image'],
         'cuisines' => $resultDetails[$key]['cuisines']
        );

        $imgs= $resultDetails[$key]['images'];
        $imageArr = explode(",", $imgs);
        $images['images'] = [];
        foreach($imageArr as $key=>$values) {
            $imagePath = 'http://localhost/eatcheap/images/restaurant/';
            $filePath = '../../../images/restaurant/';
            if(file_exists($filePath . $imageArr[$key])) {
                array_push($images['images'], $imagePath . $imageArr[$key]);
            }   
        }
        
        // Push Restaurant Data Into Array
        array_push($this->dataDetails, array_merge($arr, $images));
    }
        // Set HTTP Response -200 OK
        http_response_code(200);
        // Show Data in JSON Format
        return json_encode([
            "status" => true,
            "message" => "Data is found.",
            "data" => $this->dataDetails    
            ]);
    } else {
        // Set HTTP Response -404 ERROR
        http_response_code(404);
        // Show Data in JSON Format
        return json_encode([
            "status" => false,
            "message" => "No data is found.",
            "data" => $this->dataDetails    
            ]);
    }
    }
}


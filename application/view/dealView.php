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
           $arr = array(
            'deal_id' => $results[$key]['id'],
            'food_name' => $results[$key]['food_name'],
            'food_image' => $results[$key]['food_image'],
            'meal_deals' => $results[$key]['meals_deals']      
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
}


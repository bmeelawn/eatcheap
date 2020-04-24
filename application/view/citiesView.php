<?php

include '../../model/citiesModel.php';

class CitiesView extends CitiesModel {
    private $data=[];
    public function showAllCities() {
       $results =  $this->getCities();
       $count = $this->getCount();


        if($count > 0) {
       // Fetch Cities Data
       foreach($results as $key => $values) {
           $arr = [
            'city_id' => $results[$key]['id'],
            'city_name' => $results[$key]['name'],
            'country_id' => $results[$key]['cid'],
            'country_name' => $results[$key]['cname']
            ];
           // Push Cities Data Into Data Array
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


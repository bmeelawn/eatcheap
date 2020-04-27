<?php

include '../../model/reviewModel.php';

class ReviewView extends ReviewModel {
    private $data = array();

   public function showAllReviews($res_id) {
        $result = $this->getReviews($res_id);
        $count = $this->getCount();

        if($count > 0) {
            $this->data['reviews'] =[]; 
        // Fetch Categories
        foreach($result as $key=>$values) {

            $id = ['restaurant_id' => $result[$key]['restaurant_id']];
            $arr = [
                'comment' => htmlspecialchars($result[$key]['review']),
                'name' => $result[$key]['name']
            ];
        // Push Data Into Data Array
        array_push($this->data['reviews'], $arr);
        }
           // Set HTTP Response -200 OK
           http_response_code(200);
           // Show Data in JSON Format
           return json_encode([
               "status" => true,
               "message" => "Data is found.",
               "data" => array_merge($id, $this->data)  
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

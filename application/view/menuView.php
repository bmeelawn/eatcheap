<?php

include '../../model/menuModel.php';

class MenuView extends MenuModel {
    private $data = array();

   public function showAllMenus($res_id) {
        $result = $this->getMenus($res_id);
        $count = $this->getCount();

        if($count > 0) {
            $this->data['items'] =[]; 
        // Fetch Categories
        foreach($result as $key=>$values) {

            $id = ['restaurant_id' => $result[$key]['restaurant_id']];
            $arr = [
                'food_name' => $result[$key]['name'],
                'food_image' => $result[$key]['food_image'],
                'price' => $result[$key]['price']
            ];
        // Push Data Into Data Array
        array_push($this->data['items'], $arr);
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

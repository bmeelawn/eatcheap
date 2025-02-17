<?php

include '../../model/popularFoodModel.php';

class PopularfoodView extends PopularFoodModel {
    private $data = array();
    public function viewPopularFoods() {
        $result =  $this->getPopularFoods();
        $count = $this->getCount();
        // Check Record > 0
        if($count > 0) {
        // Fetch Food Data
            foreach($result as $key => $values) {
                
                $imgName= $result[$key]['food_image'];
                $imagePath = 'https'. '://' . $_SERVER['HTTP_HOST'] . '/images/restaurant/';
                $filePath = '../../../images/restaurant/';

                if(file_exists($filePath . $imgName)) {
                    $imageUrl = $imagePath . $imgName;
                }   

                $arr = array(
                'restaurant_id' => $result[$key]['res_id'],
                'restaurnat_name' => $result[$key]['restaurant_name'],
                'cuisine_name' => $result[$key]['cuisine_name'],
                'address' => $result[$key]['location'],
                'cuisines' => $result[$key]['cuisines'],
                'establishment_name' => $result[$key]['name'],
                'food_image' => $imageUrl,
                'food_name' => $result[$key]['special_item']
            );
            $imgs= $result[$key]['images'];
            $imageArr = explode(",", $imgs);
            $images['images'] = [];
            foreach($imageArr as $key=>$values) {
                $imagePath = 'https'. '://' . $_SERVER['HTTP_HOST'] . '/images/restaurant/';
                $filePath = '../../../images/restaurant/';
                if(file_exists($filePath . $imageArr[$key])) {
                    array_push($images['images'], $imagePath . $imageArr[$key]);
                }   
            }
            
            // Push Restaurant Data Into Array
            array_push($this->data, array_merge($arr, $images));
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

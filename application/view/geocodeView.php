<?php

include '../../model/geocodeModel.php';

class GeocodeView extends GeocodeModel {
    private $data = array();

   public function showSearchResults($userSearchValue) {
     $userInput = strip_tags(trim($userSearchValue));
     $check = $this->checkResults($userInput);

        if($check) {
            $result = $this->getCities();
            // Fetch Restaurant Data
            foreach($result as $key => $values) {

                $resImg = $result[$key]['restaurant_image'];
                $imagePath = 'http://localhost/eatcheap/images/restaurant/';
                $filePath = '../../../images/restaurant/';

                if(file_exists($filePath . $resImg)) {
                    $resImgUrl = $imagePath . $resImg;
                }
                
                $arr = array(
                'country_name' => $result[$key]['cname'],
                'city_name' => $result[$key]['name'],
                'restaurnat_name' => $result[$key]['restaurant_name'],
                'restaurant_image' => $resImgUrl
            );
                // Push Restaurant Data Into Data Array
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

<?php

include '../../model/popularResModel.php';

class PopularresView extends PopularResModel {
    private $data = array();
    private $arrR;

    public function viewPopularRestaurants() {
        $result =  $this->getPopularRestaurant();
        $count = $this->getCount();

        // Check $result > 0
        if($count > 0) {
            // Fetch Restaurant Data
            foreach($result as $key => $values) {

                // Get Review for a Restaurant
                $res_id = $result[$key]['res_id'];
                $this->viewReviews($res_id);
               

                $thmbImg = $result[$key]['thumbnail_image'];
                $resImg = $result[$key]['restaurant_image'];
                $imagePath = 'https'. '://' . $_SERVER['HTTP_HOST'] . '/images/restaurant/';
                $filePath = '../../../images/restaurant/';

                if(file_exists($filePath . $resImg)) {
                    $resImgUrl = $imagePath . $resImg;
                }
                if(file_exists($filePath . $thmbImg)) {
                    $thmbImgUrl = $imagePath . $thmbImg;
                } 
            
                $arr = array(
                'restaurant_id' => $result[$key]['res_id'],
                'country_name' => $result[$key]['country_name'],
                'city_name' => $result[$key]['city_name'],
                'restaurant_name' => $result[$key]['restaurant_name'],
                'restaurant_hours' => $result[$key]['restaurant_hours'],
                'cuisine_name' => $result[$key]['cuisine_name'],
                'cuisines' => $result[$key]['cuisines'],
                'address' => $result[$key]['location'],
                'establishment_name' => $result[$key]['name'],
                'average_cost' => $result[$key]['average_cost'],
                'restaurant_image' => $resImgUrl,
                'thumbnail_image' => $thmbImgUrl,
                'reviews' => $this->arrR
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
                "status" => true,
                "message" => "No data is found.",
                "data" => $this->data    
                ]);
        }

    }

    private function viewReviews($res_id) {
        $reviews = $this->getReviews($res_id);
        $countReview = $this->getCount();

        $this->arrR = [];

        if($countReview > 0) {
        foreach($reviews as $key => $values) {
        $arrReview =[    
        'name' => $reviews[$key]['name'],
        'comment' => $reviews[$key]['review']
        ];  
        array_push($this->arrR, $arrReview);
        } 
    }
}
}

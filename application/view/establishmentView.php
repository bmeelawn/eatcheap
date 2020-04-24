<?php

include '../../model/establishmentModel.php';

class EstablishmentView extends EstablishmentModel {
    private $data = array();

   public function showAllEstablishment() {
        $result = $this->getEstablishment();
        $count = $this->getCount();
        // Check Record > 0
        if($count > 0) {
        // Fetch Categories
        foreach($result as $key=>$values) {
            $arr = array(
                'establishment_id' => $result[$key]['id'],
                'establishment_name' => $result[$key]['name']
            );
        // Push Data Into Data Array
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
            "message" => " No data is found.",
            "data" => $this->data    
            ]);
     }
    }
}

<?php

include '../../model/commonModel.php';

class CommonView extends CommonModel {
    private $data = array();

   public function showAllCategories() {
        $result = $this->getCategories();
        $count = $this->getCount();

        if($count > 0) {
        // Fetch Categories
        foreach($result as $key=>$values) {
            $arr = array(
                'category_id' => $result[$key]['id'],
                'category_name' => $result[$key]['category_name']
            );
        // Push Data Into Data Array
        array_push($this->data, $arr);
        }
        // Set HTTP Response -200 OK
        http_response_code(200);
        // Show Data in JSON Format
        return json_encode($this->data);
    } else {
        // Set HTTP Response -404 ERROR
        http_response_code(404);
        // Show Data in JSON Format
        return json_encode(
            array('message' => 'No Data Found.')
        );
    }
    }
}

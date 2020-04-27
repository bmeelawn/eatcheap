<?php

include '../../config/database.php';

class ReviewModel extends DBConnection {
    protected function getReviews($res_id) {
        $sql = "SELECT r.id as restaurant_id, re.review, re.name
        FROM review AS re
       LEFT JOIN restaurants AS r ON  re.restaurant_id = r.id
       WHERE re.restaurant_id = ?";
       $this->prepare($sql);
       $this->bindValue(1, $res_id);
       $result = $this->execute();
       return $this->resultSet();
       }
       protected function getCount() {
        return $this->rowCount(); 
    }
}
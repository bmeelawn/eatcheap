<?php

include '../../config/database.php';

class DealModel extends DBConnection{
    protected function getDeals() {
        $sql = "SELECT * FROM meals";
        $this->prepare($sql);
        $this->execute();
        return $this->resultSet();
    }
    protected function getCount() {
        return $this->rowCount(); 
    }   
}
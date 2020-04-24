<?php

include '../../config/database.php';
class CommonModel extends DBConnection{
    protected function getcategories() {
        $sql = "SELECT * FROM categories";
        $this->prepare($sql);
        $this->execute();
        return $this->resultSet();
    }
    protected function getCount() {
        return $this->rowCount(); 
    } 
}
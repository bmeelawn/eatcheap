<?php

include '../../config/database.php';

class MenuModel extends DBConnection {
    protected function getMenus($res_id) {
        $sql = "SELECT r.id as restaurant_id, m.id, m.name, m.price 
        FROM menu AS m
       LEFT JOIN restaurants AS r ON  m.restaurant_id = r.id
       WHERE m.restaurant_id = ?";
       $this->prepare($sql);
       $this->bindValue(1, $res_id);
       $result = $this->execute();
       return $this->resultSet();
       }
       protected function getCount() {
        return $this->rowCount(); 
    }
}
<?php

include '../../config/database.php';

class CitiesModel extends DBConnection{
    protected function getCities() {
        $sql = "SELECT c.id as cid, c.name as cname, ci.id, ci.name
         FROM cities AS ci
          LEFT JOIN countries AS c ON ci.con_id = c.id";
        $this->prepare($sql);
        $result = $this->execute();
        return $this->resultSet();
    }
    protected function getCount() {
        return $this->rowCount(); 
    }
}
<?php

include '../../config/database.php';

class GeocodeModel extends DBConnection {
    public $userInput;
    public $cityId;
    public $countryId;

    protected function getCities() {
        if(isset($this->cityId)) {
        $sql = "SELECT c.id as cid, c.name as cname, ci.id, ci.name, r.id, r.restaurant_name, r.restaurant_image FROM cities AS ci 
        LEFT JOIN countries AS c ON ci.con_id = c.id
        LEFT JOIN restaurants AS r ON ci.id = r.city_id
        WHERE ci.id = ?";
        $this->prepare($sql);
        $this->bindValue(1, $this->cityId);
        $result = $this->execute();
        return $this->resultSet();
        } else if(isset($this->countryId)) {
            $sql = "SELECT r.id, r.restaurant_name,  r.restaurant_name, r.restaurant_image, c.id as cid, c.name as cname, ci.id, ci.name FROM countries AS c 
            LEFT JOIN cities AS ci ON c.id = ci.con_id
            LEFT JOIN restaurants AS r ON ci.id = r.city_id
            WHERE c.id = ?";
            $this->prepare($sql);
            $this->bindValue(1, $this->countryId);
            $result = $this->execute();
            return $this->resultSet();
        }
    }
    
    protected function checkResults($userSearchValue) {
        $this->userInput = $userSearchValue;
        if($this->searchQueryCity() || $this->searchQueryCountry()) {
            return true;
        } else {
            return false;
        }
    }
    private function searchQueryCity() {
        $sql = "SELECT * FROM cities WHERE name = ?";
        $this->prepare($sql);
        $this->bindValue(1, $this->userInput);
        $this->execute();
        $result = $this->single();
        $count = $this->rowCount();
        if($count > 0) {
                $this->cityId = $result['id'];
                return true;                
            }
        }
    private function searchQueryCountry() {
        $sql = "SELECT * FROM countries WHERE name = ?";
        $this->prepare($sql);
        $this->bindValue(1, $this->userInput);
        $this->execute();
        $result = $this->single();
        $count = $this->rowCount();
        if($count > 0) {
            $this->countryId = $result['id'];
                return true;                
          
            }
    }
    
}

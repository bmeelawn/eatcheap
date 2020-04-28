<?php

include '../../config/database.php';

class PopularFoodModel extends DBConnection {
    protected function getPopularFoods() {
        $sql = "SELECT r.is_food_popular, r.food_image, r.restaurant_name,r.average_cost, r.id as res_id,
         r.location, r.images, r.cuisines, r.special_item, cu.cuisine_name, cu.id, e.id, e.name
         FROM restaurants AS r
        LEFT JOIN cuisines AS cu ON  r.cuisine_id = cu.id
        LEFT JOIN establishment AS e ON  r.establishment_id = e.id
        WHERE r.is_food_popular = ?";
        $this->prepare($sql);
        $this->bindValue(1, 1);
        $result = $this->execute();
        return $this->resultSet();
        }  
        protected function getCount() {
            return $this->rowCount(); 
        }
}
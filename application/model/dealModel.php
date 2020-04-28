<?php

include '../../config/database.php';

class DealModel extends DBConnection{
    protected function getDeals() {
        $sql = "SELECT m.id as meal_id, m.food_name, m.food_image, r.restaurant_name, m.restaurant_id,
                    r.most_popular, r.images, r.thumbnail_image, r.id as res_id,
         r.restaurant_image, r.cuisines, r.restaurant_hours, r.average_cost, 
         r.location, cu.cuisine_name, cu.id, ci.name as city_name, c.name as country_name,
         e.name
         FROM restaurants AS r
        LEFT JOIN meals AS m ON m.restaurant_id = r.id
        LEFT JOIN cuisines AS cu ON r.cuisine_id = cu.id
        LEFT JOIN cities AS ci ON r.city_id = ci.id
        LEFT JOIN countries AS c ON ci.con_id = c.id
        LEFT JOIN establishment AS e ON r.establishment_id = e.id
        WHERE m.restaurant_id = r.id";
        $this->prepare($sql);
        $this->execute();
        return $this->resultSet();
    }
    protected function getCount() {
        return $this->rowCount(); 
    }   
    protected function getResturant() {
        $sql = "SELECT m.id as meal_id, m.food_name, m.food_image, r.restaurant_name, m.restaurant_id,
        r.most_popular, r.images, r.thumbnail_image, r.id as res_id,
        r.restaurant_image, r.cuisines, r.restaurant_hours, r.average_cost, 
        r.location, cu.cuisine_name, cu.id, ci.name as city_name, c.name as country_name,
        e.name
        FROM meals AS m
        LEFT JOIN restaurants AS r ON m.restaurant_id = r.id
        LEFT JOIN cuisines AS cu ON r.cuisine_id = cu.id
        LEFT JOIN cities AS ci ON r.city_id = ci.id
        LEFT JOIN countries AS c ON ci.con_id = c.id
        LEFT JOIN establishment AS e ON r.establishment_id = e.id";
        $this->prepare($sql);
        $this->execute();
        return $this->resultSet();
    }
}
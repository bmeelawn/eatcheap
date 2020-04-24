<?php

include '../../config/database.php';

class RestaurantModel extends DBConnection {
        protected function getCities() {
            $sql = "SELECT c.id as country_id, c.name as country_name, ci.id as city_id, ci.name as city_name, r.city_id FROM restaurants AS r
            LEFT JOIN cities AS ci ON  r.city_id = ci.id
            LEFT JOIN countries AS c ON  ci.con_id = c.id
            ";
            $this->prepare($sql);
            $result = $this->execute();
            return $this->resultSet();
        }
        protected function getDetails() {
            $sql = "SELECT r.id as restaurant_id, r.city_id, r.restaurant_name, r.special_item, r.images, r.thumbnail_image,
                             r.cuisines,r.restaurant_hours, r.description, r.location, r.most_popular, r.rating,
                             r.restaurant_image, r.food_image, r.cuisine_id, r.establishment_id, cu.id as cuisine_id,
                             cu.cuisine_name, c.id, e.id as establishment_id, e.name as establishment_name
                             FROM restaurants As r
            LEFT JOIN cuisines AS cu ON  r.cuisine_id = cu.id
            LEFT JOIN establishment AS e ON  r.establishment_id = e.id
            LEFT JOIN cities AS c ON  r.city_id = c.id
            WHERE r.city_id = c.id";
            $this->prepare($sql);
            $result = $this->execute();
            return $this->resultSet();
        }
        protected function getCount() {
            return $this->rowCount(); 
        }

 }

<?php

include '../../config/database.php';

class PopularResModel extends DBConnection {
    protected function getPopularRestaurant() {
        $sql = "SELECT c.id as country_id, c.name as country_name, ci.id as city_id, 
        ci.name as city_name, r.city_id, r.most_popular, r.images, r.thumbnail_image,
         r.restaurant_image, r.cuisines, r.restaurant_name, r.restaurant_hours, r.average_cost,
         r.location, cu.cuisine_name, cu.id, e.id, e.name, r.id as res_id
         FROM restaurants AS r
        LEFT JOIN cities AS ci ON  r.city_id = ci.id
        LEFT JOIN countries AS c ON  ci.con_id = c.id
        LEFT JOIN cuisines AS cu ON  r.cuisine_id = cu.id
        LEFT JOIN establishment AS e ON  r.establishment_id = e.id
        WHERE r.most_popular = ?";
        $this->prepare($sql);
        $this->bindValue(1, 1);
        $this->execute();
        return $this->resultSet();
        }
        protected function getCount() {
            return $this->rowCount(); 
        }
        protected function getReviews($id) {
            $sql = "SELECT re.review, re.name, r.id, re.restaurant_id
                FROM review AS re
            LEFT JOIN restaurants AS r ON  re.restaurant_id = r.id
            WHERE r.id = ?";
            $this->prepare($sql);
            $this->bindValue(1, $id);
            $this->execute();
            return $this->resultSet();
        }
}
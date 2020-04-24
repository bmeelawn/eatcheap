<?php

include '../../config/database.php';

class EstablishmentModel extends DBConnection{
    protected function getEstablishment() {
        $sql = "SELECT * FROM establishment";
        $this->prepare($sql);
        $this->execute();
        return $this->resultSet();
    }
    protected function getCount() {
        return $this->rowCount(); 
    }
}
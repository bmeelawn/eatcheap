<?php

include '../../config/database.php';

class LoginModel extends DBConnection {
    private $username;
    private $email;
    private $firstname;
    private $lastname;
    private $image;
    private $address;

    protected function authUser($username) {
        $sql = "SELECT * FROM users WHERE BINARY username = ?";
        $this->prepare($sql);
        $this->bindValue(1, $username);
        $this->execute();
        if($this->rowCount()) {
            return $this->single();
        } else {
            return false;
        }
    }
}
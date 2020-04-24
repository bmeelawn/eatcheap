<?php

include_once 'config.php';

class DBConnection {

    // Database Params
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    public $conn;
    private $error;
    private $dbConnected = false;
    private $stmt;
    
    function __construct() {
        $dns = 'mysql:host='.$this->host.';dbname='.$this->dbname;
        $options = array (
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        );
        try {
            $this->conn = new PDO($dns, $this->user, $this->pass, $options);
            $this->dbConnected = true;
        } catch(Exception $e) {
            $this->error = "Connection Failed. " . $e->getMessage();
        }
     }
     protected function getError() {
         return $error;
     }
     protected function isConnected() {
         return $dbConnected;
     }
     protected function prepare($sql) {
         $this->stmt = $this->conn->prepare($sql);
     }
     protected function bindValue($name, $value, $type = null) {
        if(is_null($type)) {
            switch(true) {
                case is_int($value): {
                 $type = PDO::PARAM_INT;
                break;
                }
                case is_bool($value): {
                    $type = PDO::PARAM_BOOL;
                break;
                }
                case is_null($value): {
                    $type = PDO::PARAM_NULL;
                break;
                }
                default: {
                    $type = PDO::PARAM_STR;
                }
            }
        }
        return $this->stmt->bindValue($name, $value, $type);
     }
     protected function execute() {
         $this->stmt->execute();
     }
     protected function resultSet() {
        return $this->stmt->fetchAll();
     }
     protected function single() {
         return $this->stmt->fetch();
     }
     protected function lastRow() {
         return $this->conn->lastInsertId();
     }
     protected function rowCount() {
         return $this->stmt->rowCount();
     }
}


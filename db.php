<?php

class Database {

    public $conn;

    public $servername = "localhost";
    public $dbname = "products_app";
    public $user = "root";
    public $password = "";

    public function connect(){

        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo "Sikeres kapcsolódás...";
            $this->conn->exec("set names utf8");
            return $this->conn;
        } 
        catch(PDOException $e) {
            echo "Kapcsolódás sikertelen!" . $e->getMessage();
        }
    }
}

?>
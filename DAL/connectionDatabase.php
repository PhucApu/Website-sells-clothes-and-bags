<?php

// Check connection
class Conn{
       private $servername = "localhost";
       private $username = "root";
       private $password = "";
       private $databaseName = "test8";

       private $conn = null;

       // Khởi tạo kết nối
       public function __construct(){
              $this->conn = new mysqli($this->servername, $this->username, $this->password,$this->databaseName);
       }

       // get Conn
       public function getConn(){
              return $this->conn;
       }

       // close Conn
       public function closeConn(){
              $this->conn->close();
       }
}


<?php
  class database {
     private $host = "localhost"; 
     private $user = "root";
     private $password = "";
     private $database = "db_siwali";
     protected $conn; 

    public function __construct() {
      $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

      if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
      }
    }

    public function readdata($sql) {
      return $this-> conn->query($sql);
    }
  }
?>
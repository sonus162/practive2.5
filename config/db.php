<?php
class db{
  
  public $servername = "localhost";
  public $username = "root";
  public $password = "";
  public $db="manage_staff";

  public function connect(){
    $this->conn='';
    try {
      $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db."", $this->username, $this->password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    return $this->conn;
  }


}


<?php
class Database{

  private $host = 'localhost';
  private $db_type = 'mysql';
  private $db_name = 'INSERT_DBNAME';
  private $db_user = 'INSERT_DBUSER';
  private $db_pass = 'INSERT_DBPASS';
  private $conn;

  public function connect(){
    $this->conn = null;
    $connectionStr = $this->db_type.':host='.$this->host.';dbname='.$this->db_name;

    try {
      $this->conn = new PDO($connectionStr, $this->db_user, $this->db_pass);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
      echo 'DB Connection Error ' . $e->getMessage();
    }
    return $this->conn;
  }

}

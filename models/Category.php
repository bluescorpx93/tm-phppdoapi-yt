<?php

class Category{
  private $conn;
  private $table = 'categories';

  public $id;
  public $name;
  public $created_at;

  public function __construct($db){
    $this->conn = $db;
  }

  public function getAll(){
    $query = 'select id, name from ' . $this->table . ' order by created_at desc';
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function getById(){
    $query = 'select id, name, created_at from ' . $this->table . ' where id = :id order by created_at desc';

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $this->id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->name       = $row['name'];
    $this->created_at = $row['created_at'];
  }

  public function create(){
    $query = 'insert into ' . $this->table . ' set name = :name';

    $stmt = $this->conn->prepare($query);
    $this->name = htmlspecialchars(strip_tags($this->name));
    $stmt->bindParam(':name', $this->name);

    if($stmt->execute()){
      return true;
    }

    printf('Error %s', $stmt->error);
    return false;
  }

  public function update(){
    $query = 'update ' . $this->table . ' set name = :name where id= :id';

    $stmt = $this->conn->prepare($query);

    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()){
      return true;
    }

    printf('Error %s', $stmt->error);
    return false;
  }

  public function delete(){
    $query = 'delete from ' . $this->table . ' where id= :id';

    $stmt = $this->conn->prepare($query);
    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()){
      return true;
    }

    printf('Error %s', $stmt->error);
    return false;
  }

}

<?php

class Users
{
  private $conn;
  private $table_name = "users";

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function addUser($username, $email, $password, $role_id)
  {
    $query = "INSERT INTO " . $this->table_name . " (`username`, `email`, `password`, `role_id`) VALUES (:username, :email, :password, :role_id)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":role_id", $role_id);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getAllUsers()
  {
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function getUserId($id)
  {
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
}

<?php

require_once "class/Database.php";

class Users
{
  private $conn;
  private $table_name = "users";

  public $id;
  public $username;
  public $password;
  public $email;
  public $role;
  public $error;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  function exists()
  {
    $query = "SELECT id FROM " . $this->table_name . " WHERE email = :email LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $this->email = htmlspecialchars(strip_tags($this->email));
    $stmt->bindParam(":email", $this->email);
    $stmt->execute();

    return $stmt->rowCount() > 0; // Если есть хотя бы одна запись, то пользователь уже существует
  }

  function createAccount()
  {
    // Проверка наличия пустого значения в email
    if (empty($this->email)) {
      $this->error =  "Email не может быть пустым.";
      return false;
    }

    // Проверка наличия пользователя с таким email
    if ($this->exists()) {
      $this->error = "Пользователь с таким email уже существует.";
      return false;
    }

    $query = "INSERT INTO " . $this->table_name . " (username, email, password, role) VALUES (:username, :email, :password, :role)";

    $stmt = $this->conn->prepare($query);

    $this->username = htmlspecialchars(strip_tags($this->username));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->password = htmlspecialchars(strip_tags($this->password));
    $this->role = htmlspecialchars(strip_tags($this->role));

    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":password", $this->password);
    $stmt->bindParam(":role", $this->role);

    try {
      if ($stmt->execute()) {
        return true;
      }
    } catch (PDOException $e) {
      $this->error = "Error: " . $e->getMessage();
    }

    return false;
  }
}

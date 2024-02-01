<?php
class Auth
{
  private $conn;
  private $table_name = "users";

  public $email;
  public $password;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function authenticate()
  {
    $query = "SELECT id, email, password FROM " . $this->table_name . " WHERE email = :email";
    $stmt = $this->conn->prepare($query);
    $this->email = htmlspecialchars(strip_tags($this->email));
    $stmt->bindParam(":email", $this->email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row && password_verify($this->password, $row['password'])) {
      return $row['id'];
      return $row['username'];
      return $row['email'];
      return $row['is_auth'];
    }
    return false;
  }
}

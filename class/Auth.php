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
    $query = "SELECT id, username, email, password FROM " . $this->table_name . " WHERE email = :email";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":email", $this->email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($this->password, $row['password'])) {
      $_SESSION['is_auth'] = true;
      return [
        'id' => $row['id'],
        'username' => $row['username'],
        'email' => $row['email'],
      ];
    }
    return false;
  }
}

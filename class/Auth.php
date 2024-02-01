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


  //Обычный запрос без ролей
  // public function authenticate()
  // {
  //   $query = "SELECT id, username, email, password, role FROM " . $this->table_name . " WHERE email = :email";
  //   $stmt = $this->conn->prepare($query);
  //   $stmt->bindParam(":email", $this->email);
  //   $stmt->execute();
  //   $row = $stmt->fetch(PDO::FETCH_ASSOC);

  //   if ($row && password_verify($this->password, $row['password'])) {
  //     $_SESSION['is_auth'] = true;
  //     return [
  //       'id' => $row['id'],
  //       'username' => $row['username'],
  //       'email' => $row['email'],
  //       'role' => $row['role'],
  //     ];
  //   }
  //   return false;
  // }

  public function authenticate()
  {
    $query = "SELECT u.id, u.username, u.email, u.password, r.name as role 
                  FROM " . $this->table_name . " u
                  JOIN role r ON u.role_id = r.id
                  WHERE email = :email";
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
        'role' => $row['role'],
      ];
    }
    return false;
  }

  //Вывести общее кол-во пользователей
  public function getUsersCount()
  {
    $query = "SELECT COUNT(*) as user_count FROM users";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row['user_count'];
  }
}

<?php
class Dashboard
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }



  // public function getCategoriesCount()
  // {
  //   $query = "SELECT COUNT(*) as category_count FROM category";
  //   $stmt = $this->conn->prepare($query);
  //   $stmt->execute();
  //   $row = $stmt->fetch(PDO::FETCH_ASSOC);

  //   return $row['category_count'];
  // }
}

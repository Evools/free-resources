<?php

class Category
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function getAllCategories()
  {
    $query = "SELECT id, name_category FROM category";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

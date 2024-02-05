<?php
require_once "class/Database.php";

class Posts
{
  private $conn;
  private $table_name = "posts";

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function addPost($title, $description, $image, $info, $file, $category_id, $date)
  {
    $query = "INSERT INTO " . $this->table_name . " (`title`, `description`, `image`, `info`, `file`, `category_id`, `date`) VALUES (:title, :description, :image, :info, :file, :category_id, :date)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":image", $image);
    $stmt->bindParam(":info", $info);
    $stmt->bindParam(":file", $file);
    $stmt->bindParam(":category_id", $category_id);
    $stmt->bindParam(":date", $date);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getAllPosts()
  {
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
  }
}

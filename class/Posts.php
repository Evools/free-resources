<?php

require_once "class/Database.php";

class addPost
{
  private $conn;
  private $table_name = "posts";
  public $id;
  public $title;
  public $description;
  public $image;
  public $info;
  public $file;
  public $category_id;
  public $date;
  public $error;

  public function addPost($id, $title, $description, $image, $info, $file, $category_id, $date, $error)
  {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->image = $image;
    $this->info = $info;
    $this->file = $file;
    $this->category_id = $category_id;
    $this->date = $date;
    $this->error = $error;

    $query = "INSERT INTO " . $this->table_name . " (`id`, `title`, `description`, `image`, `info`, `file`, `category_id`, `date`) VALUES (:id, :title, :description, :image, :info, :file, :category_id, :date)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":image", $this->image);
    $stmt->bindParam(":info", $this->info);
    $stmt->bindParam(":file", $this->file);
    $stmt->bindParam(":category_id", $this->category_id);
    $stmt->bindParam(":date", $this->date);
    $stmt->execute();
  }
}

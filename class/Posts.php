<?php

require_once "class/Database.php";

class addPost
{
  private $conn;
  private $table_name = "posts";
  public $title;
  public $content;
  public $date;
  public $error;
  public $id;
}

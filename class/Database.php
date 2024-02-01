<?php

class Database
{
  private $db_host = 'localhost';
  private $db_user = 'root';
  private $db_pass = 'root';
  private $db_name = 'free-resources';
  public $conn;

  public function getConnection()
  {
    $this->conn = null;

    try {
      $this->conn = new PDO("mysql:host={$this->db_host};dbname={$this->db_name}", $this->db_user, $this->db_pass);
    } catch (PDOException $e) {
      die("Нет подключения к базе данным " . $e->getMessage());
    }

    return $this->conn;
  }
}

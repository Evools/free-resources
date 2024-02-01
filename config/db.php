<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'free-resources';

try {
  $connect = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
} catch (PDOException $e) {
  die("Нет подключения к базе данным " . $e->getMessage());
}

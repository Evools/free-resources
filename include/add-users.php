<?php

require_once "class/Database.php";
require_once "class/Users.php";

if (isset($_POST['add-user'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = "qwerty";
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  $role_id = 1;

  $sql = new Database();
  $conn = $sql->getConnection();
  $users = new Users($conn);
  $add_user = $users->addUser($username, $email, $hash_password, 1);
}



?>

<form action="" method="post" class="add-users flex flex-col gap-3">
  <label for="">ФИО</label>
  <input class="border border-slate-300" type="text" name="username">
  <label for="">Почта</label>
  <input class="border border-slate-300" type="text" name="email">
  <button type="submit" name="add-user">Send</button>
</form>
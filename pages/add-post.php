<?php include "./layout/header.php"; ?>

<?php
if (isset($_SESSION['is_auth']) && $_SESSION['is_auth']) {
  $userRole = $_SESSION['role'];
  // if ($userRole === 'Админ') {
  //   echo "Добро пожаловать, Администратор!";
  // } else {
  //   echo "Неизвестная роль";
  // }
}
?>

<?php if ($userRole === 'Админ') : ?>

  <div class="flex">
    <?php include "./layout/sidebar.php"; ?>
    <?php include "./include/add-post.php"; ?>
  </div>

<?php endif; ?>

<?php include "./layout/footer.php"; ?>
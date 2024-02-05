<?php include "./layout/header.php"; ?>

<?php
if (isset($_SESSION['is_auth']) && $_SESSION['is_auth']) {
  $userRole = $_SESSION['role'];
}
?>

<?php if ($userRole === 'Админ') : ?>

  <div class="flex">
    <?php include "./layout/sidebar.php"; ?>
    <?php include "./include/add-users.php"; ?>
  </div>

<?php endif; ?>

<?php include "./layout/footer.php"; ?>
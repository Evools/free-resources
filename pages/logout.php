<?php

if (!isset($_SESSION['is_auth'])) {
  header('Location: /signin');
}

if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: /signin");
}

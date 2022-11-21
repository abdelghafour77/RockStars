<?php
if (!isset($_SESSION['id'])) {
  header('location: 404.php');
  die();
}
if (isset($_SESSION['role_id'])) {
  if ($_SESSION['role_id'] != 2) {
    header("location: 404.php");
    die;
  }
}

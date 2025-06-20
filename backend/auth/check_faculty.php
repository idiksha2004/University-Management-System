<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'faculty') {
  header("Location: ../../login.html");
  exit();
}
?>

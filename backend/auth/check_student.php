<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student') {
   header("Location: /UniversityManagementSystem/login.php");

    exit();
}
?>

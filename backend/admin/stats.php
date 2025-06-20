<?php
include("../db.php");

$total_students = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='student'"))['total'];
$total_faculty  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='faculty'"))['total'];
$total_courses  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM courses"))['total'];

echo json_encode([
  "students" => $total_students,
  "faculty" => $total_faculty,
  "courses" => $total_courses
]);
?>

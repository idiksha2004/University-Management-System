<?php
session_start();
include("db.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username=? AND password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
  $_SESSION['username'] = $username;
  $_SESSION['role'] = $user['role'];

  if ($user['role'] == 'admin') {
    header("Location: ../pages/admin.php");
  } elseif ($user['role'] == 'faculty') {
    header("Location: ../pages/faculty.php");
  } else {
    header("Location: ../pages/student.php");
  }
} else {
  echo "<script>alert('Invalid credentials'); window.location.href='../login.html';</script>";
}
?>

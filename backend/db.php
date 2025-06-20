<?php
$host = 'localhost';
$user = 'root';
$pass = 'Dikbcs*628'; // Change if needed
$db = 'university_db';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

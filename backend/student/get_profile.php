<?php
session_start();
header('Content-Type: application/json');

// Simulated student profile
$student = [
  "name" => "John Doe",
  "email" => "john@example.com",
  "department" => "Computer Science"
];

// Simulated grades
$grades = [
  ["course_name" => "Mathematics", "grade" => "A"],
  ["course_name" => "Physics", "grade" => "B+"],
  ["course_name" => "Computer Science", "grade" => "A+"]
];

echo json_encode([
  "student" => $student,
  "grades" => $grades
]);

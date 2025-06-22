<?php
session_start();
include 'backend/db.php'; // Make sure this path is correct

// Check if the form is submitted using POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form inputs safely
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate input
    if (empty($username) || empty($password)) {
        echo "Please fill in both username and password.";
        exit();
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT id, username, password, user_type FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verify password (for plain text, use ===; for hashed, use password_verify)
        if ($password === $row['password']) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_type'] = $row['user_type'];

            // Redirect based on user type
            if ($row['user_type'] === 'student') {
                header("Location: pages/student.php");
            } elseif ($row['user_type'] === 'admin') {
                header("Location: pages/admin.php");
            } elseif ($row['user_type'] === 'faculty') {
                header("Location: pages/faculty.php");
            } else {
                echo "Unknown user type.";
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
<form action="login.php" method="POST">
  <label>Username:</label>
  <input type="text" name="username" required><br><br>

  <label>Password:</label>
  <input type="password" name="password" required><br><br>

  <button type="submit">Login</button>
</form>


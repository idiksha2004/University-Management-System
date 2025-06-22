<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../backend/auth/check_student.php"); // ✅ Make sure this file exists!
?>
<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'student') {
    header("Location: ../login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Student Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-purple-100 p-6 min-h-screen">

  <h1 class="text-3xl font-bold text-center text-blue-800 mb-6">🎓 Student Dashboard</h1>
  <a href="../backend/auth/logout.php" style="color: red; float: right;">Logout</a>

  <!-- Profile Info -->
  <div class="bg-white p-6 rounded-lg shadow mb-8 max-w-xl mx-auto animate-fade-in">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">👤 Profile</h2>
    <div id="profileInfo" class="space-y-2 text-gray-700">
      <p><strong>Name:</strong> <span id="name" class="font-medium"></span></p>
      <p><strong>Email:</strong> <span id="email" class="font-medium"></span></p>
      <p><strong>Department:</strong> <span id="department" class="font-medium"></span></p>
    </div>
  </div>

  <!-- Grades Table -->
  <div class="bg-white p-6 rounded-lg shadow max-w-xl mx-auto animate-fade-in delay-200">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">📚 Grades</h2>
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="text-gray-600 font-medium border-b">
          <th class="pb-2">Course</th>
          <th class="pb-2">Grade</th>
        </tr>
      </thead>
      <tbody id="gradesTable" class="text-gray-700"></tbody>
    </table>
    <div id="gradeStatus" class="mt-4 text-sm text-red-600 hidden">Failed to load grades.</div>
  </div>

  <script>
    fetch('../backend/student/get_profile.php')
      .then(res => {
        if (!res.ok) throw new Error("Network error");
        return res.json();
      })
      .then(data => {
        document.getElementById('name').textContent = data.student.name;
        document.getElementById('email').textContent = data.student.email;
        document.getElementById('department').textContent = data.student.department;

        const gradesTable = document.getElementById('gradesTable');
        data.grades.forEach(g => {
          gradesTable.innerHTML += `
            <tr class="border-t">
              <td class="py-2">${g.course_name}</td>
              <td class="py-2 font-semibold">${g.grade}</td>
            </tr>
          `;
        });
      })
      .catch(err => {
        console.error(err);
        document.getElementById('gradeStatus').classList.remove('hidden');
      });
  </script>

  <style>
    .animate-fade-in {
      animation: fadeInUp 0.6s ease both;
    }
    .delay-200 {
      animation-delay: 0.2s;
    }
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</body>
</html>

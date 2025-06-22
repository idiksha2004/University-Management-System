<?php include("../backend/auth/check_admin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

  <h1 class="text-3xl font-bold text-center mb-8 text-blue-800">Admin Dashboard</h1>
  <a href="../backend/auth/logout.php" style="color: red; float: right;">Logout</a>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white shadow-lg rounded-xl p-6 text-center">
      <h2 class="text-xl font-semibold">Total Students</h2>
      <p id="students" class="text-3xl font-bold text-blue-600 mt-2">0</p>
    </div>
    <div class="bg-white shadow-lg rounded-xl p-6 text-center">
      <h2 class="text-xl font-semibold">Total Faculty</h2>
      <p id="faculty" class="text-3xl font-bold text-purple-600 mt-2">0</p>
    </div>
    <div class="bg-white shadow-lg rounded-xl p-6 text-center">
      <h2 class="text-xl font-semibold">Total Courses</h2>
      <p id="courses" class="text-3xl font-bold text-green-600 mt-2">0</p>
    </div>
  </div>

  <!-- Chart -->
  <div class="bg-white shadow-lg rounded-xl p-6">
    <h2 class="text-xl font-semibold mb-4 text-gray-700">User Distribution</h2>
    <canvas id="userChart"></canvas>
  </div>

  <script>
    fetch('../backend/admin/stats.php')
      .then(res => res.json())
      .then(data => {
        document.getElementById('students').textContent = data.students;
        document.getElementById('faculty').textContent = data.faculty;
        document.getElementById('courses').textContent = data.courses;

        const ctx = document.getElementById('userChart');
        new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ['Students', 'Faculty'],
            datasets: [{
              label: 'Users',
              data: [data.students, data.faculty],
              backgroundColor: ['#3b82f6', '#9333ea'],
              hoverOffset: 6
            }]
          }
        });
      });
  </script>
</body>
</html>

<?php include("../backend/auth/check_student.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Student Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 min-h-screen">

  <h1 class="text-3xl font-bold text-center text-blue-800 mb-6">Student Dashboard</h1>

  <!-- Profile Info -->
  <div class="bg-white p-6 rounded-lg shadow mb-8 max-w-xl mx-auto">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Profile</h2>
    <div id="profileInfo" class="space-y-2 text-gray-700">
      <p><strong>Name:</strong> <span id="name"></span></p>
      <p><strong>Email:</strong> <span id="email"></span></p>
      <p><strong>Department:</strong> <span id="department"></span></p>
    </div>
  </div>

  <!-- Grades Table -->
  <div class="bg-white p-6 rounded-lg shadow max-w-xl mx-auto">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Grades</h2>
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="text-gray-600 font-medium">
          <th class="pb-2">Course</th>
          <th class="pb-2">Grade</th>
        </tr>
      </thead>
      <tbody id="gradesTable" class="text-gray-700"></tbody>
    </table>
  </div>

  <script>
    fetch('../backend/student/get_profile.php')
      .then(res => res.json())
      .then(data => {
        document.getElementById('name').textContent = data.student.name;
        document.getElementById('email').textContent = data.student.email;
        document.getElementById('department').textContent = data.student.department;

        const gradesTable = document.getElementById('gradesTable');
        data.grades.forEach(g => {
          gradesTable.innerHTML += `
            <tr>
              <td class="py-2">${g.course_name}</td>
              <td class="py-2 font-semibold">${g.grade}</td>
            </tr>
          `;
        });
      });
  </script>

</body>
</html>

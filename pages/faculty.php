<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'student') {
    header("Location: ../login.html");
    exit();
}
?>
<?php include("../backend/auth/check_faculty.php"); ?>
<!DOCTYPE html>
<html lang="en">
<!-- your existing HTML here -->
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8" />
  <title>Faculty Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = { darkMode: 'class' };
  </script>
  <style>
    .toast {
      animation: slide-in 0.5s ease forwards;
    }
    @keyframes slide-in {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

  <!-- Header -->
  <header class="bg-blue-800 text-white p-4 text-center">
    <div class="flex justify-between items-center max-w-6xl mx-auto">
      <h1 class="text-xl font-bold">Faculty Dashboard</h1>
      <button onclick="toggleDarkMode()" class="bg-white text-blue-800 px-4 py-1 rounded hover:bg-gray-100">
        🌗 Toggle Theme
      </button>
      <a href="../backend/auth/logout.php" style="color: red; float: right;">Logout</a>

    </div>
  </header>

  <!-- Toast -->
  <div id="toast" class="toast fixed top-4 right-4 hidden bg-green-500 text-white px-4 py-2 rounded shadow"></div>

  <!-- Content -->
  <main class="max-w-6xl mx-auto p-6 space-y-6 animate-fadeIn transition duration-700">

    <!-- Search -->
    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
      <input
        type="text"
        id="searchInput"
        onkeyup="filterStudents()"
        placeholder="🔍 Search student by name or roll no"
        class="w-full border rounded px-4 py-2 dark:bg-gray-900"
      />
    </div>

    <!-- Student Table -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-semibold text-blue-700 dark:text-blue-300">🎓 Student List</h2>
        <button onclick="showModal('gradeModal')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
          + Assign Grade
        </button>
      </div>
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-gray-200 dark:bg-gray-700">
            <th class="p-2 border">Avatar</th>
            <th class="p-2 border">Student</th>
            <th class="p-2 border">Roll No</th>
            <th class="p-2 border">Grade</th>
          </tr>
        </thead>
        <tbody id="studentTable">
          <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition">
            <td class="p-2 border"><img src="https://i.pravatar.cc/40?img=10" class="rounded-full" /></td>
            <td class="p-2 border">Jane Smith</td>
            <td class="p-2 border">20231001</td>
            <td class="p-2 border">B+</td>
          </tr>
          <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition">
            <td class="p-2 border"><img src="https://i.pravatar.cc/40?img=11" class="rounded-full" /></td>
            <td class="p-2 border">John Doe</td>
            <td class="p-2 border">20231002</td>
            <td class="p-2 border">A</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>

  <!-- Grade Modal -->
  <div id="gradeModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow w-96">
      <h2 class="text-lg font-semibold mb-4">Assign Grade</h2>
      <input type="text" placeholder="Student Name" class="w-full border rounded p-2 mb-2 dark:bg-gray-900">
      <input type="text" placeholder="Grade (e.g., A, B+)" class="w-full border rounded p-2 mb-2 dark:bg-gray-900">
      <div class="flex justify-end gap-2">
        <button onclick="hideModal('gradeModal')" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
        <button onclick="hideModal('gradeModal'); showToast('Grade assigned successfully!')" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    function toggleDarkMode() {
      document.documentElement.classList.toggle('dark');
    }

    function showToast(message) {
      const toast = document.getElementById('toast');
      toast.innerText = message;
      toast.classList.remove('hidden');
      setTimeout(() => toast.classList.add('hidden'), 3000);
    }

    function showModal(id) {
      document.getElementById(id).classList.remove('hidden');
    }

    function hideModal(id) {
      document.getElementById(id).classList.add('hidden');
    }

    function filterStudents() {
      const input = document.getElementById("searchInput").value.toLowerCase();
      const rows = document.querySelectorAll("#studentTable tr");

      rows.forEach(row => {
        const name = row.cells[1].textContent.toLowerCase();
        const roll = row.cells[2].textContent.toLowerCase();
        row.style.display = name.includes(input) || roll.includes(input) ? "" : "none";
      });
    }
  </script>

</body>
</html>

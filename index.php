<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>University Management System</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = { darkMode: 'class' };
  </script>
  <style>
    body {
      background: linear-gradient(-45deg, #3b82f6, #9333ea, #06b6d4, #facc15);
      background-size: 400% 400%;
      animation: gradientBG 15s ease infinite;
    }

    @keyframes gradientBG {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .glass {
      backdrop-filter: blur(16px) saturate(180%);
      -webkit-backdrop-filter: blur(16px) saturate(180%);
      background-color: rgba(255, 255, 255, 0.2);
      border-radius: 1rem;
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .fade-in {
      animation: fadeInUp 0.9s ease-out both;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center dark:text-white text-gray-900">

  <!-- Dark Mode Toggle -->
  <div class="absolute top-4 right-4">
    <button onclick="toggleDarkMode()" class="bg-white dark:bg-gray-800 text-blue-700 dark:text-white px-4 py-1 rounded shadow hover:bg-gray-200 dark:hover:bg-gray-700 transition">
      🌗 Toggle Mode
    </button>
  </div>

  <!-- Main Card -->
  <div class="glass max-w-2xl w-full mx-4 p-8 fade-in shadow-xl text-center text-white dark:text-white">
    <h1 class="text-3xl font-bold mb-4">University Management System</h1>
    <p class="mb-6 text-sm opacity-90">Welcome to the official portal. Select your role to continue:</p>

    <nav class="flex flex-col md:flex-row justify-center gap-4 text-white font-semibold">
      <a href="pages/student.php" class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded transition">Student</a>
      <a href="pages/faculty.php" class="bg-purple-600 hover:bg-purple-700 px-6 py-2 rounded transition">Faculty</a>
      <a href="pages/admin.php" class="bg-green-600 hover:bg-green-700 px-6 py-2 rounded transition">Admin</a>
    </nav>
  </div>

  <script>
    function toggleDarkMode() {
      document.documentElement.classList.toggle('dark');
    }
  </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8" />
  <title>Login | University Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center dark:text-white">

  <!-- Dark Mode Toggle -->
  <div class="absolute top-4 right-4">
    <button onclick="toggleDarkMode()" class="bg-white dark:bg-gray-800 text-blue-700 dark:text-white px-4 py-1 rounded shadow hover:bg-gray-200 dark:hover:bg-gray-700 transition">
      🌗 Toggle Mode
    </button>
  </div>

  <!-- Login Card -->
  <div class="glass max-w-md w-full mx-4 p-8 fade-in shadow-xl text-center">
    <h1 class="text-3xl font-bold mb-4">University Login</h1>
    <p class="mb-6 text-sm opacity-90">Log in to your role-specific dashboard</p>

    <form method="POST" action="backend/login.php">
      <input type="text" name="username" placeholder="Username" required class="w-full mb-4 px-4 py-2 rounded bg-white bg-opacity-20 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-blue-400" />
      <input type="password" name="password" placeholder="Password" required class="w-full mb-6 px-4 py-2 rounded bg-white bg-opacity-20 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-blue-400" />
      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 transition text-white font-semibold py-2 px-4 rounded">
        Log In
      </button>
    </form>

    <p class="text-sm mt-6 opacity-90">
      Trouble logging in? <a href="#" class="underline text-blue-200 hover:text-blue-100">Contact Admin</a>
    </p>
  </div>

  <script>
    function toggleDarkMode() {
      document.documentElement.classList.toggle('dark');
    }
  </script>

</body>
</html>

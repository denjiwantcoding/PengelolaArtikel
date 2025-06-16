<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Form Login</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-80">
    <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
    <form action="login_db.php?op=in" method="post" class="space-y-4">
      <input 
        type="text" 
        name="nickname" 
        placeholder="Username" 
        required 
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
      <input 
        type="password" 
        name="password" 
        placeholder="Password" 
        required 
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
      <button 
        type="submit" 
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300"
      >
        Masuk
      </button>
    </form>
    <p class="text-center text-sm text-gray-600 mt-4">
       Belum punya akun? 
      <a href="daftar.php" class="text-blue-600 hover:underline">daftar di sini</a>
    </p>
  </div>

</body>
</html>

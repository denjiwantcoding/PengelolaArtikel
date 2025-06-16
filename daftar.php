<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Form Pendaftaran</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-96">
    <h2 class="text-2xl font-bold text-center mb-6">Daftar Akun</h2>
    <form action="insert_author.php" method="post" class="space-y-4">
      <input 
        type="text" 
        name="nickname" 
        placeholder="Username" 
        required 
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
      <input 
        type="email" 
        name="email" 
        placeholder="Email" 
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
      <!-- <input 
        type="password" 
        name="confirm_password" 
        placeholder="Konfirmasi Password" 
        required 
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
      /> -->
      <button 
        type="submit" 
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300"
      >
        Daftar
      </button>
    </form>
    <p class="text-center text-sm text-gray-600 mt-4">
      Sudah punya akun? 
      <a href="login.php" class="text-blue-600 hover:underline">Login di sini</a>
    </p>
  </div>

</body>
</html>

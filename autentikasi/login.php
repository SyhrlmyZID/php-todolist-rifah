<!DOCTYPE html>
<html lang="id">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Listify - Login</title>

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="../src/output.css">

    <!-- Vendor Files -->
    <link rel="stylesheet" href="../assets/vendor/FontAwesome6Pro/css/all.min.css">
    <link rel="stylesheet" href="../src/poppins.css">

</head>

<body class="h-screen flex items-center justify-center bg-gray-50 p-4">
<<<<<<< HEAD
    
    <!-- Content -->
=======

>>>>>>> 61c90a0 (Perubahan Pada Kalender Dan Cookie)
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700 text-center"><span class="text-[#ffb4a2]">Listify</span> Login</h2>
        <p class="text-gray-600 text-center mb-6">Silakan masuk untuk mengakses dashboard</p>

        <form method="POST" action="../php/autentikasi/process_login.php" class="space-y-4">
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" required
                    class="w-full p-2 border rounded-md focus:ring-2 focus:ring-[#ffb4a2] focus:outline-none transition"
                    placeholder="Masukkan email Anda">
            </div>
            <div>
                <label class="block text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required
                        class="w-full p-2 border rounded-md focus:ring-2 focus:ring-[#ffb4a2] focus:outline-none transition"
                        placeholder="Masukkan password Anda">
                    <button type="button" id="togglePassword" class="absolute right-3 top-2 text-gray-500">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
<<<<<<< HEAD
=======
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-700">
                    <input type="checkbox" name="rememberme" class="h-4 w-4 text-[#5a67d8] border-gray-300 rounded mr-2"
                        <?php if (isset($_COOKIE['rememberme'])) echo 'checked'; ?>>
                    Ingat Saya
                </label>
                <a href="#" class="text-sm text-gray-700 hover:underline">Lupa Password?</a>
            </div>
>>>>>>> 61c90a0 (Perubahan Pada Kalender Dan Cookie)
            <button type="submit"
                class="bg-[#ffb4a2] hover:bg-red-300 transition duration-500 text-white p-2 rounded-md w-full">
                Masuk
            </button>
            <p class="text-center text-sm text-gray-600 mt-4">Belum punya akun? <a href="register.php" class="text-[#ffb4a2] hover:underline">Daftar</a></p>
        </form>
<<<<<<< HEAD
    </div> <!-- End - Content -->

    <!-- Javascript -->
    <script src="../assets/js/autentikasi/script.js"></script>
    
</body>

=======
    </div>

    <!-- Javascript Main -->
    <script src="../assets/js/autentikasi/script.js"></script>

</body>
>>>>>>> 61c90a0 (Perubahan Pada Kalender Dan Cookie)
</html>

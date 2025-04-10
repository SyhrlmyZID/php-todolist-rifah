<?php

// Kode Php
include '../php/autentikasi/register.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Listify - Register</title>

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="../src/output.css">

    <!-- Vendor Files -->
    <link rel="stylesheet" href="../assets/vendor/FontAwesome6Pro/css/all.min.css">
    <link rel="stylesheet" href="../src/poppins.css">

</head>

<body class="h-screen flex items-center justify-center bg-gray-50 p-4">

    <!-- Content -->
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700 text-center"><span class="text-[#ffb4a2]">Listify</span> Register</h2>
        <p class="text-gray-600 text-center mb-6">Daftar ke Listify untuk membuat akun.</p>

        <form action="../php/autentikasi/process_register.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="nama" required
                    class="w-full p-2 border rounded-md focus:ring-2 focus:ring-[#ffb4a2] focus:outline-none transition"
                    placeholder="Masukkan nama Anda">
            </div>
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
            <button type="submit"
                class="bg-[#ffb4a2] hover:bg-red-300 transition duration-500 text-white p-2 rounded-md w-full">
                Daftar Sekarang
            </button>
            <p class="text-center text-sm text-gray-600 mt-4">Sudah punya akun? <a href="login.php" class="text-[#ffb4a2] hover:underline">Login</a></p>
        </form>
    </div> <!-- End - Content -->

    <!-- Javascript -->
    <script src="../assets/js/autentikasi/script.js"></script>

</body>

</html>

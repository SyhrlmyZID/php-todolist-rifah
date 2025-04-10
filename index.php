<?php

<<<<<<< HEAD
=======
// Cookie Index
include 'cookie_index.php';

>>>>>>> 61c90a0 (Perubahan Pada Kalender Dan Cookie)
// Kode Php
include 'php/landing_page/index.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Title -->
    <title>Listify - Landing Page</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="src/output.css">

    <!-- Vendor Files -->
    <link rel="stylesheet" href="assets/vendor/FontAwesome6Pro/css/all.min.css" />
    <link rel="stylesheet" href="src/poppins.css">
    
</head>

<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-[#ffb4a2] p-4 shadow-md fixed top-0 left-0 w-full z-10">
        <div class="flex items-center justify-between container">
            <div class="flex items-center">
                <button class="lg:hidden text-white text-2xl" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h2 class="text-white font-semibold text-2xl ml-5">Listify</h2>
            </div>
            <div class="hidden lg:flex items-center space-x-4">
                <a href="#beranda" class="text-white">Beranda</a>
                <a href="#tentang" class="text-white">Tentang Kami</a>
                <a href="#layanan" class="text-white">Layanan</a>
                <a href="#contact" class="text-white">Kontak</a>
                <a href="autentikasi/login.php"
                    class="text-white bg-[#ff6f61] px-4 py-2 rounded-lg hover:bg-[#ff3e2e] transition duration-300">Masuk</a>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="sidebar"
            class="lg:hidden fixed top-0 left-0 w-64 h-full bg-white transform -translate-x-full transition-transform duration-300">
            <div class="p-4">
                <button onclick="toggleSidebar()" class="text-gray-500 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <ul class="flex flex-col items-center space-y-4 mt-8">
                <li><a href="#beranda" class="text-[#ffb4a2]">Beranda</a></li>
                <li><a href="#tentang" class="text-[#ffb4a2]">Tentang Kami</a></li>
                <li><a href="#layanan" class="text-[#ffb4a2]">Layanan</a></li>
                <li><a href="#contact" class="text-[#ffb4a2]">Kontak</a></li>
                <li>
                    <a href="autentikasi/login.php"
                        class="text-white bg-[#ff6f61] px-4 py-2 rounded-lg hover:bg-[#ff3e2e] transition duration-300">Masuk</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="bg-[#ffb4a2] pt-32 pb-24 text-white flex items-center justify-center min-h-screen">
        <div class="container flex flex-col lg:flex-row items-center justify-between space-y-8 lg:space-y-0">
            <div class="w-full lg:w-1/2 text-center lg:text-left">
                <h1 class="text-4xl font-semibold mb-4">Selamat datang di Listify</h1>
                <p class="text-base mb-8">
                    Apakah Anda merasa kesulitan mengatur dan menyelesaikan tugas-tugas
                    Anda? Listify hadir untuk membantu Anda! Dengan antarmuka yang
                    sederhana untuk mengatur tugas anda.
                </p>
                <a href="autentikasi/login.php"
                    class="bg-[#ff6f61] px-6 py-3 rounded-lg text-white hover:bg-[#ff3e2e] transition duration-300">Mulai
                    Sekarang</a>
            </div>
            <div class="w-full lg:w-1/2 flex justify-center">
                <img src="assets/svg/Fill-out-amico.svg" style="height: 412px" alt="Hero Image"
                    class="max-w-xs lg:max-w-lg" />
            </div>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang" class="py-24 text-center bg-white flex items-center justify-center">
        <div class="container">
            <h2 class="text-3xl font-semibold text-gray-700 mb-6">Tentang Kami</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
                Listify membantu Anda untuk mengatur dan melacak tugas-tugas Anda.
                Dengan antarmuka yang sederhana dan intuitif, Anda dapat dengan mudah
                menambahkan, mengedit, dan menyelesaikan tugas kapan saja, di mana
                saja.
            </p>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="bg-[#f9fafb] py-24">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold text-gray-700 mb-10 text-center">
                Layanan Kami
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col items-center text-center h-full">
                    <div class="bg-[#ffebea] p-4 rounded-full mb-6">
                        <i class="fas fa-list-ol text-[#ff6f61] text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">
                        Manajemen Tugas
                    </h3>
                    <p class="text-base text-gray-600">
                        Kelola dan atur tugas dengan mudah menggunakan antarmuka yang
                        sederhana dan intuitif. Prioritaskan tugas penting dan pantau
                        kemajuan Anda.
                    </p>
                </div>

                <div
                    class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col items-center text-center h-full">
                    <div class="bg-[#ffebea] p-4 rounded-full mb-6">
                        <i class="fas fa-calendar-check text-[#ff6f61] text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">
                        Tentukan Deadline
                    </h3>
                    <p class="text-base text-gray-600">
                        Anda bisa mengatur deadline pada setiap tugas anda, sehingga akan
                        selalu ingat pada tugas ada.
                    </p>
                </div>

                <div
                    class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col items-center text-center h-full">
                    <div class="bg-[#ffebea] p-4 rounded-full mb-6">
                        <i class="fas fa-user-circle text-[#ff6f61] text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">
                        Akun Pengguna
                    </h3>
                    <p class="text-base text-gray-600">
                        Buat akun untuk melacak tugas pribadi Anda dan bekerja dengan
                        lebih efisien. Sinkronkan data Anda di berbagai perangkat untuk
                        akses kapan saja.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-white text-center flex items-center justify-center">
        <div class="container">
            <h2 class="text-3xl font-semibold text-gray-700 mb-6">Kontak Kami</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-8">
                Jika Anda memiliki pertanyaan atau ingin memberikan umpan balik,
                jangan ragu untuk menghubungi kami melalui form berikut:
            </p>
            <form action="send_message.php" method="post" class="max-w-xl mx-auto">
                <input type="text" name="name" placeholder="Nama"
                    class="w-full p-4 mb-4 bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ffb4a2] focus:outline-none transition duration-500" required />
                <input type="email" name="email" placeholder="Email"
                    class="w-full p-4 mb-4 bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ffb4a2] focus:outline-none transition duration-500" required />
                <textarea name="message" placeholder="Pesan"
                    class="w-full p-4 mb-4 bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#ffb4a2] focus:outline-none transition duration-500" rows="4" required></textarea>
                <button type="submit"
                    class="bg-[#ff6f61] text-white px-6 py-3 rounded-lg hover:bg-[#ff3e2e] transition duration-300">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#ffb4a2] text-white py-6 flex items-center justify-center">
        <p>&copy; 2025 Listify. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/landing_page/script.js"></script>

</body>

</html>
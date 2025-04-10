<?php

// Kode Php
include '../php/admin/beranda.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Listify - Beranda</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="../src/output.css">

    <!-- Vendor Files -->
    <link rel="stylesheet" href="../assets/vendor/FontAwesome6Pro/css/all.min.css">
    <link rel="stylesheet" href="../src/poppins.css">

</head>

<body class="h-screen flex flex-col bg-gray-50">

    <!-- Navbar -->
    <div class="flex items-center justify-between bg-[#ffb4a2] p-4 shadow-md">
        <div class="flex items-center">
            <button class="lg:hidden text-white text-2xl mr-4 focus:outline-none" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <img src="../assets/img/logo-listify.png" alt="Logo" width="168" height="64">
        </div>
        <div class="relative">
            <button id="adminBtn" class="text-white font-semibold flex items-center space-x-2 focus:outline-none">
                <span class="lg:inline-block">
                    <?php echo htmlspecialchars($_SESSION['nama']); ?>
                </span>
                <span class="hidden lg:inline-block">
                    <?php echo htmlspecialchars($_SESSION['nama']); ?>
                </span>
                <i class="ml-2 fa-solid fa-chevron-down"></i>
            </button>
            <div id="dropdown"
                class="hidden absolute right-0 bg-white shadow-lg w-64 mt-2 rounded-lg overflow-hidden transition-all duration-300">
                <ul class="py-2">
                    <li class="px-4 py-3 text-gray-700 flex items-center border-b">
                        <div>
                            <p class="font-semibold">
                                <?php echo htmlspecialchars($_SESSION['nama']); ?>
                            </p>
                            <span class="text-sm text-gray-500">User Profile</span>
                        </div>
                    </li>
                    <li class="px-4 py-3 text-gray-600 hover:bg-[#ffb4a2] hover:text-white transition cursor-pointer flex items-center"
                        onclick="window.location.href='../php/logout/logout.php';">
                        <i class="fas fa-sign-out-alt mr-3"></i> Logout
                    </li>
                </ul>
            </div>
        </div>
    </div> <!-- End - Navbar -->

    <!-- Wrapper -->
    <div class="flex flex-1 overflow-hidden">

        <!-- Sidebar -->
        <div id="sidebar"
            class="w-64 bg-white shadow-lg p-4 overflow-y-auto fixed lg:relative transform -translate-x-full lg:translate-x-0 transition-transform duration-200 ease-in-out">
            <ul class="space-y-2">
                <li class="flex items-center space-x-2 bg-red-100 p-2 rounded-md"
                    onclick="window.location.href='beranda.php';">
                    <i class="fa-sharp fa-solid fa-house text-[#ffb4a2]"></i>
                    <span class="text-gray-700">Beranda</span>
                </li>
                <li class="flex items-center space-x-2 hover:bg-red-100 p-2 rounded-md transition"
                    onclick="window.location.href='pengguna.php';">
                    <i class="fas fa-users text-[#ffb4a2]"></i>
                    <span class="text-gray-700">Tabel Pengguna</span>
                </li>

                <div class="border"></div>

                <li class="bg-[#ffb4a2] hover:bg-red-300 transition duration-200 p-2 rounded-md"
                    onclick="window.location.href='../php/logout/logout.php';">
                    <span class="font-medium ml-5 text-gray-700">Logout</span>
                </li>
            </ul>
        </div> <!-- End - Sidebar -->

        <!-- Main Content -->
        <div class="flex-1 flex flex-col bg-gray-50 p-4 overflow-y-auto">

            <!-- Title -->
            <h2 class="text-2xl font-semibold mb-6 text-gray-700">Beranda</h2>

            <!-- Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700">Total Tugas</h3>
                    <p class="text-2xl font-bold text-gray-900 mt-3">
                        <?php echo $totalTugas; ?>
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700">Total Pengguna</h3>
                    <p class="text-2xl font-bold text-green-600 mt-3">
                        <?php echo $totalPengguna; ?>
                    </p>
                </div>
            </div>

            <!-- Copyright -->
            <div class="mt-6 text-center text-white text-sm w-full bg-[#FFB4A2] p-3 rounded-md">
                &copy;
                <?php echo date("Y"); ?> Listify. All Rights Reserved.
            </div>

        </div> <!-- End - Main Content -->

    </div> <!-- End - Wrapper -->

    <!-- Javascript -->
    <script src="../assets/js/admin/script.js"></script>

</body>

</html>
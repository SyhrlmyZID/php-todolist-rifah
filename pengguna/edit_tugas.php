<?php

// Kode Php
include '../php/pengguna/edit_tugas.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Listify - Edit Tugas</title>

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
                <li class="flex items-center space-x-2 hover:bg-red-100 p-2 rounded-md"
                    onclick="window.location.href='beranda.php';">
                    <i class="fa-sharp fa-solid fa-house text-[#ffb4a2]"></i>
                    <span class="text-gray-700">Beranda</span>
                </li>
                <li class="flex items-center space-x-2 hover:bg-red-100 p-2 rounded-md transition"
                    onclick="window.location.href='buat_tugas.php';">
                    <i class="fas fa-pencil text-[#ffb4a2]"></i>
                    <span class="text-gray-700">Buat Tugas</span>
                </li>
                <li class="flex items-center space-x-2 bg-red-100 p-2 rounded-md transition"
                    onclick="window.location.href='daftar_tugas.php';">
                    <i class="fas fa-tasks text-[#ffb4a2]"></i>
                    <span class="text-gray-700">Daftar Tugas</span>
                </li>
<<<<<<< HEAD
=======
                <li class="flex items-center space-x-2 hover:bg-red-100 p-2 rounded-md transition"
                    onclick="window.location.href='daftar_tugas.php';">
                    <i class="fas fa-calendar text-[#ffb4a2]"></i>
                    <span class="text-gray-700">Kalender</span>
                </li>
>>>>>>> 61c90a0 (Perubahan Pada Kalender Dan Cookie)

                <div class="border"></div>

                <li class="bg-[#ffb4a2] hover:bg-red-300 transition duration-200 p-2 rounded-md" onclick="window.location.href='../php/logout/logout.php';">
                    <span class="font-medium ml-5 text-gray-700">Logout</span>
                </li>
            </ul>
        </div> <!-- End - Sidebar -->

        <!-- Main Content -->
        <div class="flex-1 bg-gray-50 p-6 w-full overflow-auto">

            <!-- Content -->
            <div class="bg-white p-6 rounded-lg shadow-md">

                <!-- Title -->
                <div class="flex justify-between">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-700">Edit Tugas</h2>
                    <a href="daftar_tugas.php"
                        class="inline-flex items-center px-4 py-2 mb-4 bg-gray-200 text-gray-700 rounded-md shadow hover:bg-gray-300 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                </div>

                <!-- From Edit Tugas -->
                <?php if (isset($error)) : ?>
                <p class="text-red-500 text-sm mb-4">
                    <?php echo $error; ?>
                </p>
                <?php endif; ?>

                <form action="" method="POST" class="space-y-4">
                    <div>
                        <label class="block text-gray-700">Nama Tugas</label>
                        <input type="text" name="nama_tugas"
                            value="<?php echo htmlspecialchars($tugas['nama_tugas']); ?>"
                            class="w-full p-2 border rounded-md focus:ring-2 focus:ring-[#ffb4a2] focus:outline-none transition duration-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi"
                            class="w-full p-2 border rounded-md focus:ring-2 focus:ring-[#ffb4a2] focus:outline-none transition duration-500"
                            required><?php echo htmlspecialchars($tugas['deskripsi']); ?></textarea>
                    </div>
                    <div>
                        <label class="block text-gray-700">Tanggal Deadline</label>
                        <input type="date" name="deadline" value="<?php echo htmlspecialchars($tugas['deadline']); ?>"
                            class="w-full p-2 border rounded-md focus:ring-2 focus:ring-[#ffb4a2] focus:outline-none transition duration-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Status</label>
                        <select name="status"
                            class="w-full p-2 border rounded-md focus:ring-2 focus:ring-[#ffb4a2] focus:outline-none transition duration-500"
                            required>
                            <option value="tertunda" <?php echo $tugas['status']==='tertunda' ? 'selected' : '' ; ?>
                                >Tertunda
                            </option>
                            <option value="selesai" <?php echo $tugas['status']==='selesai' ? 'selected' : '' ; ?>
                                >Selesai
                            </option>
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full bg-[#ffb4a2] text-white p-2 rounded-md hover:bg-red-300 transition duration-500">Simpan
                        Perubahan</button>
                </form>
            </div>

        </div> <!-- End - Main Content -->

    </div> <!-- End - Wrapper -->

    <!-- Javascript -->
    <script src="../assets/js/pengguna/script.js"></script>

</body>

</html>
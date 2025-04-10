<?php

// Memulai Sesi
session_start();

// Pengecekan pengguna sudah login atau belum jika sudah maka kembalikakan ke halaman masing masing
if (isset($_SESSION['id_pengguna'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin/beranda.php");
    } elseif ($_SESSION['role'] == 'pengguna') {
        header("Location: pengguna/beranda.php");
    }
    exit();
}

?>
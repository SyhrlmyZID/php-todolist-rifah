<?php

// Memulai Sesi
session_start();

// Koneksi database
include '../koneksi/koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['id_pengguna'])) {
    header("Location: ../../autentikasi/login.php");
    exit();
}

// Mencegah pengguna masuk ke halaman admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../pengguna/beranda.php");
    exit();
}

// Ambil ID pengguna yang ingin dihapus
if (isset($_GET['id'])) {
    $id_pengguna = $_GET['id'];
    $id_pengguna_saat_ini = $_SESSION['id_pengguna'];

    // Pengecekan akun sedang digunakan, ketika memakai akun yang sedang digunakan maka tidak bisa di hapus
    if ($id_pengguna == $id_pengguna_saat_ini) {
        echo "<script>alert('Akun ini tidak dapat dihapus karena sedang digunakan!'); window.location.href = '../../admin/pengguna.php';</script>";
        exit();
    }

    // Jika bukan akun yang sedang digunakan, hapus akun
    $queryHapus = "DELETE FROM akun WHERE id_pengguna = '$id_pengguna'";
    
    if ($conn->query($queryHapus) === TRUE) {
        // Pesan berhasil menghapus pengguna
        echo "<script>alert('Pengguna berhasil dihapus!'); window.location.href = '../../admin/pengguna.php';</script>";
    } else {
        // Pesan gagal menghapus pengguna
        echo "<script>alert('Gagal menghapus pengguna!'); window.location.href = '../../admin/pengguna.php';</script>";
    }
} else {
    // Pesan ketika id yang ingin di hapus tidak ada
    echo "<script>alert('ID pengguna tidak ditemukan!'); window.location.href = '../../admin/pengguna.php';</script>";
}

?>

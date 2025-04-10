<?php

// Memulai Sesi
session_start();

// Koneksi database
include '../php/koneksi/koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['id_pengguna'])) {
    header("Location: ../autentikasi/login.php");
    exit();
}

// Mencegah pengguna masuk ke halaman pengguna
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../pengguna/beranda.php");
    exit();
}

// Membuat Sesi
$id_pengguna = $_SESSION['id_pengguna'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];

// Mengambil daftar pengguna dari database
$queryPengguna = "SELECT id_pengguna, nama, email, role FROM akun";
$resultPengguna = $conn->query($queryPengguna);

?>
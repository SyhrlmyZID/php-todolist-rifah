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

// Query untuk mengambil total tugas **(Semua tugas dalam tabel)**
$queryTotal = "SELECT COUNT(*) AS total FROM tugas";
// Query untuk mengambil total pengguna
$queryPengguna = "SELECT COUNT(*) AS total_pengguna FROM akun";

// Menyiapkan statement untuk total tugas
$stmtTotal = $conn->prepare($queryTotal);
$stmtTotal->execute();
$resultTotal = $stmtTotal->get_result();
$totalTugas = $resultTotal->fetch_assoc()['total'] ?? 0;
$stmtTotal->close(); // Tutup statement setelah digunakan

// Menyiapkan statement untuk total pengguna
$stmtPengguna = $conn->prepare($queryPengguna);
$stmtPengguna->execute();
$resultPengguna = $stmtPengguna->get_result();
$totalPengguna = $resultPengguna->fetch_assoc()['total_pengguna'] ?? 0;
$stmtPengguna->close(); // Tutup statement setelah digunakan

// Menutup koneksi database
$conn->close();

?>
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

// Mencegah admin masuk ke halaman pengguna
if ($_SESSION['role'] !== 'pengguna') {
    header("Location: ../admin/beranda.php");
    exit();
}

// Membuat Sesi
$id_pengguna = $_SESSION['id_pengguna'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];

// Query untuk mengambil total tugas berdasarkan id_pengguna
$queryTotal = "SELECT COUNT(*) AS total FROM tugas WHERE id_pengguna = ?";
// Query untuk mengambil total tugas yang sudah selesai
$querySelesai = "SELECT COUNT(*) AS selesai FROM tugas WHERE id_pengguna = ? AND status = 'selesai'";
// Query untuk mengambil total tugas yang tertunda
$queryTertunda = "SELECT COUNT(*) AS tertunda FROM tugas WHERE id_pengguna = ? AND status = 'tertunda'";

// Menyiapkan statement untuk total tugas
$stmtTotal = $conn->prepare($queryTotal);
$stmtTotal->bind_param("i", $id_pengguna); 
$stmtTotal->execute();
$resultTotal = $stmtTotal->get_result(); 
$totalTugas = $resultTotal->fetch_assoc()['total'] ?? 0;

// Menyiapkan statement untuk tugas selesai
$stmtSelesai = $conn->prepare($querySelesai);
$stmtSelesai->bind_param("i", $id_pengguna); 
$stmtSelesai->execute();
$resultSelesai = $stmtSelesai->get_result();
$totalSelesai = $resultSelesai->fetch_assoc()['selesai'] ?? 0;

// Menyiapkan statement untuk tugas tertunda
$stmtTertunda = $conn->prepare($queryTertunda);
$stmtTertunda->bind_param("i", $id_pengguna); 
$stmtTertunda->execute(); 
$resultTertunda = $stmtTertunda->get_result();
$totalTertunda = $resultTertunda->fetch_assoc()['tertunda'] ?? 0;

// Menutup Semua Koneksi
$stmtTotal->close(); 
$stmtSelesai->close(); 
$stmtTertunda->close(); 
$conn->close();

?>

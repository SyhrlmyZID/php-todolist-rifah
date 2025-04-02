<?php

// Memulai Sesi
session_start();

// Koneksi Database
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

// Ambil ID pengguna dari sesi
$id_pengguna = $_SESSION['id_pengguna'];

// Ambil tugas dari database untuk pengguna yang sedang login
$sql = "SELECT * FROM tugas WHERE id_pengguna = ? ORDER BY deadline ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_pengguna);
$stmt->execute();
$result = $stmt->get_result();

?>
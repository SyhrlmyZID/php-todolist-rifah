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

// Mencegah pengguna masuk ke halaman admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../pengguna/beranda.php");
    exit();
}

// Cek id pengguna apakah ada dalam url
if (!isset($_GET['id'])) {
    header("Location: pengguna.php");
    exit();
}

$id_pengguna = $_GET['id'];

// Ambil data pengguna dari database
$query = "SELECT * FROM akun WHERE id_pengguna = '$id_pengguna'";
$result = $conn->query($query);

// Pengecekan apakah id pengguna yang akan di edit ada atau tidak ada, jika tidak ada maka kembalika ke halaman pengguna
if ($result->num_rows == 0) {
    echo "<script>alert('Pengguna tidak ditemukan!'); window.location.href = 'pengguna.php';</script>";
    exit();
}

$row = $result->fetch_assoc();

// Proses update pengguna
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Pengecekan apakah email nya pada database sudah ada atau belum
    $cek_email = "SELECT * FROM akun WHERE email = '$email' AND id_pengguna != '$id_pengguna'";
    $result_email = $conn->query($cek_email);

    if ($result_email->num_rows > 0) {
        // Jika email sudah terpakai, tampilkan pesan error
        echo "<script>alert('Email sudah terpakai, silahkan ganti!'); window.location.href = 'edit_pengguna.php?id=$id_pengguna';</script>";
        exit();
    }

    // Update data pengguna
    $query_update = "UPDATE akun SET nama='$nama', email='$email', password='$password', role='$role' WHERE id_pengguna='$id_pengguna'";

    if ($conn->query($query_update) === TRUE) {
        // Pesan berhasil memperbaharui pengguna
        echo "<script>alert('Pengguna berhasil diperbarui!'); window.location.href = 'pengguna.php';</script>";
    } else {
        // Pesan gagal memperbaharui pengguna
        echo "<script>alert('Gagal memperbarui pengguna!'); window.location.href = 'edit_pengguna.php?id=$id_pengguna';</script>";
    }
}

?>
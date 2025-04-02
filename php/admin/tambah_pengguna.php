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

// Proses tambah pengguna
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Pengecekan email apakah ada
    $cek_email = "SELECT * FROM akun WHERE email = '$email'";
    $result = $conn->query($cek_email);

    if ($result->num_rows > 0) {
        // Jika email sudah ada, maka tampilkan alert karena pada kolum akun pada email ditambahkan unique (tidak boleh sama)
        echo "<script>alert('Email sudah terpakai, silahkan ganti!'); window.location.href = 'tambah_pengguna.php';</script>";
        exit();
    }

    // Query sql menambahkan data pengguna ke database
    $query = "INSERT INTO akun (nama, email, password, role) VALUES ('$nama', '$email', '$password', '$role')";
    
    if ($conn->query($query) === TRUE) {
        // Pesan berhasil meambahkan pengguna
        echo "<script>alert('Pengguna berhasil ditambahkan!'); window.location.href = 'pengguna.php';</script>";
    } else {
        // Pesan error menambahkan pengguna
        echo "<script>alert('Gagal menambahkan pengguna!'); window.location.href = 'tambah_pengguna.php';</script>";
    }
}

?>
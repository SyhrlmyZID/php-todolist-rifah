<?php

// Memulai Sesi
session_start();

// Pengecekan cookie ketika rememberme di ceklist pada form login 
if (!isset($_SESSION['email']) && isset($_COOKIE['rememberme'])) {
    include 'php/koneksi/koneksi.php';
    $email = $_COOKIE['rememberme'];
    $query = "SELECT * FROM akun WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if ($user = mysqli_fetch_assoc($result)) {
        $_SESSION['id_pengguna'] = $user['id_pengguna'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
    }
}
?>

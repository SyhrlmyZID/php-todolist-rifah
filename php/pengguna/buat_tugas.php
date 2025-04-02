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

// Membuat Sesi
$id_pengguna = $_SESSION['id_pengguna'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];


// Proses ketika form disubmit (request POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil input dari form
    $judul_tugas = trim($_POST['judul_tugas']);
    $deskripsi = trim($_POST['deskripsi']);
    $deadline = trim($_POST['deadline']);
    $id_pengguna = $_SESSION['id_pengguna'];

    // Memeriksa apakah semua input telah diisi
    if (!empty($judul_tugas) && !empty($deskripsi) && !empty($deadline)) {
        // Menyiapkan query untuk memasukkan tugas ke dalam database
        $stmt = $conn->prepare("INSERT INTO tugas (id_pengguna, nama_tugas, deskripsi, deadline, status) VALUES (?, ?, ?, ?, 'tertunda')");
        // Mengikat parameter untuk query
        $stmt->bind_param("isss", $id_pengguna, $judul_tugas, $deskripsi, $deadline);

        // Mengeksekusi query
        if ($stmt->execute()) {
            // Jika tugas berhasil ditambahkan, tampilkan pesan sukses dan arahkan kembali ke halaman 'buat_tugas.php'
            echo "<script>alert('Tugas berhasil ditambahkan!'); window.location.href = 'buat_tugas.php';</script>";
        } else {
            // Jika terjadi kesalahan saat memasukkan data, tampilkan pesan error
            echo "<script>alert('Terjadi kesalahan, coba lagi!');</script>";
        }
        // Menutup prepared statement
        $stmt->close();
    } else {
        // Jika ada input yang kosong, tampilkan peringatan
        echo "<script>alert('Semua bidang harus diisi!');</script>";
    }
    // Menutup koneksi database
    $conn->close();
}

?>

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

// Ambil ID pengguna yang sedang login
$id_pengguna = $_SESSION['id_pengguna'];

// Jika tidak ada id yang di panggil maka kembalikan ke halaman sebelum nya
if (!isset($_GET['id_tugas'])) {
    header("Location: daftar_tugas.php");
    exit();
}

$id_tugas = $_GET['id_tugas'];

// Pengecekan tugas apakah milik pengguna
$sql_check = "SELECT * FROM tugas WHERE id_tugas = ? AND id_pengguna = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("ii", $id_tugas, $id_pengguna);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

// Jika tidak ada tugas maka kembalikan ke halaman daftar_tugas
if ($result_check->num_rows === 0) {
    header("Location: daftar_tugas.php?error=tugastidakada");
    exit();
}

$task = $result_check->fetch_assoc();

// Jika tombol hapus dikonfirmasi
if (isset($_POST['hapus'])) {
    // Query sql menghapus tugas
    $sql_delete = "DELETE FROM tugas WHERE id_tugas = ? AND id_pengguna = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("ii", $id_tugas, $id_pengguna);
    
    // Menampilkan alert
    if ($stmt_delete->execute()) {
        // Pesan ketika berhasil menghapus tugas
        echo "<script>
            alert('Tugas \"{$task['nama_tugas']}\" berhasil dihapus.');
            window.location.href = 'daftar_tugas.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Tugas gagal di hapus.');
            window.location.href = 'hapus_tugas.php';
        </script>";
    }
}

?>
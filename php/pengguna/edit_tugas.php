<?php

// Memulai sesi
session_start();

// Koneksi ke database
include '../php/koneksi/koneksi.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['id_pengguna'])) {
    header("Location: ../autentikasi/login.php");
    exit();
}

// Mencegah admin mengakses halaman pengguna
if ($_SESSION['role'] !== 'pengguna') {
    header("Location: ../admin/beranda.php"); 
    exit();
}

// Ambil ID pengguna dari sesi
$id_pengguna = $_SESSION['id_pengguna'];

// Jika tidak ada id tugas yang diedit, kembalikan ke halaman sebelumnya
if (!isset($_GET['id_tugas'])) {
    header("Location: daftar_tugas.php");
    exit();
}

$id_tugas = $_GET['id_tugas'];

// Ambil data tugas berdasarkan ID tugas dan ID pengguna
$sql = "SELECT * FROM tugas WHERE id_tugas = ? AND id_pengguna = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_tugas, $id_pengguna);
$stmt->execute();
$result = $stmt->get_result();
$tugas = $result->fetch_assoc();

// Jika tugas tidak ditemukan, kembali ke daftar tugas
if (!$tugas) {
    header("Location: daftar_tugas.php");
    exit();
}

// Proses update tugas jika form di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_tugas = $_POST['nama_tugas'];
    $deskripsi = $_POST['deskripsi'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    // Query untuk update tugas
    $sql_update = "UPDATE tugas SET nama_tugas = ?, deskripsi = ?, deadline = ?, status = ? WHERE id_tugas = ? AND id_pengguna = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssssii", $nama_tugas, $deskripsi, $deadline, $status, $id_tugas, $id_pengguna);
        
    // Eksekusi query dan cek apakah tugas berhasil diperbarui
    if ($stmt_update->execute()) {
        // Pesan berhasil update tugas
        echo "<script>
                alert('Tugas berhasil diperbarui!');
                window.location.href = 'daftar_tugas.php';
              </script>";
        exit();
    } else {
        // Pesan gagal update tugas
        echo "<script>
                alert('Tugas gagal di update!');
                window.location.href = 'edit_tugas.php';
              </script>";
    }
}

?>

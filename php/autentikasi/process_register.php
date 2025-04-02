<?php

// Koneksi Database
include '../koneksi/koneksi.php';

// Mendapatkan data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = 'pengguna'; // Role default pengguna

// Validasi jika data tidak kosong
if (!empty($nama) && !empty($email) && !empty($password)) {
    // Mengecek apakah email sudah ada di database
    $email_check_query = "SELECT * FROM akun WHERE email = '$email'";
    $result = mysqli_query($conn, $email_check_query);
    
    if (mysqli_num_rows($result) > 0) {
        // Jika email sudah terdaftar, tampilkan alert
        echo "<script>alert('Email sudah terpakai!'); window.location.href='../../autentikasi/register.php';</script>";
    } else {
        // Jika email belum terdaftar, lanjutkan dengan proses registrasi
        $query = "INSERT INTO akun (nama, email, password, role) VALUES ('$nama', '$email', '$password', '$role')";
        
        if (mysqli_query($conn, $query)) {
            // Redirect ke halaman login setelah berhasil
            header("Location: ../../autentikasi/login.php");
            exit();
        } else {
            echo "Gagal membuat akun: " . mysqli_error($conn);
        }
    }
} else {
    echo "Harap isi semua kolom!";
}

// Menutup koneksi database
mysqli_close($conn);
?>

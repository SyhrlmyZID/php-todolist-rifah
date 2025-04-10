<?php
<<<<<<< HEAD
session_start();

// Include the database connection
include '../koneksi/koneksi.php';

// Get data from the login form
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Validate if data is not empty
if (!empty($email) && !empty($password)) {
    // Query to check if the email exists in the database
    $query = "SELECT * FROM akun WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    // Check if the email is found
    if (mysqli_num_rows($result) > 0) {
        // Fetch user data from the database
        $user = mysqli_fetch_assoc($result);

        // Verify if the password matches (no hash check here)
        if ($password === $user['password']) {
            // Set session variables to store user data
=======

// Memulai Sesi
session_start();

// Menghubungkan Ke Database
include '../koneksi/koneksi.php';

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (!empty($email) && !empty($password)) {
    $query = "SELECT * FROM akun WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Menyimpan session sementara
        if ($password === $user['password']) {
>>>>>>> 61c90a0 (Perubahan Pada Kalender Dan Cookie)
            $_SESSION['id_pengguna'] = $user['id_pengguna'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

<<<<<<< HEAD
            // Redirect user based on their role
            if ($user['role'] == 'admin') {
                header("Location: ../../admin/beranda.php");
                exit();
=======
            // Jika rememberme dicentang, set cookie selama 7 hari
            if (isset($_POST['rememberme'])) {
                setcookie('rememberme', $user['email'], time() + (86400 * 7), "/");
            }

            // Jika login dengan akun admin maka pindahkan ke halaman dashboard admin
            if ($user['role'] == 'admin') {
                header("Location: ../../admin/beranda.php");
                exit();
            // Jika login dengan akun pengguna maka pindahkan ke halaman dashboard pengguna
>>>>>>> 61c90a0 (Perubahan Pada Kalender Dan Cookie)
            } else {
                header("Location: ../../pengguna/beranda.php");
                exit();
            }
        } else {
<<<<<<< HEAD
            // If password is incorrect
            echo "<script>alert('Password salah!'); window.location.href='../../autentikasi/login.php';</script>";
        }
    } else {
        // If email is not found
=======
            echo "<script>alert('Password salah!'); window.location.href='../../autentikasi/login.php';</script>";
        }
    } else {
>>>>>>> 61c90a0 (Perubahan Pada Kalender Dan Cookie)
        echo "<script>alert('Email tidak ada'); window.location.href='../../autentikasi/login.php';</script>";
    }
} else {
    echo "<script>alert('Harap isi semua kolom!'); window.location.href='../../autentikasi/login.php';</script>";
}

<<<<<<< HEAD
// Close the database connection
mysqli_close($conn);
=======
mysqli_close($conn);

>>>>>>> 61c90a0 (Perubahan Pada Kalender Dan Cookie)
?>

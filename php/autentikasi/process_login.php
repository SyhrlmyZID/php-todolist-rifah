<?php
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
            $_SESSION['id_pengguna'] = $user['id_pengguna'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            // Redirect user based on their role
            if ($user['role'] == 'admin') {
                header("Location: ../../admin/beranda.php");
                exit();
            } else {
                header("Location: ../../pengguna/beranda.php");
                exit();
            }
        } else {
            // If password is incorrect
            echo "<script>alert('Password salah!'); window.location.href='../../autentikasi/login.php';</script>";
        }
    } else {
        // If email is not found
        echo "<script>alert('Email tidak ada'); window.location.href='../../autentikasi/login.php';</script>";
    }
} else {
    echo "<script>alert('Harap isi semua kolom!'); window.location.href='../../autentikasi/login.php';</script>";
}

// Close the database connection
mysqli_close($conn);
?>

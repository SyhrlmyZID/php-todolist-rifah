<?php
<<<<<<< HEAD

// Mulai session
session_start();

// Menghapus semua session
session_unset();

// Menghancurkan session
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: ../../autentikasi/login.php");
exit();

=======
session_start();
session_unset();
session_destroy();

// Hapus cookie rememberme jika ada
if (isset($_COOKIE['rememberme'])) {
    setcookie('rememberme', '', time() - 3600, "/");
}

header("Location: ../../autentikasi/login.php");
exit();
>>>>>>> 61c90a0 (Perubahan Pada Kalender Dan Cookie)
?>

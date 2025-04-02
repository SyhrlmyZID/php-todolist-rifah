<?php

// Mulai session
session_start();

// Menghapus semua session
session_unset();

// Menghancurkan session
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: ../../autentikasi/login.php");
exit();

?>

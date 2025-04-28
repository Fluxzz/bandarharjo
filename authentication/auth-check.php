<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Pastikan BASE_URL terdefinisi
define('BASE_URL', '/'); // <--- GANTI ini kalau perlu

if (!isset($_SESSION['username'])) {
    header('Location: ' . BASE_URL . 'authentication/login.php');
    exit;
}
?>

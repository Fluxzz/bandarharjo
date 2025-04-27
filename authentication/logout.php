<?php
session_start();
session_destroy();  // Menghapus sesi
$_SESSION['notification'] = "Anda telah logout."; // Set notifikasi logout
header('Location: /index.php');  // Mengarahkan kembali ke halaman index
exit;
?>

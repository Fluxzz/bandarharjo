<?php
$host = "localhost";
$user = "root";
$pass = ""; // sesuaikan password
$db   = "bandarharjo"; // ganti dengan nama database kamu

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

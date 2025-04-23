<?php
// Mengatur detail koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$username = 'root';  // Ganti dengan username database Anda
$password = '';      // Ganti dengan password database Anda
$database = 'bandarharjo2'; // Nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
//echo "Koneksi berhasil"; // Opsional, untuk memastikan koneksi berhasil
?>

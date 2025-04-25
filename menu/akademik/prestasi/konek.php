<?php
$host = "localhost";
$user = "root";
$password = ""; // kalau di XAMPP biasanya kosong
$database = "bandarharjo2";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>


<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

$id = $_GET['id'];

// Cek dulu datanya
$query = mysqli_query($conn, "SELECT * FROM galery WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    if ($data['kategori'] == 'foto' && !empty($data['foto'])) {
        $file_path = "/upload/" . $data['foto'];
        if (file_exists($file_path)) {
            unlink($file_path); // Hapus file dari folder
        }
    }

    // Hapus data dari database
    mysqli_query($conn, "DELETE FROM galery WHERE id='$id'");
}

header("Location: galery.php");
?>

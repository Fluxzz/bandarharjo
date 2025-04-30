<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil nama file gambar
    $stmt = $conn->prepare("SELECT foto FROM pendidik WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $pendidik = $result->fetch_assoc();

    // Pastikan data ditemukan
    if ($pendidik) {
        $foto = $pendidik['foto'];
        $filePath = "/bandarharjo/upload/" . $foto;

        // Cek apakah file ada dan hapus file gambar dari folder
        if (file_exists($filePath)) {
            unlink($filePath); // Menghapus file gambar
        }

        // Hapus data pendidik dari database
        $deleteStmt = $conn->prepare("DELETE FROM pendidik WHERE id = ?");
        $deleteStmt->bind_param("i", $id);
        if ($deleteStmt->execute()) {
            header("Location: profile.php?success=1"); // Redirect ke halaman utama dengan pesan sukses
        } else {
            echo "Gagal menghapus data: " . $deleteStmt->error;
        }
        $deleteStmt->close();
    } else {
        echo "Data tidak ditemukan.";
    }

    $stmt->close();
} else {
    echo "ID tidak tersedia.";
}
?>

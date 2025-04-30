<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Memastikan bahwa data ID dan file path diterima melalui POST
if (isset($_POST['id']) && isset($_POST['file_path'])) {
    $id = $_POST['id'];
    $file_path = $_POST['file_path'];

    // Menampilkan data untuk debugging (Hapus setelah selesai debugging)
    // echo "ID yang diterima melalui POST: " . $id . "<br>";
    // echo "File yang diterima: " . $file_path . "<br>";

    // Validasi ID
    if (empty($id) || !is_numeric($id)) {
        die("ID tidak valid: " . $id);
    }

    // Validasi file path
    if (empty($file_path)) {
        die("File path tidak valid.");
    }

    // Path lengkap ke file yang akan dihapus
    $file_to_delete = "../../../menu/akademik/kaldik/file_kaldik/" . $file_path;
    // echo "File yang akan dihapus: " . $file_to_delete . "<br>";

    // Mengecek apakah file ada di path yang ditentukan
    if (file_exists($file_to_delete)) {
        // Menghapus file
        if (unlink($file_to_delete)) {
            echo "File berhasil dihapus.<br>";
        } else {
            echo "Gagal menghapus file.<br>";
        }
    } else {
        echo "File tidak ditemukan di path: " . $file_to_delete . "<br>";
    }

    // Hapus data dari database menggunakan prepared statement untuk keamanan
    $sql = "DELETE FROM kaldik WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // Mengikat parameter ID dengan tipe integer
    if ($stmt->execute()) {
        echo "Data berhasil dihapus dari database.<br>";
        // Setelah penghapusan, redirect ke halaman daftar kaldik
        header("Location: kaldik.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . $stmt->error . "<br>";
    }

    // Menutup prepared statement
    $stmt->close();
} else {
    echo "Data tidak lengkap. ID atau file path tidak ditemukan.<br>";
}

// Menutup koneksi database
$conn->close();
?>

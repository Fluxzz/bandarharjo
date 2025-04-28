<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('/bandarharjo/partials/header.php');
  include_once('/bandarharjo/authentication/auth-check.php');
  include('/bandarharjo/koneksi.php');

// Pastikan data ID ada
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Ambil dulu nama file dari database
    $query = "SELECT file FROM ebook WHERE id = $id";
    $result = $conn->query($query);
    $file = "";

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file = $row['file'];

        // Hapus data dari database
        $delete = "DELETE FROM ebook WHERE id = $id";
        if ($conn->query($delete) === TRUE) {
            
            // Hapus file di server jika ada
            if (!empty($file)) {
                $filePath = $_SERVER['DOCUMENT_ROOT'] . "/bandarharjo/menu/akademik/e-book/upload/" . $file;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            echo "<script>alert('E-book berhasil dihapus.'); window.location.href='e-book.php';</script>";
        } else {
            echo "Error menghapus data: " . $conn->error;
        }
    }
} else {
    echo "ID tidak ditemukan.";
}
?>

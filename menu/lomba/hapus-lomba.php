<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('/bandarharjo/partials/header.php');
  include_once('/bandarharjo/authentication/auth-check.php');
  include('/bandarharjo/koneksi.php');

// Cek jika ID lomba ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data lomba berdasarkan ID
    $query = "DELETE FROM lomba WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    // Eksekusi query
    if ($stmt->execute()) {
        // Redirect ke halaman lomba.php setelah berhasil menghapus
        header("Location: lomba.php");
        exit;
    } else {
        echo "Gagal menghapus data lomba: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID lomba tidak ditemukan.";
    exit;
}

$conn->close();
?>

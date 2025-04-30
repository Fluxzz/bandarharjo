<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');
// Cek jika ID ada di URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM tautan WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>alert('Tautan berhasil dihapus.'); window.location.href = 'tautan.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID tidak valid.";
}

$conn->close();
?>

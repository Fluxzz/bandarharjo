<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

if (isset($_GET['keterangan'])) {
    $keterangan = $_GET['keterangan'];

    $stmt = $conn->prepare("DELETE FROM sarana WHERE keterangan = ?");
    $stmt->bind_param("s", $keterangan);

    if ($stmt->execute()) {
        // Redirect ke siswa.php dengan notifikasi berhasil
        header("Location: siswa.php?status=success");
        exit;
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Keterangan tidak ditemukan dalam permintaan.";
}

$conn->close();
?>

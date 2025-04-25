<?php
include('/bandarharjo/koneksi.php');

// Pastikan parameter id tersedia dan valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil data dulu untuk hapus gambar (opsional, jika kamu menyimpan gambar dan ingin menghapus file fisiknya)
    $querySelect = "SELECT foto FROM prestasi WHERE id = $id";
    $resultSelect = mysqli_query($conn, $querySelect);
    $data = mysqli_fetch_assoc($resultSelect);

    // Hapus gambar fisik jika ada
    if ($data && file_exists($data['foto'])) {
        unlink($data['foto']);
    }

    // Hapus data dari database
    $queryDelete = "DELETE FROM prestasi WHERE id = $id";
    if (mysqli_query($conn, $queryDelete)) {
        // Redirect ke halaman utama setelah hapus
        header("Location: prestasi.php");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak valid.";
}
?>

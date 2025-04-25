<?php
include '/bandarharjo/koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil nama file foto dari database
    $stmt = $conn->prepare("SELECT foto FROM pengumuman WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $pengumuman = $result->fetch_assoc();

    if ($pengumuman) {
        // Dapatkan path file
        $foto = $pengumuman['foto'];
        $filePath = $_SERVER['DOCUMENT_ROOT'] . "/bandarharjo/upload/" . $foto;

        // Hapus file jika ada
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Hapus data dari database
        $deleteStmt = $conn->prepare("DELETE FROM pengumuman WHERE id = ?");
        $deleteStmt->bind_param("i", $id);

        if ($deleteStmt->execute()) {
            header("Location: pengumuman.php?success=1");
            exit();
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

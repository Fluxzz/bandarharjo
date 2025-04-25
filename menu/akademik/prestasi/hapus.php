<?php
if (isset($_GET['id'])) {
    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "bandarharjo2");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $id = intval($_GET['id']); // pastikan ID aman dari injeksi

    // Ambil nama file gambar dari database
    $sql = "SELECT foto FROM sang_juara WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $fotoPath = $data['foto']; // Ini biasanya berisi 'upload/nama_file.jpg'

        // Hapus file gambar dari folder jika ada
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }

        // Hapus data dari database
        $delete = "DELETE FROM sang_juara WHERE id = $id";
        if ($conn->query($delete) === TRUE) {
            header("Location: prestasi.php");
            exit;
        } else {
            echo "Gagal menghapus data: " . $conn->error;
        }
    } else {
        echo "Data tidak ditemukan.";
    }

    $conn->close();
} else {
    echo "ID tidak ditemukan.";
}
?>

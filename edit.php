<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isi = $_POST['description'];
    $id = 1; // Asumsi hanya ada 1 sambutan (id = 1)

    // Jika upload file dilakukan
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $namaFile = $_FILES['photo']['name'];  // Nama file asli
        $tmpFile = $_FILES['photo']['tmp_name'];
        $folderTujuan = "bandarharjo/upload/";  // Folder tujuan untuk menyimpan gambar
        $tujuan = $folderTujuan . $namaFile;

        // Simpan file ke folder upload
        move_uploaded_file($tmpFile, $_SERVER['DOCUMENT_ROOT'] . '/' . $tujuan);

        // Update isi dan foto (hanya simpan nama file di database)
        $query = "UPDATE beranda SET isi = ?, foto = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $isi, $namaFile, $id);  // Menggunakan nama file saja
    } else {
        // Update hanya isi jika tidak ada file yang di-upload
        $query = "UPDATE beranda SET isi = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $isi, $id);
    }

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal memperbarui data: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

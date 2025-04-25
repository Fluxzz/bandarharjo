<?php
include('/bandarharjo/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isi = $_POST['description'];
    $id = 1; // Asumsi hanya ada 1 sambutan (id = 1)

    // Jika upload file dilakukan
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $namaFile = $_FILES['photo']['name'];
        $tmpFile = $_FILES['photo']['tmp_name'];
        $tujuan = "/bandarharjo/upload/" . $namaFile;


        // Simpan file ke folder upload
        move_uploaded_file($tmpFile, $_SERVER['DOCUMENT_ROOT'] . $tujuan);

        // Update isi dan foto
        $query = "UPDATE beranda SET isi = ?, foto = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $isi, $tujuan, $id);
    } else {
        // Update hanya isi
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

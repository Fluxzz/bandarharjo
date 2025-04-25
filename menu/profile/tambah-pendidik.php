<?php
include '/bandarharjo/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama    = htmlspecialchars($_POST['nama']);
    $jabatan = htmlspecialchars($_POST['posisi']);
    $foto    = $_FILES['foto'];

    // Folder tujuan simpan file
    $uploadDir = "/bandarharjo/upload/";
    $originalName = basename($foto["name"]);
    $fileType = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    // Ganti nama file supaya unik, misalnya pakai timestamp
    $newFileName = uniqid("foto_", true) . "." . $fileType;
    $targetPath = $uploadDir . $newFileName;

    // Cek ekstensi
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileType, $allowedTypes)) {
        // Upload file
        if (move_uploaded_file($foto["tmp_name"], $targetPath)) {
            // Simpan ke database
            $stmt = $conn->prepare("INSERT INTO pendidik (nama, jabatan, foto) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama, $jabatan, $newFileName);

            if ($stmt->execute()) {
                header("Location: profile.php?success=1");
                exit;
            } else {
                echo "Gagal menyimpan data: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Gagal mengupload gambar.";
        }
    } else {
        echo "Jenis file tidak didukung. Hanya JPG, JPEG, PNG, GIF yang diperbolehkan.";
    }
}
?>

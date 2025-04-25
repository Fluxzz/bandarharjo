<?php
// koneksi ke database
include '/bandarharjo/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tahun_ajaran = $_POST['tahun_ajaran'];

    // Lokasi penyimpanan file relatif terhadap folder proyek
    $target_dir = "file_kaldik/";

    // Ganti spasi di nama file agar URL-nya tidak error
    $nama_file = str_replace(' ', '_', basename($_FILES["file_kaldik"]["name"]));

    $target_file = $target_dir . $nama_file;
    $uploadOk = 1;

    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.<br>";
        $uploadOk = 0;
    }

    // Batasi ukuran file maksimal 5MB
    if ($_FILES["file_kaldik"]["size"] > 500000000) {
        echo "Maaf, ukuran file terlalu besar.<br>";
        $uploadOk = 0;
    }

    // Batasi format file: hanya PDF dan gambar
    if (!in_array($fileType, ['jpg', 'jpeg', 'png', 'gif', 'pdf'])) {
        echo "Hanya file JPG, PNG, GIF, dan PDF yang diperbolehkan.<br>";
        $uploadOk = 0;
    }

    // Upload file jika lolos pengecekan
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file_kaldik"]["tmp_name"], $target_file)) {
            // Simpan ke database
            $sql = "INSERT INTO kaldik (tahun_ajaran, file_kaldik) VALUES ('$tahun_ajaran', '$target_file')";
            if (mysqli_query($conn, $sql)) {
                echo "Data berhasil ditambahkan. <a href='$target_file' target='_blank'>Lihat File</a>";
            } else {
                echo "Gagal menyimpan ke database: " . mysqli_error($conn);
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah file.<br>";
        }
    } else {
        echo "File tidak berhasil diunggah.<br>";
    }
}
?>

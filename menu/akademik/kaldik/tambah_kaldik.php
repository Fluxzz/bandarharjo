<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('/bandarharjo/partials/header.php');
  include_once('/bandarharjo/authentication/auth-check.php');
  include('/bandarharjo/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $kategori = $_POST['kategori'];  // Pastikan kategori diterima dengan benar

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

    // Batasi ukuran file maksimal 50MB
    if ($_FILES["file_kaldik"]["size"] > 50000000) {  // Sesuaikan ukuran file maksimal sesuai kebutuhan
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
            // Simpan hanya nama file di database, tanpa path
            $nama_file = mysqli_real_escape_string($conn, $nama_file);  // Menghindari SQL Injection
            $kategori = mysqli_real_escape_string($conn, $kategori);  // Menghindari SQL Injection

            // Simpan data ke database
            $sql = "INSERT INTO kaldik (tahun_ajaran, file_kaldik, kategori) VALUES ('$tahun_ajaran', '$nama_file', '$kategori')";
            if (mysqli_query($conn, $sql)) {
                echo "Data berhasil ditambahkan. <a href='$target_dir$nama_file' target='_blank'>Lihat File</a>";
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

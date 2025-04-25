<?php
include '/bandarharjo/partials/header.php';
include '/bandarharjo/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil dan sanitasi data dari form
    $judul = htmlspecialchars(trim($_POST['judul']));
    $isi = htmlspecialchars(trim($_POST['isi']));
    $kategori = htmlspecialchars(trim($_POST['kategori']));

    // Proses upload foto
    $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/bandarharjo/upload/"; // Pastikan folder upload ada di sini
    $fileName = basename($_FILES["foto"]["name"]);
    $targetFile = $targetDir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Validasi file gambar
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check === false) {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["foto"]["size"] > 5000000) {
        echo "Maaf, file terlalu besar.";
        $uploadOk = 0;
    }

    // Format file yang diperbolehkan
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Maaf, hanya file gambar JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Cek apakah uploadOk bernilai 0
    if ($uploadOk == 0) {
        echo "Maaf, file Anda tidak dapat diunggah.";
    } else {
        // Pastikan folder upload ada
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true); // Buat folder jika tidak ada
        }

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
            // Simpan data ke database
            $stmt = $conn->prepare("INSERT INTO pengumuman (judul, isi, foto, kategori) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $judul, $isi, $fileName, $kategori);

            if ($stmt->execute()) {
                header("Location: pengumuman.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Maaf, terjadi kesalahan dalam mengunggah file.";
        }
    }
}
?>

<link rel="stylesheet" href="/css/pengumuman.css">

<body>
    <div class="add-form">
        <h1>Tambah Pengumuman</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Judul:</label><br>
            <input type="text" name="judul" required><br><br>

            <label>Isi:</label><br>
            <textarea name="isi" required></textarea><br><br>

            <label>Kategori:</label><br>
            <select name="kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="PPDB">PPDB</option>
                <option value="MPLS">MPLS</option>
                <option value="Berita">Berita</option>
            </select><br><br>

            <label>Upload Foto:</label><br>
            <input type="file" name="foto" required><br><br>

            <button type="submit" name="submit">Kirim</button>
        </form>
    </div>
</body>
<?php
include('/bandarharjo/partials/footer.php');
?>

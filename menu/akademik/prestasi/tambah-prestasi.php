<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('/bandarharjo/partials/header.php');
  include_once('/bandarharjo/authentication/auth-check.php');
  include('/bandarharjo/koneksi.php');

// Proses simpan data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $created_at = date('Y-m-d H:i:s');

    // Proses upload file
    $foto = '';
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "/upload/";
        $filename = uniqid() . '-' . basename($_FILES['foto']['name']);
        $targetFile = $_SERVER['DOCUMENT_ROOT'] . $targetDir . $filename;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
            $foto = $targetDir . $filename;
        }
    }

    // Simpan ke database
    $query = "INSERT INTO prestasi (nama, foto, kategori, created_at) VALUES ('$nama', '$foto', '$kategori', '$created_at')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data prestasi berhasil ditambahkan!'); window.location.href='/menu/akademik/prestasi/prestasi.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
    }
}
?>

<!-- Styling dari referensi -->
<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f4f4f9;
    }

    .form-container {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 400px;
        max-width: 100%;
    }

    form h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 16px;
        color: #555;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        color: #333;
    }

    .form-group textarea {
        resize: vertical;
        height: 150px;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    button {
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #0056b3;
    }

    .cancel-btn {
        background-color: #ccc;
        color: black;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        text-decoration: none;
    }

    .cancel-btn:hover {
        background-color: #aaa;
    }
</style>

<!-- Form tambah prestasi -->
<div class="container">
    <div class="form-container">
        <form method="POST" enctype="multipart/form-data">
            <h2>Tambah Prestasi</h2>

            <div class="form-group">
                <label for="nama">Nama Prestasi</label>
                <input type="text" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="prestasi">Prestasi Siswa</option>
                    <option value="sang_juara">Sang Juara</option>
                </select>
            </div>

            <div class="form-group">
                <label for="foto">Upload Foto</label>
                <input type="file" id="foto" name="foto" accept="image/*" required>
            </div>

            <div class="form-actions">
                <a href="/menu/akademik/prestasi/prestasi.php" class="cancel-btn">Batal</a>
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php
include('/bandarharjo/partials/footer.php');
?>

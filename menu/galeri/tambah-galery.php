<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('/bandarharjo/partials/header.php');
  include_once('/bandarharjo/authentication/auth-check.php');
  include('/bandarharjo/koneksi.php');

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];
    $url_video = $_POST['url_video'];
    $foto_name = null;

    // Kalau upload foto
    if ($kategori == 'foto' && isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $folder = "../../upload/";
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $new_name = uniqid() . '.' . $ext; // Biar nama file unik, menghindari bentrok
        move_uploaded_file($_FILES['foto']['tmp_name'], $folder . $new_name);
        $foto_name = $new_name;
    }

    $query = "INSERT INTO galery (foto, judul, isi, url_video, kategori) VALUES ('$foto_name', '$judul', '$isi', '$url_video', '$kategori')";
    mysqli_query($conn, $query);

    header("Location: galery.php");
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    .form-container {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
        box-sizing: border-box;
    }

    .form-container h2 {
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
    }

    button {
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        width: 48%;
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
        width: 48%;
        text-align: center;
    }

    .cancel-btn:hover {
        background-color: #aaa;
    }
</style>

<body>
<div class="container mt-4">
    <div class="form-container">
        <h2>Tambah Galeri</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="isi">Isi</label>
                <textarea name="isi" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="foto">Foto</option>
                    <option value="video">Video</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto (Jika Kategori Foto)</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="form-group">
                <label for="url_video">URL Video (Jika Kategori Video)</label>
                <input type="text" name="url_video" class="form-control">
            </div>
            <div class="form-actions">
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                <a href="galery.php" class="cancel-btn">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>

<?php
include '../../partials/footer.php'; // koneksi database
?>

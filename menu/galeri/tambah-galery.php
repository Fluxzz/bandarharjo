<?php
include '/bandarharjo/partials/header.php'; // koneksi database
include '/bandarharjo/koneksi.php'; // koneksi database

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];
    $url_video = $_POST['url_video'];
    $foto_name = null;

    // Kalau upload foto
    if ($kategori == 'foto' && isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $folder = "upload/";
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

<body>
<div class="container mt-4">
    <h1 class="mb-4">Tambah Galeri</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="foto">Foto</option>
                <option value="video">Video</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Foto (Jika Kategori Foto)</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="mb-3">
            <label>URL Video (Jika Kategori Video)</label>
            <input type="text" name="url_video" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
</body>
<?php
include '/bandarharjo/partials/footer.php'; // koneksi database
?>


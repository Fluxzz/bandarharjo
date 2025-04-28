<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('/bandarharjo/partials/header.php');
  include_once('/bandarharjo/authentication/auth-check.php');
  include('/bandarharjo/koneksi.php');

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    
    // Menangani upload foto lomba
    $foto = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $namaFile = $_FILES['foto']['name'];
        $tmpFile = $_FILES['foto']['tmp_name'];
        $foto = "/upload/" . $namaFile;

        // Simpan file ke folder upload
        move_uploaded_file($tmpFile, $_SERVER['DOCUMENT_ROOT'] . $foto);
    }

    // Query untuk memasukkan data lomba
    $query = "INSERT INTO lomba (nama,  foto) VALUES (?,  ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $nama, $foto);

    if ($stmt->execute()) {
        // Redirect ke halaman lomba setelah berhasil
        header("Location: lomba.php");
        exit;
    } else {
        echo "Gagal menambahkan data lomba: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!-- Formulir untuk menambah lomba -->
<style>
    /* Style untuk container dan form */
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

    h2 {
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
    .form-group textarea {
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
    <div class="container">
        <div class="form-container">
            <h2>Tambah Lomba Baru</h2>
            <form action="tambah-lomba.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Lomba</label>
                    <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lomba">
                </div>
                <div class="form-group">
                    <label for="foto">Foto Lomba</label>
                    <input type="file" id="foto" name="foto" accept="image/*">
                </div>
                <div class="form-actions">
                    <button type="submit">Tambah Lomba</button>
                    <a href="lomba.php" class="cancel-btn">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>

<?php
include('/bandarharjo/partials/footer.php');
?>

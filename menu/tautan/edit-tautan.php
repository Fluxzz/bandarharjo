<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('/bandarharjo/partials/header.php');
  include_once('/bandarharjo/authentication/auth-check.php');
  include('/bandarharjo/koneksi.php');

// Cek jika ID tautan ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data tautan berdasarkan ID
    $query = "SELECT * FROM tautan WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Jika data tautan ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Tautan tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tautan tidak ditemukan.";
    exit;
}

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $link = $_POST['link'];
    $foto = $row['foto']; // Foto yang sudah ada

    // Menangani upload foto (jika ada foto baru)
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $namaFile = $_FILES['foto']['name'];
        $tmpFile = $_FILES['foto']['tmp_name'];
        $foto = "/upload/" . $namaFile;

        // Simpan file ke folder upload
        move_uploaded_file($tmpFile, $_SERVER['DOCUMENT_ROOT'] . $foto);
    }

    // Query untuk update data tautan
    $query = "UPDATE tautan SET nama = ?, link = ?, foto = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $nama, $link, $foto, $id);

    if ($stmt->execute()) {
        // Redirect ke halaman tautan setelah berhasil
        header("Location: tautan.php");
        exit;
    } else {
        echo "Gagal mengupdate data tautan: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<style>
    /* edit-tautan.css */
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.form-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-actions {
    text-align: center;
    margin-top: 20px;
}

.form-actions button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

.form-actions button:hover {
    background-color: #45a049;
}

.cancel-btn {
    display: inline-block;
    margin-left: 10px;
    padding: 10px 20px;
    background-color: #f44336;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.cancel-btn:hover {
    background-color: #e53935;
}

</style>
<!-- Formulir untuk edit tautan -->

<body>
    <div class="container">
        <div class="form-container">
            <h2>Edit Tautan</h2>
            <form action="edit-tautan.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Tautan</label>
                    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required placeholder="Masukkan nama tautan">
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="url" id="link" name="link" value="<?php echo htmlspecialchars($row['link']); ?>" required placeholder="Masukkan URL tautan">
                </div>
                <div class="form-group">
                    <label for="foto">Foto (Opsional)</label>
                    <input type="file" id="foto" name="foto" accept="image/*">
                    <?php if ($row['foto']): ?>
                        <p>Foto Saat Ini:</p>
                        <img src="<?php echo htmlspecialchars($row['foto']); ?>" alt="Logo <?php echo htmlspecialchars($row['nama']); ?>" width="100">
                    <?php endif; ?>
                </div>
                <div class="form-actions">
                    <button type="submit">Update Tautan</button>
                    <a href="tautan.php" class="cancel-btn">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
<?php
include('/bandarharjo/partials/footer.php');
?>
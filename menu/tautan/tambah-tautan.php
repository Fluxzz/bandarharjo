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
    $link = $_POST['link'];

    // Proses upload foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $uploadDir = '/upload/'; // Direktori upload
        $uploadFolder = $_SERVER['DOCUMENT_ROOT'] . $uploadDir; // Folder di server

        // Pastikan folder upload sudah ada
        if (!file_exists($uploadFolder)) {
            mkdir($uploadFolder, 0777, true);
        }

        $fileName = uniqid() . '-' . basename($_FILES['foto']['name']);
        $filePath = $uploadFolder . $fileName;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $filePath)) {
            // foto berhasil diupload
            $foto = $fileName;

            // Query untuk memasukkan data tautan beserta foto
            $query = "INSERT INTO tautan (nama, link, foto) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $nama, $link, $foto);

            if ($stmt->execute()) {
                // Redirect ke halaman tautan setelah berhasil
                header("Location: tautan.php");
                exit;
            } else {
                echo "Gagal menambahkan data tautan: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Gagal mengupload foto.";
        }
    } else {
        echo "Tidak ada foto yang diupload atau terjadi error.";
    }
}

$conn->close();
?>


<!-- Formulir untuk menambah tautan -->
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

    .form h2 {
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

    .form-group input {
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        color: #333;
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
            <h2>Tambah Tautan Baru</h2>
            <form action="tambah-tautan.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Tautan</label>
                    <input type="text" id="nama" name="nama" required placeholder="Masukkan nama tautan">
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="url" id="link" name="link" required placeholder="Masukkan URL tautan">
                </div>
                <div class="form-group">
                    <label for="foto">Upload foto</label>
                    <input type="file" id="foto" name="foto" accept="image/*" required>
                </div>
                <div class="form-actions">
                    <button type="submit">Tambah Tautan</button>
                    <a href="tautan.php" class="cancel-btn">Batal</a>
                </div>
            </form>

        </div>
    </div>
</body>
<?php
include('/bandarharjo/partials/footer.php');
?>
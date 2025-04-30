<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');
// Proses ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Gunakan __DIR__ untuk path yang fix
    $uploadFolder = __DIR__ . "/upload/";

    // Jika folder belum ada, buat foldernya
    if (!is_dir($uploadFolder)) {
        mkdir($uploadFolder, 0777, true);
    }

    $uploadOk = 1;
    $fileName = "";

    if (!empty($_FILES['file']['name'])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $uploadFolder . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Cek tipe file
        $allowedTypes = array('pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx');
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // File berhasil diupload
            } else {
                echo "<script>alert('Gagal upload file.'); window.history.back();</script>";
                $uploadOk = 0;
            }
        } else {
            echo "<script>alert('Hanya file dokumen yang diperbolehkan (PDF, DOC, PPT, XLS).'); window.history.back();</script>";
            $uploadOk = 0;
        }
    }

    // Jika file berhasil diupload atau tanpa file
    if ($uploadOk) {
        $sql = "INSERT INTO ebook (judul, deskripsi, file) VALUES ('$judul', '$deskripsi', '$fileName')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('E-book berhasil ditambahkan!'); window.location.href='e-book.php';</script>";
        } else {
            echo "<script>alert('Error: Gagal menyimpan ke database.'); window.history.back();</script>";
        }
    }
}
?>

<style>
.container-ebook {
    max-width: 700px;
    margin: 50px auto;
    padding: 20px;
    text-align: center;
}

.judul-ebook {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 30px;
    color: #333;
}

form {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    text-align: left;
}

form div {
    margin-bottom: 20px;
}

form label {
    font-weight: bold;
    display: block;
    margin-bottom: 8px;
    color: #555;
}

form input[type="text"],
form textarea,
form input[type="file"] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
    background-color: #fdfdfd;
}

form input[type="text"]:focus,
form textarea:focus,
form input[type="file"]:focus {
    border-color: #4CAF50;
    outline: none;
}

.btn-tambah {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 14px 24px;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
    margin-top: 20px;
}

.btn-tambah:hover {
    background-color: #45a049;
}

.btn-kembali {
    display: inline-block;
    margin-bottom: 20px;
    background-color: #2196F3;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-kembali:hover {
    background-color: #0b7dda;
}

</style>

<body>
    <div class="container-ebook">
        <h1 class="judul-ebook">Tambah E-book</h1>

        <a href="e-book.php" class="btn-kembali">Kembali ke Daftar E-book</a>

        <form action="tambah-ebook.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="judul">Judul Buku:</label>
                <input type="text" id="judul" name="judul" required>
            </div>
            <div>
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>
            </div>
            <div>
                <label for="file">File E-book:</label>
                <input type="file" id="file" name="file" required>
            </div>
            <button type="submit" name="submit" class="btn-tambah">Simpan E-book</button>
        </form>
    </div>
</body>

<?php
include('/bandarharjo/partials/footer.php');
?>

<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// CEK kalau ada data dikirim (user submit form)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];

    // Upload Gambar
    $gambarName = $_FILES['gambar']['name'];
    $gambarTmp = $_FILES['gambar']['tmp_name'];

    $uploadDir = "D:/bandarharjo/menu/akademik/ekstrakulikuler/upload/";
    $uploadPath = $uploadDir . basename($gambarName);

    if (move_uploaded_file($gambarTmp, $uploadPath)) {
        // Simpan ke database
        $query = "INSERT INTO ekstrakurikuler (nama, foto, created_at) VALUES ('$nama', '$gambarName', NOW())";
        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Berhasil tambah ekstrakulikuler!'); window.location.href='ekstrakulikuler.php';</script>";
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal upload gambar.";
    }
}
?>
<style>
    /* CSS FORM TAMBAH / EDIT */

    form {
        background: #ffffff;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: 0 auto;
    }

    form label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
    }

    form input[type="text"],
    form input[type="file"] {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background: #f9f9f9;
        transition: all 0.3s ease;
    }

    form input[type="text"]:focus,
    form input[type="file"]:focus {
        border-color: #007bff;
        background: #fff;
    }

    .btn-tambah {
        display: inline-block;
        background: #007bff;
        color: white;
        padding: 10px 20px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        transition: background 0.3s ease;
        border: none;
    }

    .btn-tambah:hover {
        background: #0056b3;
    }


    .form-container {
        max-width: 600px;
        margin: 30px auto;
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
        margin-bottom: 8px;
        display: block;
        color: #333;
    }

    #preview-image {
        width: 100%;
        max-height: 250px;
        object-fit: cover;
        border-radius: 10px;
    }
</style>

<body>
    <div class="container">
        <div class="title">Tambah Ekstrakurikuler</div>

        <div class="form-container">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Ekstrakurikuler:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="gambar">Upload Gambar:</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*" onchange="previewImage(event)" required>
                </div>

                <div id="preview-container" style="display:none; margin-bottom:20px;">
                    <p style="margin-bottom:8px;">Preview Gambar:</p>
                    <img id="preview-image" src="#" alt="Preview" style="width: 100%; max-height: 250px; object-fit: cover; border-radius: 10px;">
                </div>

                <button type="submit" class="btn-tambah">Simpan Ekstrakurikuler</button>
            </form>
        </div>
    </div>


    <script>
        // Preview gambar sebelum upload
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-image');
                output.src = reader.result;
                document.getElementById('preview-container').style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

<?php
include('/bandarharjo/partials/footer.php');
?>
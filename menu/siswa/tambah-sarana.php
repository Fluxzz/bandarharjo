<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Proses tambah data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];

    // Periksa apakah data sudah ada
    $checkStmt = $conn->prepare("SELECT * FROM sarana WHERE keterangan = ?");
    $checkStmt->bind_param("s", $keterangan);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "Data dengan keterangan tersebut sudah ada.";
    } else {
        // Menyimpan data baru
        $stmt = $conn->prepare("INSERT INTO sarana (keterangan, jumlah) VALUES (?, ?)");
        $stmt->bind_param("si", $keterangan, $jumlah);

        if ($stmt->execute()) {
            header("Location: siswa.php?status=added"); // Redirect ke siswa.php dengan status 'added'
            exit;
        } else {
            echo "Gagal menambahkan data: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Sarana</title>
    <link rel="stylesheet" href="/css/siswa.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Sarana</h2>
        <form method="POST">
            <label>Keterangan:</label><br>
            <input type="text" name="keterangan" required><br><br>

            <label>Jumlah:</label><br>
            <input type="number" name="jumlah" required><br><br>

            <button type="submit">Simpan Data</button>
            <a href="siswa.php"><button type="button">Batal</button></a>
        </form>
    </div>
</body>
</html>

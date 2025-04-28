<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('/bandarharjo/partials/header.php');
  include_once('/bandarharjo/authentication/auth-check.php');
  include('/bandarharjo/koneksi.php');

// Cek apakah parameter keterangan tersedia
if (!isset($_GET['keterangan'])) {
    echo "Keterangan tidak ditemukan.";
    exit;
}

$keteranganLama = $_GET['keterangan'];
$keteranganLamaDecoded = urldecode($keteranganLama);

// Ambil data dari database untuk ditampilkan di form
$stmt = $conn->prepare("SELECT keterangan, jumlah FROM sarana WHERE keterangan = ?");
$stmt->bind_param("s", $keteranganLamaDecoded);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keteranganBaru = $_POST['keterangan'];
    $jumlahBaru = $_POST['jumlah'];

    $update = $conn->prepare("UPDATE sarana SET keterangan = ?, jumlah = ? WHERE keterangan = ?");
    $update->bind_param("sis", $keteranganBaru, $jumlahBaru, $keteranganLamaDecoded);

    if ($update->execute()) {
        header("Location: siswa.php?status=updated");
        exit;
    } else {
        echo "Gagal mengupdate data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Sarana</title>
    <link rel="stylesheet" href="/css/siswa.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Sarana</h2>
        <form method="POST">
            <label>Keterangan:</label><br>
            <input type="text" name="keterangan" value="<?= htmlspecialchars($data['keterangan']) ?>" required><br><br>

            <label>Jumlah:</label><br>
            <input type="number" name="jumlah" value="<?= htmlspecialchars($data['jumlah']) ?>" required><br><br>

            <button type="submit">Simpan Perubahan</button>
            <a href="siswa.php"><button type="button">Batal</button></a>
        </form>
    </div>
</body>
</html>

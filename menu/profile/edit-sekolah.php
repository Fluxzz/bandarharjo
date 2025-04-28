<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('/bandarharjo/partials/header.php');
  include_once('/bandarharjo/authentication/auth-check.php');
  include('/bandarharjo/koneksi.php');

// Ambil data pertama dari tabel
$sqlGet = "SELECT * FROM sekolahku LIMIT 1";
$result = $conn->query($sqlGet);
$data = $result->fetch_assoc();

// Jika tidak ada data, tampilkan pesan
if (!$data) {
    die("Data tidak ditemukan di database.");
}

// Proses update jika form disubmit
if (isset($_POST['update'])) {
    $sejarah = $_POST['sejarah'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $letak_geografis = $_POST['letak_geografis'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];

    // Query UPDATE tanpa WHERE karena diasumsikan hanya 1 baris
    $sqlUpdate = "UPDATE sekolahku SET 
        sejarah = ?, 
        alamat = ?, 
        telepon = ?, 
        email = ?, 
        letak = ?, 
        visi = ?, 
        misi = ? 
        LIMIT 1"; // Batas update hanya 1 baris untuk keamanan

    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("sssssss", $sejarah, $alamat, $telepon, $email, $letak, $visi, $misi);

    if ($stmt->execute()) {
        // Notifikasi sukses + redirect 3 detik
        echo "<div style='padding: 10px; background-color: #d4edda; 
                    color: #155724; border: 1px solid #c3e6cb; 
                    border-radius: 4px; margin-bottom: 15px;'>
                  ✅ Data berhasil diperbarui! Anda akan dialihkan kembali ke halaman profil
              </div>";
        echo "<meta http-equiv='refresh' content='1;url=profile.php'>";
    } else {
        // Notifikasi error
        echo "<div style='padding: 10px; background-color: #f8d7da; 
                    color: #721c24; border: 1px solid #f5c6cb; 
                    border-radius: 4px; margin-bottom: 15px;'>
                  ❌ Gagal memperbarui data: " . htmlspecialchars($stmt->error) . "
              </div>";
    }
}
?>
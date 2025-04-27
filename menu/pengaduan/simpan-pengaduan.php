<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('/bandarharjo/koneksi.php');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Memproses Pengaduan...</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $telp = trim($_POST['telp']);
    $deskripsi = trim($_POST['deskripsi']);
    $gambar = '';

    // Upload gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
        $nama_file = time() . '_' . basename($_FILES['gambar']['name']);
        $upload_path = $upload_dir . $nama_file;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $upload_path)) {
            $gambar = $nama_file;
        } else {
            echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Upload Gagal!',
                  text: 'Gagal mengupload gambar.',
                  showConfirmButton: true
                }).then(() => {
                  window.history.back();
                });
                </script>";
            exit;
        }
    }

    // Insert ke database
    $stmt = $conn->prepare("INSERT INTO pengaduan (nama, email, no_telp, deskripsi, gambar, created_at) VALUES (?, ?, ?, ?, ?, NOW())");

    if ($stmt) {
        $stmt->bind_param("sssss", $nama, $email, $telp, $deskripsi, $gambar);
        if ($stmt->execute()) {
            echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: 'Pengaduan berhasil dikirim!',
                  showConfirmButton: false,
                  timer: 2000
                }).then(() => {
                  window.location.href = 'pengaduan.php';
                });
                </script>";
        } else {
            echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Gagal mengirim pengaduan!',
                  text: 'Terjadi kesalahan saat menyimpan data.',
                  showConfirmButton: true
                }).then(() => {
                  window.history.back();
                });
                </script>";
        }
        $stmt->close();
    } else {
        echo "Gagal prepare statement: " . $conn->error;
    }
} else {
    echo "Invalid request method.";
}
?>

</body>
</html>

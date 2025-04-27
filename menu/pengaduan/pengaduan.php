<?php
session_start();
include('/bandarharjo/partials/header.php');
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pengaduan</title>
  <link rel="stylesheet" href="/css/pengaduan.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <div class="section-title">
        <span>Form Pengaduan</span>
      </div>

      <div class="grid-container">
        <form action="simpan-pengaduan.php" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required placeholder="Masukkan Nama">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Masukkan Email">
          </div>

          <div class="form-group">
            <label for="telp">No. Telp</label>
            <input type="tel" id="telp" name="telp" required placeholder="Masukkan No. Telp">
          </div>

          <div class="form-group">
            <label for="deskripsi">Deskripsi Pengaduan</label>
            <textarea id="deskripsi" name="deskripsi" required placeholder="Tulis Deskripsi..."></textarea>
          </div>

          <div class="form-group">
            <label for="gambar">Upload Gambar</label>
            <div class="custom-file">
              <input type="file" id="gambar" name="gambar" style="display: none;">
              <label for="gambar" class="file-label" id="file-label">Pilih Gambar</label>
            </div>
          </div>

          <div class="submit-btn">
            <button type="submit">Kirim</button>
            <?php if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin'): ?>
              <a href="daftar-pengaduan.php" class="btn-daftar">Daftar Pengaduan</a>
            <?php endif; ?>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script>
    // Supaya label file berubah saat file dipilih
    const fileInput = document.getElementById('gambar');
    const fileLabel = document.getElementById('file-label');

    fileInput.addEventListener('change', function() {
      if (this.files && this.files.length > 0) {
        fileLabel.textContent = this.files[0].name;
      } else {
        fileLabel.textContent = 'Pilih Gambar';
      }
    });
  </script>

</body>

</html>

<?php
include('/bandarharjo/partials/footer.php');
?>

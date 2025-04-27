<?php
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Ambil data dari tabel beranda
$query = "SELECT * FROM beranda";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  $data = $result->fetch_assoc();
} else {
  echo "Data tidak ditemukan.";
  exit;
}
?>
<link rel="stylesheet" href="/css/index.css">

<body>
  <div class="container">

    <div class="card">
      <h2 class="title">Sambutan Kepala Sekolah</h2>
      <div class="underline"></div>
      <button id="edit-btn">Edit</button>

      <div class="content">
        <div class="circle">
        <img src="<?php echo $data['foto']; ?>" alt="Foto Kepala Sekolah">

        </div>
        <div class="sambutan">
          <p><?php echo nl2br($data['isi']); ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Popup Form Edit -->
  <div class="popup-container" id="popupForm">
    <form action="edit.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="photo">Upload Foto</label>
        <input type="file" id="photo" name="photo" accept="image/*">
      </div>
      <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" placeholder="Tulis deskripsi di sini..."><?php echo htmlspecialchars($data['isi']); ?></textarea>
      </div>
      <div class="form-group">
        <button type="submit">Kirim</button>
        <button type="button" id="close-popup">Kembali</button>
      </div>
    </form>
  </div>
</body>

<script src="/js/edit.js"></script>
<?php
include('/bandarharjo/partials/footer.php');
?>

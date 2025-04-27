<?php
session_start();
include('partials/header.php');
include('koneksi.php');

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, pengunjung tidak dapat melihat tombol edit
    $show_edit_button = false;
} else {
    // Jika sudah login, cek role untuk menentukan apakah tombol edit perlu ditampilkan
    $show_edit_button = ($_SESSION['role'] == 'admin');
}

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

<link rel="stylesheet" href="css/index.css">

<body>
  <div class="container">
    <div class="card">
      <h2 class="title">Sambutan Kepala Sekolah</h2>
      <div class="underline"></div>
      
      <!-- Tombol Edit hanya muncul jika role adalah admin -->
      <?php if ($show_edit_button): ?>
        <button id="edit-btn">Edit</button>
      <?php endif; ?>

      <div class="content">
        <div class="circle">
          <img src="/bandarharjo/upload/<?php echo htmlspecialchars($data['foto']); ?>" alt="Foto Kepala Sekolah" width="200">
        </div>
        <div class="sambutan">
          <p><?php echo nl2br(htmlspecialchars($data['isi'])); ?></p>
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

  <!-- Notifikasi -->
  <script>
    <?php if (isset($_SESSION['notification'])): ?>
        const notification = document.createElement('div');
        notification.classList.add('notification');
        notification.innerText = '<?php echo $_SESSION['notification']; ?>';
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.display = 'none';
        }, 5000);

        <?php unset($_SESSION['notification']); ?>
    <?php endif; ?>
  </script>

</body>

<script src="js/edit.js"></script>

<?php
include('partials/footer.php');
?>

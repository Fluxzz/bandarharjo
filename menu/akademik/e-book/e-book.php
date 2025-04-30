<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Query untuk mengambil semua data ebook
$query = "SELECT * FROM ebook";
$result = $conn->query($query);
?>
<link rel="stylesheet" href="/css/e-book.css">

<body>
  <div class="container">
    <div class="title">E-book</div>

    <!-- Tombol Tambah E-book -->
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
      <div style="margin-bottom: 20px;">
        <a href="tambah-ebook.php" class="btn-tambah">+ Tambah E-book</a>
      </div>
    <?php } ?>

    <div class="card-container">
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $fileUrl = "/menu/akademik/e-book/upload/" . htmlspecialchars($row['file']);
      ?>
          <div class="card" onclick="window.open('<?php echo $fileUrl; ?>', '_blank')">
            <div class="image-placeholder">
              <?php
              if (!empty($row['file'])) {
                $fileExt = strtolower(pathinfo($row['file'], PATHINFO_EXTENSION));
                $isImage = in_array($fileExt, ['jpg', 'jpeg', 'png', 'gif']);

                if ($isImage) {
              ?>
                  <img src="/menu/akademik/e-book/upload/<?php echo htmlspecialchars($row['file']); ?>"
                    alt="<?php echo htmlspecialchars($row['judul']); ?>"
                    style="width:100%; height:100%; object-fit:cover; border-radius:10px;">
              <?php
                } else {
                  $icon = '/assets/icon/file-icon.png';
                  if (in_array($fileExt, ['pdf'])) {
                    $icon = '/assets/icon/pdf-icon.png';
                  } elseif (in_array($fileExt, ['doc', 'docx'])) {
                    $icon = '/assets/icon/word-icon.png';
                  } elseif (in_array($fileExt, ['ppt', 'pptx'])) {
                    $icon = '/assets/icon/ppt-icon.png';
                  } elseif (in_array($fileExt, ['xls', 'xlsx'])) {
                    $icon = '/assets/icon/excel-icon.png';
                  }
              ?>
                  <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; background:#f0f0f0; border-radius:10px;">
                    <img src="<?php echo $icon; ?>" alt="Dokumen" style="width:80px; height:80px;">
                  </div>
              <?php
                }
              }
              ?>
            </div>
            <div class="content">
              <div class="book-title"><?php echo htmlspecialchars($row['judul']); ?></div>
              <div class="label">KETERANGAN :</div>
              <p class="desc"><?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?></p>

              <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                <!-- Tombol Hapus, hanya untuk admin -->
                <form action="hapus-ebook.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus e-book ini?');" style="margin-top: 10px;">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  <button type="submit" class="btn-hapus" onclick="event.stopPropagation();">Hapus</button>
                </form>
              <?php } ?>

            </div>
          </div>
      <?php
        }
      } else {
        echo "<p>Tidak ada e-book yang tersedia.</p>";
      }
      ?>
    </div>

  </div>
</body>

<script src="/js/shortcut.js"></script>

<?php include('/bandarharjo/partials/footer.php'); ?>

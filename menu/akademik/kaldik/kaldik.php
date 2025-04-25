<?php
include '/bandarharjo/partials/header.php';
include '/bandarharjo/koneksi.php';


// Ambil data kaldik
$sql = "SELECT * FROM kaldik ";
$result = $conn->query($sql);
?>



<link rel="stylesheet" href="/menu/akademik/kaldik/css/kaldik.css">
<body>
    
<!-- Content -->
<div class="container">
    <div class="navbar-item">
        <div class="navigation">
            <div class="title">
                <h1>KALENDER PENDIDIKAN</h1>
            </div>
            <div class="nav-underline"></div>
            <div class="selection">
                <div class="option active" onclick="switchTab(this, 'semarang')">
                    <p>KALDIK KOTA SEMARANG</p>
                </div>
                <div class="option" onclick="switchTab(this, 'lokal')">
                    <p>KALDIK SDN BANDARHARJO 02</p>
                </div>
            </div>
        </div>

        <button id="btnTambahKaldik" class="btn-tambah-kaldik">+ Tambah Kaldik</button>
<div class="semarang-container" id="semarang-container">
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="card">
                <a href="<?= htmlspecialchars($row['file_kaldik']) ?>" target="_blank">
                    <img src="/assets/calendar.jpg" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">KALDIK Semarang <?= htmlspecialchars($row['tahun_ajaran']) ?></span>
                    </div>
                </a>
                <!-- Tombol Hapus -->
                <!-- Tombol Hapus -->
                <form action="hapus_kaldik.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>"> <!-- Pastikan id ini benar -->
                    <input type="hidden" name="file_path" value="<?= htmlspecialchars($row['file_kaldik']) ?>"> <!-- Pastikan file path ini benar -->
                    <button type="submit" class="btn-hapus">🗑 Hapus</button>
                </form>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Tidak ada data KALDIK tersedia.</p>
    <?php endif; ?>
</div>



        <!-- Kaldik Lokal (opsional) -->
        <div class="lokal-container" id="lokal-container" style="display: none;">
            <p>Kaldik lokal belum tersedia.</p>
        </div>
    </div>
</div>


<!-- Popup Form -->
<div id="popupFormKaldik" class="popup-form-kaldik">
  <div class="form-container-kaldik">
    <span class="close-btn-kaldik" onclick="tutupFormKaldik()">&times;</span>
    <h2>Form Tambah Kalender Akademik</h2>
    <form action="tambah_kaldik.php" method="POST" enctype="multipart/form-data">
        <label for="tahun_ajaran">Tahun Ajaran:</label><br>
        <input type="text" id="tahun_ajaran" name="tahun_ajaran" placeholder="contoh: 2024/2025" required><br><br>

        <label for="file_kaldik">Upload File Kalender (PDF/Gambar):</label><br>
        <input type="file" id="file_kaldik" name="file_kaldik" accept=".pdf,image/*" required><br><br>

        <input type="submit" value="Simpan">
    </form>
  </div>
</div>

</body>

<!-- Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
      const dropdownToggle = document.querySelector(".dropdown-toggle");
      const dropdownMenu = document.querySelector(".dropdown-menu");

      dropdownToggle.addEventListener("click", function (e) {
        e.preventDefault();
        dropdownMenu.style.display =
          dropdownMenu.style.display === "block" ? "none" : "block";
      });

      document.addEventListener("click", function (e) {
        if (!e.target.closest(".dropdown")) {
          dropdownMenu.style.display = "none";
        }
      });
    });
  </script>
<script src="/js/nav.js"></script>
<script src="/menu/akademik/kaldik/js/tambah.js"></script>
</html>
<?php $conn->close(); ?>
<?php
include('/bandarharjo/partials/footer.php');
?>
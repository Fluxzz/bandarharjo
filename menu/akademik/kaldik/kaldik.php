<?php
include('../../../koneksi.php');

// Menentukan kategori berdasarkan tab yang dipilih
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'semarang'; // Default kategori semarang

// Ambil data kaldik berdasarkan kategori yang dipilih
$sql = "SELECT * FROM kaldik WHERE kategori = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $kategori); // Mengikat parameter kategori
$stmt->execute();
$result = $stmt->get_result();
?>

<link rel="stylesheet" href="css/kaldik.css">
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
                <!-- Tab KALDIK Kota Semarang -->
                <div class="option <?= $kategori === 'semarang' ? 'active' : '' ?>" onclick="switchTab(this, 'semarang')">
                    <p>KALDIK KOTA SEMARANG</p>
                </div>
                
                <!-- Tab KALDIK SDN Bandarharjo -->
                <div class="option <?= $kategori === 'sd' ? 'active' : '' ?>" onclick="switchTab(this, 'lokal')">
                    <p>KALDIK SDN BANDARHARJO 02</p>
                </div>
            </div>
        </div>

        <button id="btnTambahKaldik" class="btn-tambah-kaldik">+ Tambah Kaldik</button>

        <!-- Kategori Semarang -->
        <div class="semarang-container" id="semarang-container" style="<?= $kategori === 'semarang' ? 'display:block' : 'display:none' ?>">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="card">
                        <a href="file_kaldik/<?= htmlspecialchars($row['file_kaldik']) ?>" target="_blank">
                            <img src="assets/Kalender.jpg" alt="Kalender">
                            <div class="card-text">
                                <span class="badge">KALDIK Semarang <?= htmlspecialchars($row['tahun_ajaran']) ?></span>
                            </div>
                        </a>
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

        <!-- Kategori SDN Bandarharjo -->
        <div class="lokal-container" id="lokal-container" style="<?= $kategori === 'sd' ? 'display:block' : 'display:none' ?>">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="card">
                        <a href="file_kaldik/<?= htmlspecialchars($row['file_kaldik']) ?>" target="_blank">
                            <img src="assets/Kalender.jpg" alt="Kalender">
                            <div class="card-text">
                                <span class="badge">KALDIK SDN Bandarharjo <?= htmlspecialchars($row['tahun_ajaran']) ?></span>
                            </div>
                        </a>
                        <!-- Tombol Hapus -->
                        <form action="hapus_kaldik.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>"> <!-- Pastikan id ini benar -->
                            <input type="hidden" name="file_path" value="<?= htmlspecialchars($row['file_kaldik']) ?>"> <!-- Pastikan file path ini benar -->
                            <button type="submit" class="btn-hapus">🗑 Hapus</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Tidak ada data KALDIK SDN Bandarharjo tersedia.</p>
            <?php endif; ?>
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

        <!-- Pilihan Kategori -->
        <label for="kategori">Kategori:</label><br>
        <select id="kategori" name="kategori" required>
            <option value="semarang">KALDIK KOTA SEMARANG</option>
            <option value="sd">KALDIK SDN BANDARHARJO 02</option>
        </select><br><br>

        <label for="file_kaldik">Upload File Kalender (PDF/Gambar):</label><br>
        <input type="file" id="file_kaldik" name="file_kaldik" accept=".pdf,image/*" required><br><br>

        <input type="submit" value="Simpan">
    </form>
  </div>
</div>

</body>

<script>
    function switchTab(element, tab) {
    var semarangContainer = document.getElementById('semarang-container');
    var lokalContainer = document.getElementById('lokal-container');
    
    // Set active tab
    var tabs = document.querySelectorAll('.option');
    tabs.forEach(function(tabElement) {
        tabElement.classList.remove('active');
    });
    element.classList.add('active');

    // Show selected category
    if (tab === 'semarang') {
        semarangContainer.style.display = 'block';
        lokalContainer.style.display = 'none';
        window.history.pushState(null, null, "?kategori=semarang"); // Update URL with semarang category
    } else {
        semarangContainer.style.display = 'none';
        lokalContainer.style.display = 'block';
        window.history.pushState(null, null, "?kategori=sd"); // Update URL with sd category
    }
}
</script>

<script src="js/nav.js"></script>
<script src="js/tambah.js"></script>

<?php $conn->close(); ?>
<?php
include('../../../partials/footer.php');
?>

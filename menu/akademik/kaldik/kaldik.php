<?php
session_start();
include('../../../partials/header.php');
include('../../../koneksi.php');

$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'semarang';

$sql = "SELECT * FROM kaldik WHERE kategori = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $kategori);
$stmt->execute();
$result = $stmt->get_result();
?>

<link rel="stylesheet" href="css/kaldik.css">
<style> /* CSS responsive-mu tetap aku pakai tanpa ubah */ 
    .card-container { display: flex; flex-wrap: wrap; justify-content: space-between; }
    .card { flex: 1 1 calc(25% - 10px); margin: 25px; box-sizing: border-box; }
    @media (max-width: 992px) { .card { flex: 1 1 calc(33.33% - 10px); } }
    @media (max-width: 768px) { .card { flex: 1 1 calc(50% - 10px); } }
    @media (max-width: 576px) { .card { flex: 1 1 100%; } }
</style>

<body>

<div class="container">
    <div class="navbar-item">
        <div class="navigation">
            <div class="title">
                <h1>KALENDER PENDIDIKAN</h1>
            </div>
            <div class="nav-underline"></div>
            <div class="selection">
                <div class="option <?= $kategori === 'semarang' ? 'active' : '' ?>" data-target="semarang" onclick="switchTab(this, 'semarang')">
                    <p>KALDIK KOTA SEMARANG</p>
                </div>
                <div class="option <?= $kategori === 'sd' ? 'active' : '' ?>" data-target="lokal" onclick="switchTab(this, 'lokal')">
                    <p>KALDIK SDN BANDARHARJO 02</p>
                </div>
            </div>
        </div>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <button id="btnTambahKaldik" class="btn-tambah-kaldik">+ Tambah Kaldik</button>
        <?php endif; ?>

        <!-- Kategori Semarang -->
        <div class="semarang-container" id="semarang-container" style="<?= $kategori === 'semarang' ? 'display:block' : 'display:none' ?>">
            <div class="card-container">
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="card">
                            <a href="file_kaldik/<?= htmlspecialchars($row['file_kaldik']) ?>" target="_blank">
                                <img src="assets/Kalender.jpg" alt="Kalender">
                                <div class="card-text">
                                    <span class="badge">KALDIK KOTA SEMARANG <?= htmlspecialchars($row['tahun_ajaran']) ?></span>
                                </div>
                            </a>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                                <form action="hapus_kaldik.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                                    <input type="hidden" name="file_path" value="<?= htmlspecialchars($row['file_kaldik']) ?>">
                                    <button type="submit" class="btn-hapus">🗑 Hapus</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Tidak ada data KALDIK Kota Semarang tersedia.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Kategori SDN Bandarharjo -->
        <div class="lokal-container" id="lokal-container" style="<?= $kategori === 'sd' ? 'display:block' : 'display:none' ?>">
            <div class="card-container">
                <?php
                $sql_sd = "SELECT * FROM kaldik WHERE kategori = 'sd'";
                $result_sd = $conn->query($sql_sd);

                if ($result_sd->num_rows > 0): 
                    while($row = $result_sd->fetch_assoc()): 
                ?>
                        <div class="card">
                            <a href="file_kaldik/<?= htmlspecialchars($row['file_kaldik']) ?>" target="_blank">
                                <img src="assets/Kalender.jpg" alt="Kalender">
                                <div class="card-text">
                                    <span class="badge">KALDIK SDN Bandarharjo <?= htmlspecialchars($row['tahun_ajaran']) ?></span>
                                </div>
                            </a>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                                <form action="hapus_kaldik.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                                    <input type="hidden" name="file_path" value="<?= htmlspecialchars($row['file_kaldik']) ?>">
                                    <button type="submit" class="btn-hapus">🗑 Hapus</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Tidak ada data KALDIK SDN Bandarharjo tersedia.</p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<!-- Popup Form Tambah -->
<div id="popupFormKaldik" class="popup-form-kaldik">
  <div class="form-container-kaldik">
    <span class="close-btn-kaldik" onclick="tutupFormKaldik()">&times;</span>
    <h2>Form Tambah Kalender Akademik</h2>
    <form action="tambah_kaldik.php" method="POST" enctype="multipart/form-data">
        <label for="tahun_ajaran">Tahun Ajaran:</label><br>
        <input type="text" id="tahun_ajaran" name="tahun_ajaran" placeholder="contoh: 2024/2025" required><br><br>

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

<script src="/js/tambah.js"></script>

<script>
function switchTab(element, target) {
    document.querySelectorAll('.option').forEach(option => {
        option.classList.remove('active');
    });
    element.classList.add('active');

    document.getElementById('semarang-container').style.display = target === 'semarang' ? 'block' : 'none';
    document.getElementById('lokal-container').style.display = target === 'lokal' ? 'block' : 'none';
    window.history.pushState(null, null, "?kategori=" + (target === 'semarang' ? 'semarang' : 'sd'));
}

document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const kategori = urlParams.get('kategori') || 'semarang';
    if (kategori === 'semarang') {
        document.querySelector('.option[data-target="semarang"]').classList.add('active');
    } else {
        document.querySelector('.option[data-target="lokal"]').classList.add('active');
    }
});

// INI YANG KITA TAMBAHKAN
document.addEventListener("DOMContentLoaded", function() {
    const tambahKaldikBtn = document.getElementById('btnTambahKaldik');
    const popupFormKaldik = document.getElementById('popupFormKaldik');

    if (tambahKaldikBtn && popupFormKaldik) {
        tambahKaldikBtn.addEventListener('click', function() {
            popupFormKaldik.style.display = 'flex'; // Bisa juga 'block' kalau flex nggak cocok
        });
    }
});

function tutupFormKaldik() {
    document.getElementById('popupFormKaldik').style.display = 'none';
}
</script>

<?php $conn->close(); ?>
<?php include('../../../partials/footer.php'); ?>

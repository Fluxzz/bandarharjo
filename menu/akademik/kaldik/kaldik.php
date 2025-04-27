<?php
include('../../../partials/header.php');
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
<style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /* Menyebar elemen secara merata */
    }

    .card {
        flex: 1 1 calc(25% - 10px); /* Menentukan lebar 4 elemen per baris */
        margin: 25px; /* Memberikan jarak antar elemen */
        box-sizing: border-box; /* Agar padding dan margin tidak mengganggu lebar */
    }

    @media (max-width: 992px) {
        .card {
            flex: 1 1 calc(33.33% - 10px); /* 3 elemen per baris di layar sedang */
        }
    }

    @media (max-width: 768px) {
        .card {
            flex: 1 1 calc(50% - 10px); /* 2 elemen per baris di layar kecil */
        }
    }

    @media (max-width: 576px) {
        .card {
            flex: 1 1 100%; /* 1 elemen per baris di layar sangat kecil */
        }
    }
</style>

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
                <div class="option <?= $kategori === 'semarang' ? 'active' : '' ?>" data-target="semarang" onclick="switchTab(this, 'semarang')">
                    <p>KALDIK KOTA SEMARANG</p>
                </div>
                
                <!-- Tab KALDIK SDN Bandarharjo -->
                <div class="option <?= $kategori === 'sd' ? 'active' : '' ?>" data-target="lokal" onclick="switchTab(this, 'lokal')">
                    <p>KALDIK SDN BANDARHARJO 02</p>
                </div>
            </div>
        </div>

        <button id="btnTambahKaldik" class="btn-tambah-kaldik">+ Tambah Kaldik</button>

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
                            <!-- Tombol Hapus -->
                            <form action="hapus_kaldik.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>"> <!-- Pastikan id ini benar -->
                                <input type="hidden" name="file_path" value="<?= htmlspecialchars($row['file_kaldik']) ?>"> <!-- Pastikan file path ini benar -->
                                <button type="submit" class="btn-hapus">🗑 Hapus</button>
                            </form>
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
                // Query untuk mendapatkan data hanya kategori SD
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
    function switchTab(element, target) {
        // Ubah status aktif pada tombol
        document.querySelectorAll('.option').forEach(option => {
            option.classList.remove('active');
        });
        element.classList.add('active');

        // Ambil elemen kontainer untuk semarang dan lokal
        var semarangContainer = document.getElementById('semarang-container');
        var lokalContainer = document.getElementById('lokal-container');
        
        // Tampilkan kontainer yang sesuai
        if (target === 'semarang') {
            semarangContainer.style.display = 'block'; // Atau 'flex' jika lebih sesuai dengan CSS Anda
            lokalContainer.style.display = 'none';
            window.history.pushState(null, null, "?kategori=semarang"); // Update URL dengan kategori semarang
        } else if (target === 'lokal') {
            semarangContainer.style.display = 'none';
            lokalContainer.style.display = 'block'; // Atau 'flex' jika lebih sesuai dengan CSS Anda
            window.history.pushState(null, null, "?kategori=sd"); // Update URL dengan kategori sd
        }
    }

    // Untuk memeriksa kategori saat halaman dimuat
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const kategori = urlParams.get('kategori') || 'semarang'; // Default ke 'semarang'

        // Sesuaikan tab dan kontainer sesuai kategori
        if (kategori === 'semarang') {
            document.querySelector('.option[data-target="semarang"]').classList.add('active');
            document.getElementById('semarang-container').style.display = 'block';
            document.getElementById('lokal-container').style.display = 'none';
        } else if (kategori === 'sd') {
            document.querySelector('.option[data-target="lokal"]').classList.add('active');
            document.getElementById('semarang-container').style.display = 'none';
            document.getElementById('lokal-container').style.display = 'block';
        }
    });
</script>

<script src="/js/tambah.js"></script>

<?php $conn->close(); ?>
<?php
include('../../../partials/footer.php');
?>

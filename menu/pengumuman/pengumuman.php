<?php
// Menghubungkan ke database
include('../../partials/header.php');
include('../../koneksi.php');

// Ambil kategori dari URL atau set default
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'MPLS';

// Query untuk mengambil data pengumuman berdasarkan kategori
$sql = "SELECT * FROM pengumuman WHERE kategori = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $kategori);
$stmt->execute();
$result = $stmt->get_result();

// Query data MPLS
$kategoriMPLS = 'MPLS';
$sqlMPLS = "SELECT * FROM pengumuman WHERE kategori = ? ORDER BY created_at DESC";
$stmtMPLS = $conn->prepare($sqlMPLS);
$stmtMPLS->bind_param("s", $kategoriMPLS);
$stmtMPLS->execute();
$mplsResult = $stmtMPLS->get_result();

// Query data PPDB
$kategoriPPDB = 'PPDB';
$sqlPPDB = "SELECT * FROM pengumuman WHERE kategori = ? ORDER BY created_at DESC";
$stmtPPDB = $conn->prepare($sqlPPDB);
$stmtPPDB->bind_param("s", $kategoriPPDB);
$stmtPPDB->execute();
$ppdbResult = $stmtPPDB->get_result();

// Query data Berita
$kategoriBerita = 'Berita';
$sqlBerita = "SELECT * FROM pengumuman WHERE kategori = ? ORDER BY created_at DESC";
$stmtBerita = $conn->prepare($sqlBerita);
$stmtBerita->bind_param("s", $kategoriBerita);
$stmtBerita->execute();
$beritaResult = $stmtBerita->get_result();

?>

<link rel="stylesheet" href="../../css/pengumuman.css">

<body>
  <div class="container">
    <div class="container">
      <div class="navbar-item">
        <div class="navigation">
          <div class="title">
            <h1>PENGUMUMAN</h1>
          </div>
          <div class="nav-underline"></div>
          <div class="selection">
            <div class="option" onclick="switchTab(this, 'ppdb-container')">
              <p>PPDB 2023/2024</p>
            </div>
            <div class="option active" onclick="switchTab(this, 'mpls-container')">
              <p>PENGUMUMAN MPLS</p>
            </div>
            <div class="option" onclick="switchTab(this, 'berita-container')">
              <p>BERITA SD</p>
            </div>
          </div>
        </div>
      </div>

      <div class="add-announcement">
        <button class="btn" onclick="window.location.href='tambah-pengumuman.php'">Tambah Pengumuman</button>
      </div>

      <div class="mpls-container" id="mpls-container">
        <?php while ($pengumuman = $result->fetch_assoc()) { ?>
          <div class="mpls-card">
            <img src="../../upload/<?php echo $pengumuman['foto']; ?>" alt="Pengumuman Image">
            <div class="mpls-card-content">
              <h3><?php echo $pengumuman['judul']; ?></h3>
              <div class="underline"></div>
              <a href="detail-pengumuman.php?id=<?php echo $pengumuman['id']; ?>">
                <button class="btn">Baca Selengkapnya >></button>
              </a>
              <button class='delete-btn' onclick="showDeletePopup('<?php echo $pengumuman['id']; ?>')">Hapus</button>

            </div>
          </div>

        <?php } ?>
      </div>

      <div class="ppdb-container" id="ppdb-container" style="display: none;">
        <?php while ($pengumuman = $ppdbResult->fetch_assoc()) { ?>
          <div class="card">
            <img src="../../upload/<?php echo $pengumuman['foto']; ?>" alt="PPDB Image">
            <div class="card-text">
              <h3><?php echo $pengumuman['judul']; ?></h3>
              <div class="underline"></div>
              <a href="detail-pengumuman.php?id=<?php echo $pengumuman['id']; ?>">
                <button class="btn">Baca Selengkapnya >></button>
              </a>
              <button class='delete-btn' onclick="showDeletePopup('<?php echo $pengumuman['id']; ?>')">Hapus</button>

            </div>
          </div>
        <?php } ?>
      </div>


      <div class="berita-container" id="berita-container" style="display: none;">
        <?php if ($beritaResult->num_rows > 0): ?>
          <?php while ($pengumuman = $beritaResult->fetch_assoc()): ?>
            <div class="berita-card">
              <img src="../../upload/<?php echo $pengumuman['foto']; ?>" alt="Berita Image">
              <div class="berita-content">
                <h3><?php echo $pengumuman['judul']; ?></h3>
                <div class="underline"></div>
                <a href="detail-pengumuman.php?id=<?php echo $pengumuman['id']; ?>" class="btn">Baca Selengkapnya >></a>
                <button class='delete-btn' onclick="showDeletePopup('<?php echo $pengumuman['id']; ?>')">Hapus</button>


              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p>Tidak ada berita ditemukan.</p>
        <?php endif; ?>
      </div>

      <div class="delete-user" id="delete-user">
        <!-- Popup -->
        <div class="delete-popup">
          <p>Yakin Untuk Menghapus Data Ini?</p>
          <button class="cancel" onclick="closePopup()">TIDAK</button>
          <button class="confirm" onclick="deleteData()">IYA</button>
        </div>
      </div>

    </div>
  </div>
</body>

<script src="../../js/pengumuman.js"></script>

<?php
include('../../partials/footer.php');
?>
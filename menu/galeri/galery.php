<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

$query = "SELECT * FROM galery ORDER BY id DESC";
$result = $conn->query($query);

$galeri = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $galeri[] = $row;
  }
}

function convertYoutubeToEmbed($url) {
  preg_match("/(?:v=|\/embed\/|youtu.be\/)([^&\n?#]+)/", $url, $matches);
  return isset($matches[1]) ? "https://www.youtube.com/embed/" . $matches[1] : '';
}
?>

<link rel="stylesheet" href="../../css/prestasi.css">

<body>
  <div class="container">
    <!-- Judul & Navigasi -->
    <div class="navbar-item">
      <div class="navigation">
        <div class="title">
          <h1>GALERI</h1>
        </div>
        <div class="nav-underline"></div>
        <div class="selection">
          <div class="option active" onclick="switchTab(this, 'vidio-container')">
            <p>GALERI VIDEO</p>
          </div>
          <div class="option" onclick="switchTab(this, 'foto-container')">
            <p>GALERI FOTO</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Tombol Tambah (hanya admin) -->
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
      <div class="tambah-button-container">
        <a href="../../menu/galeri/tambah-galery.php">
          <button class="btn-tambah">Tambah Galeri</button>
        </a>
      </div>
    <?php endif; ?>

    <!-- Galeri Video -->
    <div class="vidio-container" id="vidio-container">
      <div class="sang-juara">
        <?php foreach ($galeri as $item): ?>
          <?php if ($item['kategori'] == 'video'): ?>
            <div class="card">
              <iframe width="100%" height="200px" src="<?= convertYoutubeToEmbed($item['url_video']) ?>" frameborder="0" allowfullscreen></iframe>
              <h3><?= htmlspecialchars($item['judul']) ?></h3>
              <div class="underline"></div>
              <div class="card-text"><?= htmlspecialchars(substr($item['isi'], 0, 80)) ?>...</div>

              <div class="card-actions">
                <a href="detail-galery.php?id=<?= $item['id'] ?>" class="btn-edit">Detail</a>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                  <a href="hapus-galery.php?id=<?= $item['id'] ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus video ini?')">Hapus</a>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Galeri Foto -->
    <div class="foto-container" id="foto-container" style="display: none;">
      <div class="prestasi-siswa">
        <?php foreach ($galeri as $item): ?>
          <?php if ($item['kategori'] == 'foto'): ?>
            <div class="card">
              <img src="../../upload/<?= htmlspecialchars($item['foto']) ?>" alt="<?= htmlspecialchars($item['judul']) ?>">
              <h3><?= htmlspecialchars($item['judul']) ?></h3>
              <div class="underline"></div>
              <div class="card-text"><?= htmlspecialchars(substr($item['isi'], 0, 80)) ?>...</div>

              <div class="card-actions">
                <a href="detail-galery.php?id=<?= $item['id'] ?>" class="btn-edit">Detail</a>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                  <a href="hapus-galery.php?id=<?= $item['id'] ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus foto ini?')">Hapus</a>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

<script>
function switchTab(element, target) {
  const options = document.querySelectorAll('.option');
  options.forEach(opt => opt.classList.remove('active'));
  element.classList.add('active');

  const containers = document.querySelectorAll('.vidio-container, .foto-container');
  containers.forEach(c => c.style.display = 'none');
  document.getElementById(target).style.display = 'block';
}

document.addEventListener("DOMContentLoaded", function () {
  const activeTab = document.querySelector('.option.active');
  const targetContainer = activeTab.getAttribute('onclick').match(/'([^']+)'/)[1];
  switchTab(activeTab, targetContainer);
});
</script>

</body>

<script src="/js/shortcut.js"></script>

<?php include('../../partials/footer.php'); ?>

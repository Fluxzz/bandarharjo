<?php
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Query untuk mengambil sambutan kepala sekolah
$query = "SELECT * FROM tautan";
$result = $conn->query($query);

// Cek apakah ada data
if ($result->num_rows > 0) {
  $data = $result->fetch_assoc();
} else {
  echo "Data sambutan tidak ditemukan.";
  exit;
}

?>

<link rel="stylesheet" href="/css/tautan.css">

<body>
  <div class="container">
  <div class="wrapper">
    <div class="section-title">
        <span>TAUTAN</span>
    </div>
    <div style="text-align: left; margin-bottom: 20px;">
        <a href="tambah-tautan.php" class="btn-tambah">+ Tambah Tautan</a>
    </div>

    <div class="grid-container">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card">
                <div class="card-text">
                    <h4><?php echo htmlspecialchars($row['nama']); ?></h4>
                    <p><a href="<?php echo htmlspecialchars($row['link']); ?>" target="_blank">Kunjungi Tautan</a></p>

                    <!-- Tombol Edit dan Hapus dengan Ikon -->
                    <div class="card-actions">
                        <a href="edit-tautan.php?id=<?php echo $row['id']; ?>" class="btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="hapus-tautan.php?id=<?php echo $row['id']; ?>" class="btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus tautan ini?');">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                </div>

                <div class="card-logo">
                    <!-- Menampilkan foto jika ada -->
                    <?php if ($row['foto']): ?>
                        <img src="<?php echo htmlspecialchars($row['foto']); ?>" alt="Logo <?php echo htmlspecialchars($row['nama']); ?>">
                    <?php else: ?>
                        <img src="/assets/default-logo.png" alt="Logo default">
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

</body>




<?php
include('/bandarharjo/partials/footer.php');
?>
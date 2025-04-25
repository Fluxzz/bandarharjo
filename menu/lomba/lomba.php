<?php
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Query untuk mengambil data lomba
$query = "SELECT * FROM lomba";
$result = $conn->query($query);

// Cek apakah ada data
if ($result->num_rows > 0) {
    // Data ada, lakukan perulangan untuk menampilkan lomba
} else {
    echo "Data lomba tidak ditemukan.";
    exit;
}
?>

<link rel="stylesheet" href="/css/lomba.css">

<body>
    <div class="container">
        <div class="title">LOMBA</div>

        <!-- Tombol Tambah Lomba -->
        <div style="text-align: left; margin-bottom: 20px;">
            <a href="tambah-lomba.php" class="btn-tambah">+ Tambah Lomba</a>
        </div>

        <div class="card-container">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <!-- Menampilkan gambar lomba -->
                    <img src="<?php echo htmlspecialchars($row['foto']); ?>" alt="<?php echo htmlspecialchars($row['nama']); ?>">

                    <div class="card-text">
                        <span class="badge">Lomba</span>
                        <!-- Menampilkan nama lomba -->
                        <div class="class-name"><?php echo htmlspecialchars($row['nama']); ?></div>

                    <!-- Tombol Edit dan Hapus dengan Ikon -->
                    <div class="card-actions">
                        <a href="edit-lomba.php?id=<?php echo $row['id']; ?>" class="btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="hapus-lomba.php?id=<?php echo $row['id']; ?>" class="btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus tautan ini?');">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

<?php
include('/bandarharjo/partials/footer.php');
?>

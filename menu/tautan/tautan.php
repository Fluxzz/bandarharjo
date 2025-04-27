<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Cek apakah user sudah login dan periksa role admin
$show_edit_button = false;
if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
    $show_edit_button = true;
}

// Query untuk mengambil data tautan dari database
$query = "SELECT * FROM tautan";
$result = $conn->query($query);
?>

<link rel="stylesheet" href="/css/tautan.css">

<body>
    <?php
    // Notifikasi jika berhasil menghapus
    if (isset($_GET['status']) && $_GET['status'] === 'success') {
        echo "<script>alert('Tautan berhasil dihapus!');</script>";
    }
    ?>

    <?php
    if (isset($_GET['status']) && $_GET['status'] === 'added') {
        echo "<script>alert('Tautan berhasil ditambahkan!');</script>";
    }
    ?>

    <div class="wrapper">
        <div class="section-title">
            <span>TAUTAN</span>
        </div>

        <div style="text-align: left; margin-bottom: 20px;">
            <!-- Tombol "Tambah Tautan" hanya muncul jika role adalah admin -->
            <?php if ($show_edit_button): ?>
                <a href="tambah-tautan.php" class="btn-tambah">+ Tambah Tautan</a>
            <?php endif; ?>
        </div>

        <div class="grid-container">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <div class="card-text">
                        <h4><?php echo htmlspecialchars($row['nama']); ?></h4>
                        <p><a href="<?php echo htmlspecialchars($row['link']); ?>" target="_blank">Kunjungi Tautan</a></p>

                        <!-- Tombol Edit dan Hapus hanya muncul jika peran adalah admin -->
                        <?php if ($show_edit_button): ?>
                            <div class="card-actions">
                                <a href="edit-tautan.php?id=<?php echo $row['id']; ?>" class="btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="hapus-tautan.php?id=<?php echo $row['id']; ?>" class="btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus tautan ini?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="card-logo">
                        <!-- Menampilkan foto jika ada -->
                        <?php if ($row['foto']): ?>
                            <img src="/upload/<?php echo htmlspecialchars($row['foto']); ?>" alt="Logo <?php echo htmlspecialchars($row['nama']); ?>">
                        <?php else: ?>
                            <img src="/assets/default-logo.png" alt="Logo default">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

<script src="/js/tautan.js"></script>

<?php
include('/bandarharjo/partials/footer.php');
?>

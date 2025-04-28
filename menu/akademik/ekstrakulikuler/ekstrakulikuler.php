<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('/bandarharjo/partials/header.php');
  include_once('/bandarharjo/authentication/auth-check.php');
  include('/bandarharjo/koneksi.php');
?>

<link rel="stylesheet" href="/css/ekstrakulikuler.css">

<body>
    <div class="container">

        <div class="title">EKSTRAKULIKULER</div>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
            <div style="margin-bottom: 20px;">
                <a href="tambah-ekstrakulikuler.php" class="btn-tambah">+ Tambah Ekstrakulikuler</a>
            </div>
        <?php endif; ?>

        <div class="card-container">
            <?php
            $query = "SELECT * FROM ekstrakurikuler ORDER BY created_at DESC";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $foto = !empty($row['foto']) ? "/menu/akademik/ekstrakulikuler/upload/" . htmlspecialchars($row['foto']) : "/assets/bandarharjo.jpeg";
            ?>
                    <div class="card">
                        <img src="<?php echo $foto; ?>" alt="<?php echo htmlspecialchars($row['nama']); ?>">
                        <div class="card-text">
                            <span class="badge">Ekstrakulikuler</span>
                            <div class="class-name"><?php echo htmlspecialchars($row['nama']); ?></div>

                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                                <div class="card-actions" style="margin-top:10px;">
                                    <a href="edit-ekstrakulikuler.php?id=<?php echo $row['id']; ?>" class="btn-edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="hapus-ekstrakulikuler.php?id=<?php echo $row['id']; ?>" class="btn-hapus" onclick="return confirm('Yakin mau hapus ekstrakulikuler ini?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>Belum ada data ekstrakulikuler.</p>";
            }
            ?>
        </div>
    </div>
</body>

<?php
include('/bandarharjo/partials/footer.php');
?>

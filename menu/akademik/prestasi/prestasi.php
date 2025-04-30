<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Cek jika user adalah admin
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] == 'admin'; // Assuming 'admin' is the role
?>

<link rel="stylesheet" href="/css/prestasi.css">

<body>
    <div class="container">
        <div class="navbar-item">
            <div class="navigation">
                <div class="title">
                    <h1>PRESTASI</h1>
                </div>
                <div class="nav-underline"></div>
                <div class="selection">
                    <div class="option active" onclick="switchTab(this, 'prestasi-siswa')">
                        <p>PRESTASI SISWA</p>
                    </div>
                    <div class="option" onclick="switchTab(this, 'sang-juara')">
                        <p>SANG JUARA</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Tambah (Hanya untuk Admin) -->
        <?php if ($isAdmin): ?>
        <div class="tambah-button-container">
            <a href="/menu/akademik/prestasi/tambah-prestasi.php">
                <button class="btn-tambah">Tambah Prestasi</button>
            </a>
        </div>
        <?php endif; ?>

        <!-- PRESTASI SISWA -->
        <div class="prestasi-siswa" id="prestasi-siswa">
            <?php
            $query = "SELECT * FROM prestasi WHERE kategori = 'prestasi'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<div class='card'>";
                    echo "<img src='" . htmlspecialchars($data['foto']) . "' alt='Foto Prestasi'>";
                    echo "<div class='card-text'>";
                    echo "<span class='badge'>" . htmlspecialchars($data['nama']) . "</span>";
                    echo "</div>";

                    echo "<div class='card-meta'>";
                    // Menampilkan detail atau informasi tambahan (bisa ditambahkan sesuai kebutuhan)
                    echo "</div>";

                    // Tombol Hapus (Hanya untuk Admin)
                    if ($isAdmin) {
                        echo "<div class='card-actions' style='margin-top: 10px; display: flex; justify-content: center; gap: 10px;'>";
                        echo "<a href='hapus-prestasi.php?id=" . $data['id'] . "' class='btn-hapus' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>";
                        echo "</div>";
                    }

                    echo "</div>";
                }
            } else {
                echo "<p>Belum ada data prestasi siswa yang tersedia.</p>";
            }
            ?>
        </div>

        <!-- SANG JUARA -->
        <div class="sang-juara" id="sang-juara" style="display: none;">
            <?php
            $queryJuara = "SELECT * FROM prestasi WHERE kategori = 'sang_juara'";
            $resultJuara = mysqli_query($conn, $queryJuara);

            if ($resultJuara && mysqli_num_rows($resultJuara) > 0) {
                while ($data = mysqli_fetch_assoc($resultJuara)) {
                    echo "<div class='card'>";
                    echo "<img src='" . htmlspecialchars($data['foto']) . "' alt='Foto Sang Juara'>";
                    echo "<div class='card-text'>";
                    echo "<span class='badge'>" . htmlspecialchars($data['nama']) . "</span>";
                    echo "</div>";

                    echo "<div class='card-actions' style='margin-top: 10px; display: flex; justify-content: center; gap: 10px;'>";
                    // Tombol Hapus (Hanya untuk Admin)
                    if ($isAdmin) {
                        echo "<a href='hapus-prestasi.php?id=" . $data['id'] . "' class='btn-hapus' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>";
                    }
                    echo "</div>";

                    echo "</div>";
                }
            } else {
                echo "<p>Belum ada data sang juara yang tersedia.</p>";
            }
            ?>
        </div>

    </div>
</body>

<script src="/js/prestasi.js"></script>
<script src="/js/shortcut.js"></script>

<?php
include('/bandarharjo/partials/footer.php');
?>

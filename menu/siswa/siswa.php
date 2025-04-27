<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Cek apakah user sudah login dan periksa role admin
$show_edit_button = false;
if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
    $show_edit_button = true;
}

// Ambil data sarana dari database
$sql = "SELECT keterangan, jumlah FROM sarana";
$result = $conn->query($sql);
?>

<link rel="stylesheet" href="/css/siswa.css">

<body>

    <?php
    // Notifikasi jika berhasil menghapus
    if (isset($_GET['status']) && $_GET['status'] === 'success') {
        echo "<script>alert('Data berhasil dihapus!');</script>";
    }
    ?>

    <?php
    if (isset($_GET['status']) && $_GET['status'] === 'added') {
        echo "<script>alert('Data berhasil ditambahkan!');</script>";
    }
    ?>


    <div class="container">

        <div class="title">SISWA</div>

        <div class="card-container">
            <a href="/menu/siswa/kelas/kelas1.php">
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">SISWA</span>
                        <div class="class-name">KELAS 1</div>
                    </div>
                </div>
            </a>

            <a href="/menu/siswa/kelas/kelas2.php">
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">SISWA</span>
                        <div class="class-name">KELAS 2</div>
                    </div>
                </div>
            </a>

            <a href="/menu/siswa/kelas/kelas3.php">

                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">SISWA</span>
                        <div class="class-name">KELAS 3</div>
                    </div>
                </div>
            </a>

            <a href="/menu/siswa/kelas/kelas4.php">
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">SISWA</span>
                        <div class="class-name">KELAS 4</div>
                    </div>
                </div>
            </a>

            <a href="/menu/siswa/kelas/kelas5.php">
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">SISWA</span>
                        <div class="class-name">KELAS 5</div>
                    </div>
                </div>
            </a>

            <a href="/menu/siswa/kelas/kelas6.php">
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">SISWA</span>
                        <div class="class-name">KELAS 6</div>
                    </div>
                </div>
            </a>

        </div>

        <div class="title">SARANA PRASARANA</div>

        <div class="table-container">
            <!-- Tombol "Tambah Data Sarana" hanya muncul jika role adalah admin -->
            <?php if ($show_edit_button): ?>
                <div class="tambah-btn">
                    <a href="tambah-sarana.php"><button class="btn-tambah">Tambah Data Sarana</button></a>
                </div>
            <?php endif; ?>

            <table>
                <thead>
                    <tr>
                        <th>KETERANGAN</th>
                        <th>JUMLAH</th>
                        <th>AKSI</th> <!-- Kolom aksi -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $keterangan = urlencode($row["keterangan"]); // agar aman di URL
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["keterangan"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["jumlah"]) . "</td>";
                            echo "<td>";
                            // Tombol Edit dan Hapus hanya muncul jika role adalah admin
                            if ($show_edit_button) {
                                echo "<a href='edit-sarana.php?keterangan=$keterangan'><button class='btn-edit'>Edit</button></a> ";
                                echo "<a href='hapus-sarana.php?keterangan=$keterangan' onclick=\"return confirm('Yakin ingin menghapus data ini?');\"><button class='btn-hapus'>Hapus</button></a>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Data tidak ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>


        </div>
    </div>
</body>

<script src="/js/siswa.js"></script>

<?php include('/bandarharjo/partials/footer.php'); ?>
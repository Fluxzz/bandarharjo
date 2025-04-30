<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Cek apakah user sudah login dan apakah mereka adalah admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    $isAdmin = false;
} else {
    $isAdmin = true;
}

// Ambil data pendidik
$query = "SELECT * FROM pendidik";
$result = $conn->query($query);

// Ambil data dari tabel sekolahku
$querySekolah = "SELECT * FROM sekolahku LIMIT 1"; // asumsikan hanya 1 baris data
$resultSekolah = $conn->query($querySekolah);

// Cek apakah data ditemukan
if ($resultSekolah && $resultSekolah->num_rows > 0) {
    $dataSekolah = $resultSekolah->fetch_assoc();
    $sejarah = $dataSekolah['sejarah'];
    $alamat = $dataSekolah['alamat'];
    $telepon = $dataSekolah['telepon'];
    $email = $dataSekolah['email'];
    $letak_geografis = isset($data['letak_geografis']) ? $data['letak_geografis'] : '';
    $visi = $dataSekolah['visi'];
    $misi = $dataSekolah['misi'];
} else {
    // Default jika tidak ada data
    $sejarah = "Data sejarah belum tersedia.";
    $alamat = "-";
    $telepon = "-";
    $email = "-";
    $letak = "-";
    $visi = "Data visi belum tersedia.";
    $misi = "Data misi belum tersedia.";
}

?>

<link rel="stylesheet" href="/css/profile.css">

<body>

    <div class="container">
        <div class="title">INFORMASI SEKOLAH</div>
        <?php if ($isAdmin): ?>
            <button id="edit-btn" onclick="openEditForm()">Edit Informasi Sekolah</button>
        <?php endif; ?>

        <div class="container-1">
            <div class="container-left">
                <div class="history">
                    <h1>Sejarah SDN Bandarharjo 02</h1>
                    <div class="underline"></div>
                    <div class="content">
                        <p><?= htmlspecialchars($sejarah) ?></p>
                    </div>

                    <table>
                        <tr>
                            <td>Alamat Sekolah</td>
                            <td><?= htmlspecialchars($alamat) ?></td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td><?= htmlspecialchars($telepon) ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?= htmlspecialchars($email) ?></td>
                        </tr>
                        <tr>
                            <td>Letak Geografis</td>
                            <td><?= htmlspecialchars($letak_geografis) ?></td>
                        </tr>
                    </table>
                    <div class="underline"></div>
                </div>
            </div>

            <div class="container-right">
                <div class="visi">
                    <h1>Visi</h1>
                    <div class="underline"></div>
                    <div class="content">
                        <p><?= htmlspecialchars($visi) ?></p>
                    </div>
                </div>

                <div class="misi">
                    <h1>Misi</h1>
                    <div class="underline"></div>
                    <div class="content">
                        <p><?= htmlspecialchars($misi) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-2">
            <div class="title">PENDIDIK DAN TENAGA KEPENDIDIKAN</div>
            <div class="cards">

                <?php if ($isAdmin): ?>
                    <button class="add-btn" onclick="openForm()">+ Tambah Data Pendidik</button>
                <?php endif; ?>

                <?php
                // Inisialisasi counter untuk pembagian container
                $counter = 0;
                $containerIndex = 1;

                if ($result && $result->num_rows > 0) {
                    echo "<div class='card-container-$containerIndex'>";
                    while ($pendidik = $result->fetch_assoc()) {
                        // Ganti container setiap 4 kartu
                        if ($counter > 0 && $counter % 4 == 0) {
                            echo "</div>"; // Tutup container sebelumnya
                            $containerIndex++;
                            echo "<div class='card-container-$containerIndex'>"; // Buka container baru
                        }

                        echo "<div class='card'>
                        <img src='/upload/" . htmlspecialchars($pendidik['foto']) . "' alt='Foto " . htmlspecialchars($pendidik['nama']) . "'>
                        <div class='name'>" . htmlspecialchars($pendidik['nama']) . "</div>
                        <div class='position'>" . htmlspecialchars($pendidik['jabatan']) . "</div>";

                        // Tombol hapus hanya untuk admin
                        if ($isAdmin) {
                            echo "<button class='delete-btn' onclick=\"showDeletePopup('" . $pendidik['id'] . "')\">Hapus</button>";
                        }
                        
                        echo "</div>";

                        $counter++;
                    }
                    echo "</div>"; // Tutup container terakhir
                } else {
                    echo "<p>Tidak ada data pendidik dan tenaga kependidikan.</p>";
                }
                ?>
            </div>
            <div class="underline"></div>
        </div>
    </div>

    <!-- Edit Form -->
    <div id="edit-form" class="edit-form">
        <form action="/menu/profile/edit-sekolah.php" method="POST">
            <h2>Edit Informasi Sekolah</h2>
            <label for="sejarah">Sejarah</label>
            <textarea id="sejarah" name="sejarah"><?= htmlspecialchars($sejarah) ?></textarea>

            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="<?= htmlspecialchars($alamat) ?>">

            <label for="telepon">Telepon</label>
            <input type="text" id="telepon" name="telepon" value="<?= htmlspecialchars($telepon) ?>">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>">

            <label for="letak_geografis">Letak Geografis</label>
            <textarea id="letak_geografis" name="letak_geografis"><?= htmlspecialchars($letak_geografis) ?></textarea>

            <label for="visi">Visi</label>
            <textarea id="visi" name="visi"><?= htmlspecialchars($visi) ?></textarea>

            <label for="misi">Misi</label>
            <textarea id="misi" name="misi"><?= htmlspecialchars($misi) ?></textarea>

            <button type="submit" name="update">Update</button>
            <button type="button" onclick="closeEditForm()">Cancel</button>
        </form>
    </div>

    <!-- Popup untuk menghapus -->
    <div class="delete-user" id="delete-user">
        <div class="delete-popup">
            <p>Yakin Untuk Menghapus Data Ini?</p>
            <button class="cancel" onclick="closePopup()">TIDAK</button>
            <button class="confirm" onclick="deleteData()">IYA</button>
        </div>
    </div>

    <div class="form-popup" id="form-container">
        <div class="form-content">
            <h2>Tambah Data Pendidik</h2>
            <form action="tambah-pendidik.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" required placeholder="Contoh: PURWANTO, S.Pd.SD">
                </div>

                <div class="form-group">
                    <label for="posisi">Posisi/Jabatan</label>
                    <input type="text" name="posisi" id="posisi" required placeholder="Contoh: KEPALA SEKOLAH">
                </div>

                <div class="form-actions">
                    <button type="button" class="cancel-btn" onclick="closeForm()">Batal</button>
                    <button type="submit" class="submit-btn">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <div id="success-alert" class="alert-success">
        Data berhasil dihapus!
    </div>

</body>

<script src="/js/profile.js"></script>
<script src="/js/shortcut.js"></script>
<?php
include('/bandarharjo/partials/footer.php');
?>

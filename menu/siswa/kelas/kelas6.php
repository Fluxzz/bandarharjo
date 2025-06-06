<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Default kelas
$kelas = isset($_GET['kelas']) ? $_GET['kelas'] : '6A';

// Menentukan kategori
$kategori = '';
if ($kelas == '6A') {
    $kategori = 'A';
} elseif ($kelas == '6B') {
    $kategori = 'B';
} elseif ($kelas == '6C') {
    $kategori = 'C';
}

// Tambah/Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nisn']) && isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        $nisn = $_POST['nisn'];
        $kategori = $_POST['kategori'] ?? $kategori;

        if (isset($_POST['nisnLama'])) {
            $nisnLama = $_POST['nisnLama'];
            $updateQuery = "UPDATE siswa6 SET nama = ?, nisn = ?, kategori = ? WHERE nisn = ?";
            if ($stmt = $conn->prepare($updateQuery)) {
                $stmt->bind_param("ssss", $nama, $nisn, $kategori, $nisnLama);
                $stmt->execute();
                header("Location: kelas6.php?kelas=6$kategori");
                exit();
            }
        } else {
            $insertQuery = "INSERT INTO siswa6 (nama, nisn, kategori) VALUES (?, ?, ?)";
            if ($stmt = $conn->prepare($insertQuery)) {
                $stmt->bind_param("sss", $nama, $nisn, $kategori);
                $stmt->execute();
                header("Location: kelas6.php?kelas=6$kategori");
                exit();
            }
        }
    }
}

// Hapus
if (isset($_POST['hapus_nisn']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    $nisnHapus = $_POST['hapus_nisn'];
    $deleteQuery = "DELETE FROM siswa6 WHERE nisn = ?";
    if ($stmt = $conn->prepare($deleteQuery)) {
        $stmt->bind_param("s", $nisnHapus);
        $stmt->execute();
        echo "<script>window.location.href = 'kelas6.php?kelas=6$kategori';</script>";
        exit();
    }
}

// Ambil data siswa
$query = "SELECT * FROM siswa6 WHERE kategori='$kategori'";
$result = $conn->query($query);
?>

<link rel="stylesheet" href="/css/kelas.css">

<body>
<div class="container">

    <div class="navbar-item">
        <div class="navigation">
            <div class="title">
                <h1>KELAS</h1>
            </div>
            <div class="nav-underline"></div>
            <div class="selection">
                <div class="option" onclick="window.location.href='?kelas=6A'"><p>Kelas 6A</p></div>
                <div class="option" onclick="window.location.href='?kelas=6B'"><p>Kelas 6B</p></div>
                <div class="option" onclick="window.location.href='?kelas=6C'"><p>Kelas 6C</p></div>
            </div>
        </div>
    </div>

    <div class="table-container">
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <div class="tambah-btn">
            <button type="button" onclick="showAddForm()" class="btn-tambah">Tambah Data Siswa</button>
        </div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    while ($siswa = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . htmlspecialchars($siswa['nama']) . "</td>
                            <td>" . htmlspecialchars($siswa['nisn']) . "</td>
                            <td>";

                        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                            echo "
                                <div class='aksi-buttons'>
                                    <button type='button' class='btn-edit' onclick=\"showEditForm('" . addslashes($siswa['nama']) . "', '" . $siswa['nisn'] . "')\">Edit</button>
                                    <form method='POST' style='display:inline;'>
                                        <input type='hidden' name='hapus_nisn' value='" . htmlspecialchars($siswa['nisn']) . "'>
                                        <button type='submit' class='btn-hapus'>Hapus</button>
                                    </form>
                                </div>";
                        } else {
                            echo "-";
                        }

                        echo "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</div>

<?php include '/bandarharjo/partials/footer.php'; ?>

<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
<!-- Modal Tambah -->
<div id="addFormContainer" style="display:none;">
    <form method="POST">
        <h3>Tambah Data Siswa</h3>
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <label>NISN:</label>
        <input type="text" name="nisn" required>
        <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
        <button type="submit" class="btn-submit">Tambah</button>
        <button type="button" onclick="hideAddForm()" class="btn-hapus">Batal</button>
    </form>
</div>

<!-- Modal Edit -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="hideEditForm()">&times;</span>
        <h3>Edit Data Siswa</h3>
        <form method="POST" id="editForm">
            <input type="hidden" name="nisnLama" id="nisnLama">
            <label>Nama:</label>
            <input type="text" name="nama" id="editNama" required>
            <label>NISN:</label>
            <input type="text" name="nisn" id="editNISN" required>
            <button type="submit" class="btn-submit">Simpan Perubahan</button>
        </form>
    </div>
</div>
<?php endif; ?>

<script src="/js/siswa.js"></script>
<script src="js/shortcut.js"></script>

</body>

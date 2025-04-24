<?php
// Menyertakan koneksi database
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Tentukan kelas yang dipilih, default ke '1A'
$kelas = isset($_GET['kelas']) ? $_GET['kelas'] : '1A'; 

// Menentukan kategori berdasarkan kelas yang dipilih
$kategori = '';
if ($kelas == '1A') {
    $kategori = 'A';
} elseif ($kelas == '1B') {
    $kategori = 'B';
} elseif ($kelas == '1C') {
    $kategori = 'C';
}

// Proses menambah data siswa
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nisn']) && isset($_POST['nama'])) {
    if (isset($_POST['nisnLama'])) {
        // Edit data siswa
        $nisnLama = $_POST['nisnLama'];
        $nama = $_POST['nama'];
        $nisn = $_POST['nisn'];

        $updateQuery = "UPDATE siswa1 SET nama = ?, nisn = ?, kategori = ? WHERE nisn = ?";
        if ($stmt = $conn->prepare($updateQuery)) {
            $stmt->bind_param("sssi", $nama, $nisn, $kategori, $nisnLama);
            if ($stmt->execute()) {
                header("Location: kelas1.php?kelas=1" . $kategori);
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        // Tambah data siswa baru
        $nama = $_POST['nama'];
        $nisn = $_POST['nisn'];

        $insertQuery = "INSERT INTO siswa1 (nama, nisn, kategori) VALUES (?, ?, ?)";
        if ($stmt = $conn->prepare($insertQuery)) {
            $stmt->bind_param("sss", $nama, $nisn, $kategori);
            if ($stmt->execute()) {
                header("Location: kelas1.php?kelas=1" . $kategori);
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hapus_nisn'])) {
    $nisnHapus = $_POST['hapus_nisn'];

    $deleteQuery = "DELETE FROM siswa1 WHERE nisn = ?";
    if ($stmt = $conn->prepare($deleteQuery)) {
        $stmt->bind_param("i", $nisnHapus);
        if ($stmt->execute()) {
            // Menggunakan JavaScript untuk me-refresh halaman dan kemudian kembali ke halaman sebelumnya
            echo "<script>
                    window.location.reload();  // Refresh the page after deletion
                    window.location.href = window.history.back(); 
                </script>";
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: " . $conn->error;
    }
}

// Query untuk mengambil data siswa berdasarkan kategori kelas yang dipilih
$querySiswa = "SELECT * FROM siswa1 WHERE kategori='$kategori'";
$resultSiswa = $conn->query($querySiswa);
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
                    <div class="option" onclick="window.location.href='?kelas=1A'"><p>Kelas 1A</p></div>
                    <div class="option" onclick="window.location.href='?kelas=1B'"><p>Kelas 1B</p></div>
                    <div class="option" onclick="window.location.href='?kelas=1C'"><p>Kelas 1C</p></div>
                </div>
            </div>
        </div>

        <div class="table-container">
                <div class="tambah-btn">
                    <button type="button" onclick="showAddForm()" class="btn-submit">Tambah Data Siswa</button>
                </div>
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
                    if ($resultSiswa->num_rows > 0) {
                        while ($siswa = $resultSiswa->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($siswa['nama']) . "</td>
                                    <td>" . htmlspecialchars($siswa['nisn']) . "</td>
                                    <td>
                                        <div class='aksi-buttons'>
                                            <!-- Tombol Edit sebagai trigger untuk membuka modal -->
                                            <button type='button' onclick=\"showEditForm('" . addslashes($siswa['nama']) . "', '" . $siswa['nisn'] . "')\" class='btn-edit'>Edit</button>

                                            <!-- Tombol Hapus -->
                                            <form action='kelas1.php?kelas=<?php echo htmlspecialchars($kelas); ?>' method='POST' onsubmit='return confirm(\"Yakin ingin menghapus data ini?\");'>
                                                <input type='hidden' name='hapus_nisn' value='" . htmlspecialchars($siswa['nisn']) . "'>
                                                <button type='submit' class='btn-hapus'>Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Data tidak ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php 
include('/bandarharjo/partials/footer.php');
?>

    <!-- Form Edit Modal (Popup) -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="hideEditForm()">&times;</span>
                <h3>Edit Data Siswa</h3>
                <form id="editForm" action="kelas1.php?kelas=<?php echo $kelas; ?>" method="POST">
                    <input type="hidden" name="nisnLama" id="nisnLama">
                    <label for="nama">Nama:</label><br>
                    <input type="text" name="nama" id="editNama" required><br><br>
                    <label for="nisn">NISN:</label><br>
                    <input type="text" name="nisn" id="editNISN" required><br><br>
                    <button type="submit">Simpan Perubahan</button>
                </form>
            </div>
        </div>

         <!-- Form Tambah Data Siswa -->
         <div id="addFormContainer" style="display: none;">
             <h3>Tambah Data Siswa</h3>
             <form id="addForm" method="POST">
            <label for="nama">Nama:</label><br>
            <input type="text" name="nama" id="addNama" required><br><br>

            <label for="nisn">NISN:</label><br>
            <input type="text" name="nisn" id="addNISN" required><br><br>

            <button type="submit" class="btn-submit">Tambah Data</button>
            <button type="button" onclick="hideAddForm()" class="btn-hapus">Batal</button>
        </form>


</body>

<script src="/js/siswa.js"></script>
<script src="/js/edit.js"></script>
<script src="/js/tambah.js"></script>


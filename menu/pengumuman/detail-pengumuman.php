<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('/bandarharjo/partials/header.php');
  include_once('/bandarharjo/authentication/auth-check.php');
  include('/bandarharjo/koneksi.php');

// Ambil ID dari URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil data dari database berdasarkan ID
    $query = "SELECT * FROM pengumuman WHERE id = $id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "<p>Pengumuman tidak ditemukan.</p>";
        exit;
    }
} else {
    echo "<p>ID tidak valid.</p>";
    exit;
}
?>
<link rel="stylesheet" href="../../css/detail-pengumuman.css">
<body>
    <div class="detail-container">
    <img src="/upload/<?php echo $data['foto']; ?>" alt="Pengumuman Image">
        <h1><?php echo htmlspecialchars($data['judul']); ?></h1>
        <div class="isi">
            <?php echo $data['isi']; ?>
        </div>
    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownToggle = document.querySelector(".dropdown-toggle");
        const dropdownMenu = document.querySelector(".dropdown-menu");

        dropdownToggle.addEventListener("click", function(e) {
            e.preventDefault();
            dropdownMenu.style.display =
                dropdownMenu.style.display === "block" ? "none" : "block";
        });

        document.addEventListener("click", function(e) {
            if (!e.target.closest(".dropdown")) {
                dropdownMenu.style.display = "none";
            }
        });
    });
</script>
<script src="/js/pengumuman.js"></script>
<script src="/js//nav.js"></script>

<?php
include('../../partials/footer.php');
?>

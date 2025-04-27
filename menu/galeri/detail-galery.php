<?php
include('../../partials/header.php');
include('../../koneksi.php');

// Ambil ID dari URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil data dari database berdasarkan ID
    $query = "SELECT * FROM galery WHERE id = $id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "<p>Galeri tidak ditemukan.</p>";
        exit;
    }
} else {
    echo "<p>ID tidak valid.</p>";
    exit;
}

// Fungsi konversi YouTube
function convertYoutubeToEmbed($url) {
    preg_match("/(?:v=|\/embed\/|youtu.be\/)([^&\n?#]+)/", $url, $matches);
    return isset($matches[1]) ? "https://www.youtube.com/embed/" . $matches[1] : '';
}
?>
<link rel="stylesheet" href="/css/detail-galery.css">

<body>
    <div class="container">
        <div class="content">

            <!-- Jika video -->
            <?php if ($data['kategori'] == 'video' && !empty($data['url_video'])): ?>
                <div class="video-container">
                    <iframe width="100%" height="500" src="<?= convertYoutubeToEmbed($data['url_video']) ?>" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="title"><?= htmlspecialchars($data['judul']) ?></div>
                <p><?= nl2br(htmlspecialchars($data['isi'])) ?></p>

            <!-- Jika foto -->
            <?php elseif ($data['kategori'] == 'foto'): ?>
                <div class="foto-container">
                    <img src="../../upload/<?= htmlspecialchars($data['foto']) ?>" alt="Foto Galeri" style="max-width: 100%;">
                </div>
                <div class="title"><?= htmlspecialchars($data['judul']) ?></div>
                <p><?= nl2br(htmlspecialchars($data['isi'])) ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownToggle = document.querySelector(".dropdown-toggle");
        const dropdownMenu = document.querySelector(".dropdown-menu");

        if (dropdownToggle && dropdownMenu) {
            dropdownToggle.addEventListener("click", function (e) {
                e.preventDefault();
                dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
            });

            document.addEventListener("click", function (e) {
                if (!e.target.closest(".dropdown")) {
                    dropdownMenu.style.display = "none";
                }
            });
        }
    });
</script>
<script src="../../js/pengumuman.js"></script>
<script src="../../js/nav.js"></script>

<?php
include('../../partials/footer.php');
?>

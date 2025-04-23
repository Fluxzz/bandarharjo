<?php 
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Query untuk mengambil sambutan kepala sekolah
$query = "SELECT * FROM pengumuman";
$result = $conn->query($query);

// Cek apakah ada data
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Data sambutan tidak ditemukan.";
    exit;
}

?>

<link rel="stylesheet" href="/css/pengumuman.css">

<body>
<div class="container">
            <div class="navbar-item">
        
                <div class="navigation">
                    <div class="title">
                        <h1>PENGUMUMAN</h1>
                    </div>
                    <div class="nav-underline"></div>
                    <div class="selection">
    
                        <div class="option" onclick="switchTab(this, 'ppdb-container')"><p>PPDB 2023/2024</p></div>
                        <div class="option active" onclick="switchTab(this, 'mpls-container')"><p>PENGUMUMAN MPLS</p></div>
                        <div class="option" onclick="switchTab(this, 'berita-container')"><p>BERITA SD</p></div>
                        
                    </div>
                </div>
            </div>

            <div class="mpls-container" id="mpls-container">
                <div class="mpls-card">
                    <img src="/assets/sang-juara.png" alt="">
                    <div class="mpls-card-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <a href="/pengumuman/detail-pengumuman.html">
                        <button class="btn">Baca Selengkapnya >></button>
                      </a>
                    </div>
                </div>
                <div class="mpls-card">
                    <img src="/assets/sang-juara.png" alt="">
                    <div class="mpls-card-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <a href="/pengumuman/detail-pengumuman.html">
                        <button class="btn">Baca Selengkapnya >></button>
                      </a>
                    </div>
                </div>
                <div class="mpls-card">
                    <img src="/assets/sang-juara.png" alt="">
                    <div class="mpls-card-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <a href="/pengumuman/detail-pengumuman.html">
                        <button class="btn">Baca Selengkapnya >></button>
                      </a>
                    </div>
                </div>
                <div class="mpls-card">
                    <img src="/assets/sang-juara.png" alt="">
                    <div class="mpls-card-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <a href="/pengumuman/detail-pengumuman.html">
                        <button class="btn">Baca Selengkapnya >></button>
                      </a>
                    </div>
                </div>
                <div class="mpls-card">
                    <img src="/assets/sang-juara.png" alt="">
                    <div class="mpls-card-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <a href="/pengumuman/detail-pengumuman.html">
                        <button class="btn">Baca Selengkapnya >></button>
                      </a>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination" id="pagination">
                    <button>&larr; sebelumnya</button>
                    <div class="page active">1</div>
                    <div class="page">2</div>
                    <div class="page">3</div>
                    <button>selanjutnya &rarr;</button>
                  </div>
            </div>


            <div class="ppdb-container" id="ppdb-container" style="display: none;">
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">TINGKAT KECAMATAN</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">TINGKAT KOTA/KABUPATEN</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">TINGKAT PROVINSI</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">TINGKAT NASIONAL</span>
                    </div>
                </div>
            </div>

            <div class="berita-container" id="berita-container" style="display: none;">
                <div class="berita-card">
                    <img src="/assets/sang-juara.png" alt="">
                    <div class="berita-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <button class="btn">Baca Selengkapnya >></button>
                    </div>
                </div>
                <div class="berita-card">
                    <img src="/assets/sang-juara.png" alt="">
                    <div class="berita-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <button class="btn">Baca Selengkapnya >></button>
                    </div>
                </div>
                <div class="berita-card">
                    <img src="/assets/sang-juara.png" alt="">
                    <div class="berita-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <button class="btn">Baca Selengkapnya >></button>
                    </div>
                </div>
                <div class="berita-card">
                    <img src="/assets/sang-juara.png" alt="">
                    <div class="berita-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <button class="btn">Baca Selengkapnya >></button>
                    </div>
                </div>
                <div class="berita-card">
                    <img src="/assets/sang-juara.png" alt="">
                    <div class="berita-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <button class="btn">Baca Selengkapnya >></button>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination" id="pagination">
                    <button>&larr; sebelumnya</button>
                    <div class="page active">1</div>
                    <div class="page">2</div>
                    <div class="page">3</div>
                    <button>selanjutnya &rarr;</button>
                  </div>
            </div>

        </div>
</body>


<script src="/js/pengumuman.js"></script>


<?php 
include('/bandarharjo/partials/footer.php');
?>
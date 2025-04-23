<?php 
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');


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

            <div class="prestasi-siswa" id="prestasi-siswa">
                <div class="prestasi-card">
                    <img src="" alt="">
                    <div class="prestasi-card-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <button class="btn">Baca Selengkapnya >></button>
                    </div>
                </div>
                <div class="prestasi-card">
                    <img src="" alt="">
                    <div class="prestasi-card-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <button class="btn">Baca Selengkapnya >></button>
                    </div>
                </div>
                <div class="prestasi-card">
                    <img src="" alt="">
                    <div class="prestasi-card-content">
                      <h3>Masa Pengenalan Lingkungan Sekolah (MPLS) Tahun 2021/2022</h3>
                      <div class="underline"></div>
                      <button class="btn">Baca Selengkapnya >></button>
                    </div>
                </div>
                <div class="prestasi-card">
                    <img src="" alt="">
                    <div class="prestasi-card-content">
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


            <div class="sang-juara" id="sang-juara" style="display: none;">
                <div class="card">
                    <img src="/assets/sang-juara.png" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">TINGKAT KECAMATAN</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/sang-juara.png" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">TINGKAT KOTA/KABUPATEN</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/sang-juara.png" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">TINGKAT PROVINSI</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/sang-juara.png" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">TINGKAT NASIONAL</span>
                    </div>
                </div>
            </div>

        </div>
</body>

<script src="/js/prestasi.js"></script>

<?php 
include('/bandarharjo/partials/footer.php');
?>
<?php
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Query untuk mengambil sambutan kepala sekolah
$query = "SELECT * FROM galery";
$result = $conn->query($query);

// Cek apakah ada data
if ($result->num_rows > 0) {
  $data = $result->fetch_assoc();
} else {
  echo "Data sambutan tidak ditemukan.";
  exit;
}

?>

<body>
  
  <div class="container">
  
  <div class="navbar-item">
  
      <div class="navigation">
          <div class="title">
              <h1>GALERI</h1>
          </div>
          <div class="nav-underline"></div>
          <div class="selection">
  
              <div class="option active" onclick="switchTab(this, 'vidio-container')">
                  <p>GALERI VIDIO</p>
              </div>
              <div class="option" onclick="switchTab(this, 'foto-container')">
                  <p>GALERI FOTO</p>
              </div>
              
          </div>
      </div>
  </div>
  
  <div class="vidio-container" id="vidio-container">
      <div class="slider-wrapper">
        <button class="nav-button left" id="slide-left">
          <i class="fa-solid fa-angle-left"></i>
        </button>
  
        <div class="card-container" id="cardSlider">
          <!-- Card 1 -->
          <div class="card">
            <div class="video-placeholder">vid YT</div>
            <div class="card-footer">
              <a href="/galeri/detail-galery.html">
                <button class="btn-selengkapnya">selengkapnya</button>
              </a>
              <div class="card-desc">
                <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
              </div>
            </div>
          </div>
          
          <div class="card">
            <div class="video-placeholder">vid YT</div>
            <div class="card-footer">
              <a href="/galeri/detail-galery.html">
                <button class="btn-selengkapnya">selengkapnya</button>
              </a>
              <div class="card-desc">
                <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
              </div>
            </div>
          </div>
  
          <div class="card">
            <div class="video-placeholder">vid YT</div>
            <div class="card-footer">
              <a href="/galeri/detail-galery.html">
                <button class="btn-selengkapnya">selengkapnya</button>
              </a>
              <div class="card-desc">
                <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
              </div>
            </div>
          </div>
  
          <div class="card">
            <div class="video-placeholder">vid YT</div>
            <div class="card-footer">
              <a href="/galeri/detail-galery.html">
                <button class="btn-selengkapnya">selengkapnya</button>
              </a>
              <div class="card-desc">
                <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
              </div>
            </div>
          </div>
  
          <div class="card">
            <div class="video-placeholder">vid YT</div>
            <div class="card-footer">
              <a href="/galeri/detail-galery.html">
                <button class="btn-selengkapnya">selengkapnya</button>
              </a>
              <div class="card-desc">
                <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
              </div>
            </div>
          </div>
  
          <div class="card">
            <div class="video-placeholder">vid YT</div>
            <div class="card-footer">
              <a href="/galeri/detail-galery.html">
                <button class="btn-selengkapnya">selengkapnya</button>
              </a>
              <div class="card-desc">
                <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
              </div>
            </div>
          </div>
  
          <div class="card">
            <div class="video-placeholder">vid YT</div>
            <div class="card-footer">
              <a href="/galeri/detail-galery.html">
                <button class="btn-selengkapnya">selengkapnya</button>
              </a>
              <div class="card-desc">
                <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
              </div>
            </div>
          </div>
  
          <!-- Tambahkan lebih banyak card sesuai kebutuhan -->
        </div>
  
        <button class="nav-button right" id="slide-right">
          <i class="fa-solid fa-angle-right"></i>
        </button>
      </div>
    </div>
  
    <div class="foto-container" id="foto-container" style="display: none;">
      <div class="slider-wrapper">
        <button class="nav-button left" id="foto-slide-left">
          <i class="fa-solid fa-angle-left"></i>
        </button>
    
        <div class="card-container" id="fotoCardSlider">
              <div class="card">
                  <div class="video-placeholder">vid YT</div>
                      <div class="card-footer">
                        <a href="/galeri/detail-galery.html">
                          <button class="btn-selengkapnya">selengkapnya</button>
                        </a>
                          <div class="card-desc">
                          <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
                      </div>
                  </div>
              </div>
              <div class="card">
                  <div class="video-placeholder">vid YT</div>
                  <div class="card-footer">
                    <a href="/galeri/detail-galery.html">
                      <button class="btn-selengkapnya">selengkapnya</button>
                    </a>
                      <div class="card-desc">
                      <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
                  </div>
                  </div>
              </div>
              <div class="card">
                  <div class="video-placeholder">vid YT</div>
                  <div class="card-footer">
                    <a href="/galeri/detail-galery.html">
                      <button class="btn-selengkapnya">selengkapnya</button>
                    </a>
                      <div class="card-desc">
                      <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
                  </div>
                  </div>
              </div>
              <div class="card">
                  <div class="video-placeholder">vid YT</div>
                  <div class="card-footer">
                    <a href="/galeri/detail-galery.html">
                      <button class="btn-selengkapnya">selengkapnya</button>
                    </a>
                      <div class="card-desc">
                      <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
                  </div>
                  </div>
              </div>
              <div class="card">
                  <div class="video-placeholder">vid YT</div>
                  <div class="card-footer">
                    <a href="/galeri/detail-galery.html">
                      <button class="btn-selengkapnya">selengkapnya</button>
                    </a>
                      <div class="card-desc">
                      <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
                  </div>
                  </div>
              </div>
              <div class="card">
                  <div class="video-placeholder">vid YT</div>
                  <div class="card-footer">
                    <a href="/galeri/detail-galery.html">
                      <button class="btn-selengkapnya">selengkapnya</button>
                    </a>
                      <div class="card-desc">
                      <strong>MPLS Hari Pertama</strong><br />T.A. 2021/2022
                  </div>
                  </div>
              </div>
        </div>
    
        <button class="nav-button right" id="foto-slide-right">
          <i class="fa-solid fa-angle-right"></i>
        </button>
      </div>
    </div>
  
  </div>
</body>

<script src="/js/slider.js"></script>

<?php
include('/bandarharjo/partials/footer.php');
?>
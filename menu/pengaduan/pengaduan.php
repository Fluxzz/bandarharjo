<?php 
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Query untuk mengambil sambutan kepala sekolah
$query = "SELECT * FROM pengaduan";
$result = $conn->query($query);

// Cek apakah ada data
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Data sambutan tidak ditemukan.";
    exit;
}

?>

<link rel="stylesheet" href="/css/pengaduan.css">

<div class="container">
        <div class="wrapper">
            <div class="section-title">
              <span>PENGADUAN</span>
            </div>
        
            <div class="grid-container">
                <form>

                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" id="nama" placeholder="Masukkan nama">
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" placeholder="Masukkan alamat email">
                    </div>

                    <div class="form-group">
                      <label for="telp">No. Telp</label>
                      <input type="tel" id="telp" placeholder="Masukkan no. telp">
                    </div>

                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <textarea id="deskripsi" placeholder="Masukkan deskripsi"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Upload Gambar</label>
                        <div class="custom-file">
                          <label for="gambar" class="file-label">Pilih file</label>
                          <input type="file" id="gambar" hidden>
                        </div>
                    </div>

                    <div class="submit-btn">
                      <button type="submit">KIRIM</button>
                    </div>

                  </form>
            </div>
        </div>
    </div>


<?php 
include('/bandarharjo/partials/footer.php');
?>
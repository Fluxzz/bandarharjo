<?php 
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Query untuk mengambil sambutan kepala sekolah
$query = "SELECT * FROM sambutan WHERE id = 1";
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
            <div class="card">
                <h2 class="title">Sambutan Kepala Sekolah</h2>
                <div class="underline"></div>
                <div class="content">
    
                <div class="circle">
                <img src="path_to_images/<?php echo $data['foto_kapsek']; ?>" alt="Foto Kepala Sekolah">
    </div>
                    <div class="sambutan">
        <p><?php echo $data['isi']; ?></p>
    </div>
                    </div>
                </div>
            </div>
            <button id="edit-btn">Edit</button>
        </div>
        
        <div class="popup-container" id="popupForm">
        <form action="#" method="post">
          <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" id="title" name="title" placeholder="Masukkan judul...">
          </div>
          <div class="form-group">
            <label for="photo">Upload Foto</label>
            <input type="file" id="photo" name="photo" accept="image/*">
          </div>
          <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" placeholder="Tulis deskripsi di sini..."></textarea>
          </div>
          <div class="form-group">
            <button type="submit">Kirim</button>
            <button type="button" id="close-popup">Kembali</button>
          </div>
        </form>
      </div>
</body>
<?php 
include('/bandarharjo/partials/footer.php');
?>
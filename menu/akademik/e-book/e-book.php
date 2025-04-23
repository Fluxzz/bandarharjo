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

<div class="container">

<div class="title">E-book</div>

  <div class="card-container">
    <div class="card">
      <div class="image-placeholder"></div>
      <div class="content">
        <div class="book-title">JUDUL BUKU 1</div>
        <div class="label">KETERANGAN :</div>
        <p class="desc">
          LOREM IMPSUM WOKWOKWOKWOKOW<br>
          KOWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKKKKKKKKKKKK<br>

        </p>
      </div>
    </div>
  
    <div class="card">
      <div class="image-placeholder"></div>
      <div class="content">
        <div class="book-title">JUDUL BUKU 1</div>
        <div class="label">KETERANGAN :</div>
        <p class="desc">
          LOREM IMPSUM WOKWOKWOKWOKOW<br>
          KOWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKKKKKKKKKKKK<br>
          KKK AOINFONON;JSNUIAFUBVJADJNCAEWIOFUAJ;BUIDSNYA AFHIAURFNIUF AEFUIABFUBIFBIEBIFU<br>
          EWEFUWEUFWHFUI  WEUFHWUIEFWUIF WEIWEUFIHWEUFHUI UEHFFUWE IL
        </p>
      </div>
    </div>
    <div class="card">
      <div class="image-placeholder"></div>
      <div class="content">
        <div class="book-title">JUDUL BUKU 1</div>
        <div class="label">KETERANGAN :</div>
        <p class="desc">
          LOREM IMPSUM WOKWOKWOKWOKOW<br>
          KOWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKKKKKKKKKKKK<br>
          KKK AOINFONON;JSNUIAFUBVJADJNCAEWIOFUAJ;BUIDSNYA AFHIAURFNIUF AEFUIABFUBIFBIEBIFU<br>
          EWEFUWEUFWHFUI  WEUFHWUIEFWUIF WEIWEUFIHWEUFHUI UEHFFUWE IL
        </p>
      </div>
    </div>
    <div class="card">
      <div class="image-placeholder"></div>
      <div class="content">
        <div class="book-title">JUDUL BUKU 1</div>
        <div class="label">KETERANGAN :</div>
        <p class="desc">
          LOREM IMPSUM WOKWOKWOKWOKOW<br>
          KOWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKKKKKKKKKKKK<br>
          KKK AOINFONON;JSNUIAFUBVJADJNCAEWIOFUAJ;BUIDSNYA AFHIAURFNIUF AEFUIABFUBIFBIEBIFU<br>
          EWEFUWEUFWHFUI  WEUFHWUIEFWUIF WEIWEUFIHWEUFHUI UEHFFUWE IL
        </p>
      </div>
    </div>
    <div class="card">
      <div class="image-placeholder"></div>
      <div class="content">
        <div class="book-title">JUDUL BUKU 1</div>
        <div class="label">KETERANGAN :</div>
        <p class="desc">
          LOREM IMPSUM WOKWOKWOKWOKOW<br>
          KOWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKKKKKKKKKKKK<br>
          KKK AOINFONON;JSNUIAFUBVJADJNCAEWIOFUAJ;BUIDSNYA AFHIAURFNIUF AEFUIABFUBIFBIEBIFU<br>
          EWEFUWEUFWHFUI  WEUFHWUIEFWUIF WEIWEUFIHWEUFHUI UEHFFUWE IL
        </p>
      </div>
    </div>
    <div class="card">
      <div class="image-placeholder"></div>
      <div class="content">
        <div class="book-title">JUDUL BUKU 1</div>
        <div class="label">KETERANGAN :</div>
        <p class="desc">
          LOREM IMPSUM WOKWOKWOKWOKOW<br>
          KOWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKKKKKKKKKKKK<br>
          KKK AOINFONON;JSNUIAFUBVJADJNCAEWIOFUAJ;BUIDSNYA AFHIAURFNIUF AEFUIABFUBIFBIEBIFU<br>
          EWEFUWEUFWHFUI  WEUFHWUIEFWUIF WEIWEUFIHWEUFHUI UEHFFUWE IL
        </p>
      </div>
    </div>
    <div class="card">
      <div class="image-placeholder"></div>
      <div class="content">
        <div class="book-title">JUDUL BUKU 1</div>
        <div class="label">KETERANGAN :</div>
        <p class="desc">
          LOREM IMPSUM WOKWOKWOKWOKOW<br>
          KOWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKWOKKKKKKKKKKKK<br>
          KKK AOINFONON;JSNUIAFUBVJADJNCAEWIOFUAJ;BUIDSNYA AFHIAURFNIUF AEFUIABFUBIFBIEBIFU<br>
          EWEFUWEUFWHFUI  WEUFHWUIEFWUIF WEIWEUFIHWEUFHUI UEHFFUWE IL
        </p>
      </div>
    </div>
  </div>

</div>


<?php 
include('/bandarharjo/partials/footer.php');
?>
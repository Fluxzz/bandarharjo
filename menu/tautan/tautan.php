<?php 
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Query untuk mengambil sambutan kepala sekolah
$query = "SELECT * FROM tautan";
$result = $conn->query($query);

// Cek apakah ada data
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Data sambutan tidak ditemukan.";
    exit;
}

?>

<link rel="stylesheet" href="/css/tautan.css">

<body>
<div class="container">
        <div class="wrapper">
            <div class="section-title">
              <span>TAUTAN</span>
            </div>
        
            <div class="grid-container">
              <!-- Ulangi div.card ini sesuai jumlah data -->
                <div class="card">
                    <div class="card-text">
                      <h4>KEMENDIKBUD</h4>
                      <p>Kemendikbudristek berperan dalam mengembangkan pendidikan dan kebudayaan di Indonesia.</p>
                    </div>
                    <div class="card-logo">
                      <img src="/assets/kemendikbud.png" alt="Logo Kemendikbud">
                    </div>
                </div>
                <div class="card">
                    <div class="card-text">
                      <h4>KEMENDIKBUD</h4>
                      <p>Kemendikbudristek berperan dalam mengembangkan pendidikan dan kebudayaan di Indonesia.</p>
                    </div>
                    <div class="card-logo">
                      <img src="/assets/kemendikbud.png" alt="Logo Kemendikbud">
                    </div>
                </div>
                <div class="card">
                    <div class="card-text">
                      <h4>KEMENDIKBUD</h4>
                      <p>Kemendikbudristek berperan dalam mengembangkan pendidikan dan kebudayaan di Indonesia.</p>
                    </div>
                    <div class="card-logo">
                      <img src="/assets/kemendikbud.png" alt="Logo Kemendikbud">
                    </div>
                </div>
                <div class="card">
                    <div class="card-text">
                      <h4>KEMENDIKBUD</h4>
                      <p>Kemendikbudristek berperan dalam mengembangkan pendidikan dan kebudayaan di Indonesia.</p>
                    </div>
                    <div class="card-logo">
                      <img src="/assets/kemendikbud.png" alt="Logo Kemendikbud">
                    </div>
                </div>
                <div class="card">
                    <div class="card-text">
                      <h4>KEMENDIKBUD</h4>
                      <p>Kemendikbudristek berperan dalam mengembangkan pendidikan dan kebudayaan di Indonesia.</p>
                    </div>
                    <div class="card-logo">
                      <img src="/assets/kemendikbud.png" alt="Logo Kemendikbud">
                    </div>
                </div>
                <div class="card">
                    <div class="card-text">
                      <h4>KEMENDIKBUD</h4>
                      <p>Kemendikbudristek berperan dalam mengembangkan pendidikan dan kebudayaan di Indonesia.</p>
                    </div>
                    <div class="card-logo">
                      <img src="/assets/kemendikbud.png" alt="Logo Kemendikbud">
                    </div>
                </div>
                <div class="card">
                    <div class="card-text">
                      <h4>KEMENDIKBUD</h4>
                      <p>Kemendikbudristek berperan dalam mengembangkan pendidikan dan kebudayaan di Indonesia.</p>
                    </div>
                    <div class="card-logo">
                      <img src="/assets/kemendikbud.png" alt="Logo Kemendikbud">
                    </div>
                </div>
                <div class="card">
                    <div class="card-text">
                      <h4>KEMENDIKBUD</h4>
                      <p>Kemendikbudristek berperan dalam mengembangkan pendidikan dan kebudayaan di Indonesia.</p>
                    </div>
                    <div class="card-logo">
                      <img src="/assets/kemendikbud.png" alt="Logo Kemendikbud">
                    </div>
                </div>
                <div class="card">
                    <div class="card-text">
                      <h4>KEMENDIKBUD</h4>
                      <p>Kemendikbudristek berperan dalam mengembangkan pendidikan dan kebudayaan di Indonesia.</p>
                    </div>
                    <div class="card-logo">
                      <img src="/assets/kemendikbud.png" alt="Logo Kemendikbud">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>




<?php 
include('/bandarharjo/partials/footer.php');
?>
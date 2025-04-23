<?php 
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

// Query untuk mengambil sambutan kepala sekolah
$query = "SELECT * FROM ekstrakurikuler";
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

<div class="title">EKSTRAKULIKULER</div>

<div class="card-container">
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Ekstrakulikuler</span>
            <div class="class-name">Pramuka</div>
        </div>
    </div>
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Ekstrakulikuler</span>
            <div class="class-name">BTQ</div>
        </div>
    </div>
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Ekstrakulikuler</span>
            <div class="class-name">Komputer</div>
        </div>
    </div>
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Ekstrakulikuler</span>
            <div class="class-name">Takwondo</div>
        </div>
    </div>
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Ekstrakulikuler</span>
            <div class="class-name">Seni Tari</div>
        </div>
    </div>
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Ekstrakulikuler</span>
            <div class="class-name">Takraw</div>
        </div>
    </div>
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Ekstrakulikuler</span>
            <div class="class-name">Volly</div>
        </div>
    </div>
</div>
</div>
</body>

<?php 
include('/bandarharjo/partials/footer.php');
?>
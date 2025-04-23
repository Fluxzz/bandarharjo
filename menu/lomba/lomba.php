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

<div class="title">LOMBA</div>

<div class="card-container">
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Lomba</span>
            <div class="class-name">LAMPAH KITA 2023</div>
        </div>
    </div>
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Lomba</span>
            <div class="class-name">LAMPAH KITA 2023</div>
        </div>
    </div>
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Lomba</span>
            <div class="class-name">LAMPAH KITA 2023</div>
        </div>
    </div>
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Lomba</span>
            <div class="class-name">LAMPAH KITA 2023</div>
        </div>
    </div>
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Lomba</span>
            <div class="class-name">LAMPAH KITA 2023</div>
        </div>
    </div>
    <div class="card">
        <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
        <div class="card-text">
            <span class="badge">Lomba</span>
            <div class="class-name">LAMPAH KITA 2023</div>
        </div>
    </div>
</div>
</div>


<?php 
include('/bandarharjo/partials/footer.php');
?>
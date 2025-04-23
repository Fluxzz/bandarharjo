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

<link rel="stylesheet" href="/css/siswa.css">

<body>
<div class="container">

<div class="title">SISWA</div>

<div class="card-container">
    <a href="/siswa/kelas.html">
        <div class="card">
            <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
            <div class="card-text">
                <span class="badge">SISWA</span>
                <div class="class-name">KELAS 1</div>
            </div>
        </div>
    </a>
    
    <a href="/siswa/kelas.html">
        <div class="card">
            <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
            <div class="card-text">
                <span class="badge">SISWA</span>
                <div class="class-name">KELAS 2</div>
            </div>
        </div>
    </a>

    <a href="/siswa/kelas.html">

        <div class="card">
            <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
            <div class="card-text">
                <span class="badge">SISWA</span>
                <div class="class-name">KELAS 3</div>
            </div>
        </div>
    </a>

    <a href="/siswa/kelas.html">
        <div class="card">
            <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
            <div class="card-text">
                <span class="badge">SISWA</span>
                <div class="class-name">KELAS 4</div>
            </div>
        </div>
    </a>

    <a href="/siswa/kelas.html">
        <div class="card">
            <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
            <div class="card-text">
                <span class="badge">SISWA</span>
                <div class="class-name">KELAS 5</div>
            </div>
        </div>
    </a>

    <a href="/siswa/kelas.html">
        <div class="card">
            <img src="/assets/bandarharjo.jpeg" alt="Kelas 2">
            <div class="card-text">
                <span class="badge">SISWA</span>
                <div class="class-name">KELAS 6</div>
            </div>
        </div>
    </a>
    
</div>

<div class="title">SARANA PRASARANA</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>KETERANGAN</th>
                <th>JUMLAH</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>RUANG KELAS</td>
                <td>12</td>
            </tr>
            <tr>
                <td>R. KEPALA SEKOLAH</td>
                <td>1</td>
            </tr>
            <tr>
                <td>R. TAMU KEPALA SEKOLAH</td>
                <td>1</td>
            </tr>
            <tr>
                <td>RUANG GURU</td>
                <td>1</td>
            </tr>
            <tr>
                <td>PERPUSTAKAAN</td>
                <td>1</td>
            </tr>
            <tr>
                <td>R UKS</td>
                <td>1</td>
            </tr>
            <tr>
                <td>R. IBADAH (MUSHOLA)</td>
                <td>1</td>
            </tr>
            <tr>
                <td>KAMAR MANDI GURU</td>
                <td>2</td>
            </tr>
            <tr>
                <td>TOILET SISWA</td>
                <td>5</td>
            </tr>
            <tr>
                <td>KANTIN SEKOLAH</td>
                <td>3</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</body>

<script src="/js/pengumuman.js"></script>

<?php 
include('/bandarharjo/partials/footer.php');
?>
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

<link rel="stylesheet" href="/css/profile.css">

<body>
<div class="container-1">
        <div class="container-left">

            <div class="history">
                <h1>Sejarah SDN Bandarharjo 02</h1>
                <div class="underline"></div>
                <div class="content">
                    <p>SD Negeri Bandarharjo 02 adalah salah satu sekolah negeri di Kota Semarang. Menjalankan operasionalnya pada tahun 1974 dengan Nomor Statistik Sekolah : 101030113019 dengan nama SD Inpres KSP Bandarharjo. </p>
                    <p>Kemudian tahun 1980 berganti nama menjadi SD Negeri Bandarharjo 03. Selanjutnya dengan SK Gubernur Kepala Daerah Tingkat I Jawa Tengah Nomor : 421.2/08799 tertanggal 17 November tahun 2000 tentang Pembaharuan Surat Keputusan Sekolah Dasar  Negeri Bandarharjo 03 menjadi SD Negeri Bandarharjo 02.</p>
                </div>
                <table>
                    <tr>
                        <td>Alamat Sekolah</td>
                        <td>Jl. Lodan Raya No. 1 Kota Semarang, Kelurahan Bandarharjo, Kecamatan Semarang Utara, Kota Semarang, Provinsi Jawa Tengah.</td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>(024) 3563228</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>sdnbandarharjo02semarang@gmail.com</td>
                    </tr>
                    <tr>
                        <td>Letak Geografis</td>
                        <td>
                            Utara : Pemukiman<br>
                            Timur : Pabrik<br>
                            Selatan : Pabrik<br>
                            Barat : Kali Semarang
                        </td>
                    </tr>
                </table>
                <div class="underline"></div>
            </div>
            
        </div>

        <div class="container-right">

            <div class="visi">
                <h1>visi</h1>
                <div class="underline"></div>
                <div class="content">
                    <p>"Membentuk manusia beriman, jujur, mandiri, beretika,
                        santun dalam budaya, unggul dalam IPTEK, dan
                        menciptakan lingkungan ramah anak serta fasilitatif
                        terhadap keragaman peserta didik."</p>
                </div>
    
            </div>
    
            <div class="misi">
                <h1>misi</h1>
                <div class="underline"></div>
                <div class="content">
                    <p>Menyiapkan sumber daya manusia yang berbudaya, cerdas, terampil, dan berbudi pekerti luhur, meningkatkan wawasan dan kreatifitas budaya.</p>
                    <p>Meningkatkan kualitas dan efektivitas proses belajar mengajar.</p>
                    <p>Menciptakan lingkungan sekolah yang kondusif, aman, dan nyaman.</p>
                    <p>Menumbuhkembangkan semangat berprestasi secara kompetetif, jujur, dan sportif.</p>
                    <p>Menumbuhkembangkan penghayatan dan pengalaman ajaran agama yang dianut atau kepercayaannya sehingga terbangun insan yang beriman, bertaqwa serta berakhlak mulia.</p>
                    <p>Memberikan fasilitasi pembelajaran pada anak berkebutuhan khusus sesuai kondisi yang dimiliki.</p>
                </div>

            </div>
        </div>
        
    </div>

    <div class="container-2">
        <div class="title">PENDIDIK DAN TENAGA KEPENDIDIKAN</div>
        <div class="cards">
            <div class="card-container-1">
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Foto Guru">
                    <div class="name">PURWANTO, S.Pd.SD</div>
                    <div class="position">KEPALA SEKOLAH</div>
                </div>
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Foto Guru">
                    <div class="name">PURWANTO, S.Pd.SD</div>
                    <div class="position">KEPALA SEKOLAH</div>
                </div>
            </div>
            <div class="card-container-2">
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Foto Guru">
                    <div class="name">PURWANTO, S.Pd.SD</div>
                    <div class="position">KEPALA SEKOLAH</div>
                </div>
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Foto Guru">
                    <div class="name">PURWANTO, S.Pd.SD</div>
                    <div class="position">KEPALA SEKOLAH</div>
                </div>
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Foto Guru">
                    <div class="name">PURWANTO, S.Pd.SD</div>
                    <div class="position">KEPALA SEKOLAH</div>
                </div>
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Foto Guru">
                    <div class="name">PURWANTO, S.Pd.SD</div>
                    <div class="position">KEPALA SEKOLAH</div>
                </div>
            </div>
            <div class="card-container-3">
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Foto Guru">
                    <div class="name">PURWANTO, S.Pd.SD</div>
                    <div class="position">KEPALA SEKOLAH</div>
                </div>
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Foto Guru">
                    <div class="name">PURWANTO, S.Pd.SD</div>
                    <div class="position">KEPALA SEKOLAH</div>
                </div>
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Foto Guru">
                    <div class="name">PURWANTO, S.Pd.SD</div>
                    <div class="position">KEPALA SEKOLAH</div>
                </div>
                <div class="card">
                    <img src="/assets/bandarharjo.jpeg" alt="Foto Guru">
                    <div class="name">PURWANTO, S.Pd.SD</div>
                    <div class="position">KEPALA SEKOLAH</div>
                </div>
            </div>
        </div>

        <div class="underline"></div>
    </div>
</body>

<?php 
include('/bandarharjo/partials/footer.php');
?>
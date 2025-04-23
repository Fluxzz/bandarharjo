<?php 
include('/bandarharjo/partials/header.php');

?>

<link rel="stylesheet" href="/css/kaldik.css">

<body>
<div class="container">

        <div class="navbar-item">
        
            <div class="navigation">
                <div class="title">
                    <h1>KALENDER PENDIDIKAN</h1>
                </div>
                <div class="nav-underline"></div>
                <div class="selection">
                    <div class="option active" onclick="switchTab(this, 'semarang')">
                        <p>KALDIK KOTA SEMARANG</p>
                    </div>
                    <div class="option" onclick="switchTab(this, 'lokal')">
                        <p>KALDIK SDN BANDARHARJO 02</p>
                    </div>
                    
                </div>
            </div>
            
            <div class="semarang-container" id="semarang-container">
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">KALDIK Semarang 2020/2021</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">KALDIK 2021/2022</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">KALDIK 2022/2023</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">KALDIK 2020/2021</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">KALDIK 2021/2022</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">KALDIK 2022/2023</span>
                    </div>
                </div>
            </div>
            
            
            <div class="lokal-container" id="lokal-container" style="display: none;">
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">KALDIK SDN Bandarharjo 2020/2021</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">KALDIK 2021/2022</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">KALDIK 2022/2023</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kalender">
                    <div class="card-text">
                        <span class="badge">KALDIK 2020/2021</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">KALDIK 2021/2022</span>
                    </div>
                </div>
                <div class="card">
                    <img src="/assets/calendar.jpg" alt="Kelas 2">
                    <div class="card-text">
                        <span class="badge">KALDIK 2022/2023</span>
                    </div>
                </div>
            </div>
            </div>
        </div>
</body>

<script src="/js/kaldik.js"></script>

<?php 
include('/bandarharjo/partials/footer.php');
?>
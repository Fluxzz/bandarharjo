function switchTab(element, target) {
    // Ubah status aktif pada tombol
    document.querySelectorAll('.option').forEach(option => {
        option.classList.remove('active');
    });
    element.classList.add('active');

    // Ambil elemen kontainer untuk semarang dan lokal
    var semarangContainer = document.getElementById('semarang-container');
    var lokalContainer = document.getElementById('lokal-container');
    
    // Tampilkan kontainer yang sesuai
    if (target === 'semarang') {
        semarangContainer.style.display = 'block'; // Atau 'flex' jika lebih sesuai dengan CSS Anda
        lokalContainer.style.display = 'none';
        window.history.pushState(null, null, "?kategori=semarang"); // Update URL dengan kategori semarang
    } else if (target === 'lokal') {
        semarangContainer.style.display = 'none';
        lokalContainer.style.display = 'block'; // Atau 'flex' jika lebih sesuai dengan CSS Anda
        window.history.pushState(null, null, "?kategori=sd"); // Update URL dengan kategori sd
    }
}

// Untuk memeriksa kategori saat halaman dimuat
document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const kategori = urlParams.get('kategori') || 'semarang'; // Default ke 'semarang'

    // Sesuaikan tab dan kontainer sesuai kategori
    if (kategori === 'semarang') {
        document.querySelector('.option[data-target="semarang"]').classList.add('active');
        document.getElementById('semarang-container').style.display = 'block';
        document.getElementById('lokal-container').style.display = 'none';
    } else if (kategori === 'sd') {
        document.querySelector('.option[data-target="lokal"]').classList.add('active');
        document.getElementById('semarang-container').style.display = 'none';
        document.getElementById('lokal-container').style.display = 'block';
    }
});
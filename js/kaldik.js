function switchTab(selected, target) {
    // Ubah status aktif pada tombol
    document.querySelectorAll('.option').forEach(option => {
        option.classList.remove('active');
    });
    selected.classList.add('active');

    // Tampilkan kontainer yang sesuai
    if (target === 'semarang') {
        document.getElementById('semarang-container').style.display = 'flex';
        document.getElementById('lokal-container').style.display = 'none';
    } else if (target === 'lokal') {
        document.getElementById('semarang-container').style.display = 'none';
        document.getElementById('lokal-container').style.display = 'flex';
    }
}
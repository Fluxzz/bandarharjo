function switchTab(selected, target) {
    // Ubah status aktif pada tombol
    document.querySelectorAll('.option').forEach(option => {
        option.classList.remove('active');
    });
    selected.classList.add('active');

    // Tampilkan kontainer yang sesuai
    if (target === 'prestasi-siswa') {
        document.getElementById('prestasi-siswa').style.display = 'flex';
        document.getElementById('sang-juara').style.display = 'none';
    } else if (target === 'sang-juara') {
        document.getElementById('prestasi-siswa').style.display = 'none';
        document.getElementById('sang-juara').style.display = 'flex';
    }
}
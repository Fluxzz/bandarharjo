function switchTab(selected, target) {
    // Ubah status aktif pada tombol
    document.querySelectorAll('.option').forEach(option => {
        option.classList.remove('active');
    });
    selected.classList.add('active');

    // Tampilkan kontainer yang sesuai
    const containers = ['mpls-container', 'ppdb-container', 'berita-container'];
    containers.forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            el.style.display = (id === target) ? 'flex' : 'none';
        }
    });
}

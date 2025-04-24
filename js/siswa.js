function switchTab(selected, target) {
    // Ubah status aktif pada tombol
    document.querySelectorAll('.option').forEach(option => {
        option.classList.remove('active');
    });
    selected.classList.add('active');

    // Tampilkan kontainer yang sesuai
    const containers = ['container-1', 'container-2', 'container-3'];
    containers.forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            el.style.display = (id === target) ? 'flex' : 'none';
        }
    });
}

// --- Tab Switching ---
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

// --- Tambah Data ---
function showAddForm() {
    const addFormContainer = document.getElementById('addFormContainer');
    if (addFormContainer) {
        addFormContainer.style.display = 'block';
    }
}

function hideAddForm() {
    const addFormContainer = document.getElementById('addFormContainer');
    if (addFormContainer) {
        addFormContainer.style.display = 'none';
    }
}

// --- Edit Data ---
function showEditForm(nama, nisn) {
    const editModal = document.getElementById("editModal");
    if (editModal) {
        document.getElementById("editNama").value = nama;
        document.getElementById("editNISN").value = nisn;
        document.getElementById("nisnLama").value = nisn;
        editModal.style.display = "block";
    }
}

function hideEditForm() {
    const editModal = document.getElementById("editModal");
    if (editModal) {
        editModal.style.display = "none";
    }
}

function closeEditForm() {
    hideEditForm();
}

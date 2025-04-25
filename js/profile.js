// Tampilkan Form Tambah
function openForm() {
    document.getElementById("form-container").style.display = "flex";
}

// Tutup Form Tambah
function closeForm() {
    document.getElementById("form-container").style.display = "none";
}

// Tampilkan Popup Hapus
function showDeletePopup(id) {
    const popup = document.getElementById("delete-user");
    popup.style.display = "flex";
    popup.dataset.idToDelete = id;
}

// Tutup Popup Hapus
function closePopup() {
    document.getElementById("delete-user").style.display = "none";
}

// Tampilkan Form Edit
function openEditForm() {
    document.getElementById('edit-form').style.display = 'block';
}

// Tutup Form Edit
function closeEditForm() {
    document.getElementById('edit-form').style.display = 'none';
}

// Notifikasi Sukses
function showSuccessMessage(message) {
    const alertBox = document.getElementById("success-alert");
    alertBox.textContent = message;
    alertBox.style.display = "block";

    setTimeout(() => {
        alertBox.style.display = "none";
    }, 3000);
}

// Fungsi Hapus Data (AJAX)
function deleteData() {
    const popup = document.getElementById("delete-user");
    const id = popup.dataset.idToDelete;

    fetch('hapus-pendidik.php?id=' + id, {
        method: 'POST'
    })
    .then(res => res.text())
    .then(data => {
        closePopup();
        showSuccessMessage("Data berhasil dihapus!");
        setTimeout(() => location.reload(), 1000); // reload halaman setelah notif
    })
    .catch(err => console.error(err));
}

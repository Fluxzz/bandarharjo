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

// Tampilkan popup konfirmasi hapus
function showDeletePopup(id) {
    const popup = document.getElementById("delete-user");
    popup.style.display = "flex";
    popup.dataset.idToDelete = id; // Simpan id yang akan dihapus
}

// Tutup popup hapus
function closePopup() {
    document.getElementById("delete-user").style.display = "none";
}

// Jalankan penghapusan data
function deleteData() {
    const popup = document.getElementById("delete-user");
    const id = popup.dataset.idToDelete;

    fetch(`hapus-pengumuman.php?id=${id}`)
        .then(response => {
            if (response.redirected) {
                // Redirect dilakukan di PHP jika berhasil
                window.location.href = response.url;
            } else {
                return response.text();
            }
        })
        .then(data => {
            // Jika tidak redirect, mungkin ada error
            if (data && !data.includes('<!DOCTYPE')) {
                alert("Gagal menghapus data: " + data);
            }
        })
        .catch(error => {
            console.error("Terjadi kesalahan saat menghapus:", error);
        });

    closePopup();
}

// Optional: tampilkan notifikasi sukses setelah redirect (bisa pakai alert atau banner)
window.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get("success") === "1") {
        alert("Pengumuman berhasil dihapus.");
    }
});

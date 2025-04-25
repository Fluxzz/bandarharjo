// Fungsi untuk menampilkan form edit di dalam modal
function showEditForm(nama, nisn) {
    document.getElementById("editNama").value = nama;
    document.getElementById("editNISN").value = nisn;
    document.getElementById("nisnLama").value = nisn; // Simpan NISN lama untuk update
    document.getElementById("editModal").style.display = "block"; // Tampilkan modal
    document.getElementById('edit-form').style.display = 'block';
    
}

// Fungsi untuk menyembunyikan modal
function hideEditForm() {
    document.getElementById("editModal").style.display = "none"; // Sembunyikan modal
    document.getElementById('edit-form').style.display = 'none';
}

        // Fungsi untuk menampilkan form edit
       

        // Fungsi untuk menutup form edit
        function closeEditForm() {
            
        }
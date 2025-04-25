// --- Sambutan Kepala Sekolah ---
// Ambil elemen tombol dan popup
const editBtn = document.getElementById('edit-btn');
const popupForm = document.getElementById('popupForm');
const closePopup = document.getElementById('close-popup');

// Saat tombol "Edit" diklik, tampilkan popup
if (editBtn && popupForm) {
  editBtn.addEventListener('click', () => {
    popupForm.style.display = 'flex';
  });
}

// Saat tombol "Kembali" diklik, sembunyikan popup
if (closePopup && popupForm) {
  closePopup.addEventListener('click', () => {
    popupForm.style.display = 'none';
  });
}


// --- Edit Data Siswa ---
function showEditForm(nama, nisn) {
  const editModal = document.getElementById("editModal");
  const editForm = document.getElementById("edit-form");
  if (editModal && editForm) {
    document.getElementById("editNama").value = nama;
    document.getElementById("editNISN").value = nisn;
    document.getElementById("nisnLama").value = nisn;
    editModal.style.display = "block";
    editForm.style.display = "block";
  }
}

function hideEditForm() {
  const editModal = document.getElementById("editModal");
  const editForm = document.getElementById("edit-form");
  if (editModal && editForm) {
    editModal.style.display = "none";
    editForm.style.display = "none";
  }
}

// Alias untuk closeEditForm jika dibutuhkan
function closeEditForm() {
  hideEditForm();
}

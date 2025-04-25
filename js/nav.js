// Fungsi untuk mengganti tab (semarang / lokal)
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

// Fungsi dijalankan saat DOM selesai dimuat
document.addEventListener("DOMContentLoaded", function () {
  const dropdownToggle = document.querySelector(".dropdown-toggle");
  const dropdownMenu = document.querySelector(".dropdown-menu");

  // Toggle tampilan dropdown saat tombol diklik
  dropdownToggle.addEventListener("click", function (e) {
      e.preventDefault();
      dropdownMenu.style.display =
          dropdownMenu.style.display === "block" ? "none" : "block";
  });

  // Menutup dropdown jika klik di luar elemen dropdown
  document.addEventListener("click", function (e) {
      if (!e.target.closest(".dropdown")) {
          dropdownMenu.style.display = "none";
      }
  });
});

const scrollAmount = 300; // jumlah scroll ke kiri/kanan
  
// ================= VIDEO SLIDER ===================
const videoSlider = document.getElementById('cardSlider');
const videoSlideLeft = document.getElementById('slide-left');
const videoSlideRight = document.getElementById('slide-right');

videoSlideLeft.addEventListener('click', () => {
  videoSlider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
});

videoSlideRight.addEventListener('click', () => {
  videoSlider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
});

// ================= FOTO SLIDER ====================
const fotoSlider = document.getElementById('fotoCardSlider');
const fotoSlideLeft = document.getElementById('foto-slide-left');
const fotoSlideRight = document.getElementById('foto-slide-right');

fotoSlideLeft.addEventListener('click', () => {
  fotoSlider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
});

fotoSlideRight.addEventListener('click', () => {
  fotoSlider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
});

// ================= TAB SWITCHING ==================
function switchTab(tab, containerId) {
  // Reset semua
  document.querySelectorAll('.option').forEach(option => option.classList.remove('active'));
  document.getElementById('vidio-container').style.display = 'none';
  document.getElementById('foto-container').style.display = 'none';

  // Aktifkan tab saat ini
  tab.classList.add('active');
  document.getElementById(containerId).style.display = 'block';
}
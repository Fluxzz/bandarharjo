const popupKaldik = document.getElementById("popupFormKaldik");
const btnKaldik = document.getElementById("btnTambahKaldik");

btnKaldik.onclick = function () {
  popupKaldik.style.display = "flex";
};

function tutupFormKaldik() {
  popupKaldik.style.display = "none";
}

window.onclick = function (event) {
  if (event.target == popupKaldik) {
    popupKaldik.style.display = "none";
  }
};
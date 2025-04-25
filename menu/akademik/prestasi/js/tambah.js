function openForm() {
    document.getElementById("popupForm").style.display = "block";
}

// Fungsi untuk menutup popup form
function closeForm() {
    document.getElementById("popupForm").style.display = "none";
}

function openPrestasiForm() {
    document.getElementById("popupPrestasiForm").style.display = "block";
}

function closePrestasiForm() {
    document.getElementById("popupPrestasiForm").style.display = "none";
}

// Menutup popup jika user klik di luar form
window.onclick = function(event) {
    if (event.target == document.getElementById("popupForm")) {
        closeForm();
    }
}
document.addEventListener("DOMContentLoaded", function () {
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const dropdownMenu = document.querySelector(".dropdown-menu");

    dropdownToggle.addEventListener("click", function (e) {
      e.preventDefault();
      dropdownMenu.style.display =
        dropdownMenu.style.display === "block" ? "none" : "block";
    });

    // Optional: Menutup dropdown jika klik di luar
    document.addEventListener("click", function (e) {
      if (!e.target.closest(".dropdown")) {
        dropdownMenu.style.display = "none";
      }
    });
  });
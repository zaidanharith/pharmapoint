const navToggle = document.querySelector("#nav-toggle");
const navMenu = document.querySelector("#nav-menu");
navToggle.addEventListener("click", function () {
  navToggle.classList.toggle("nav-toggle-active");
  navMenu.classList.toggle("hidden");
});

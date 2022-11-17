// sidebar toggle
const btnToggle = document.querySelector(".header__toggle-btn");
const sidebar = document.querySelector(".sidebar");
const body = document.querySelector(".body");

btnToggle.addEventListener("click", function () {
  body.classList.toggle("sidebar_open");
  sidebar.classList.toggle("active");
});

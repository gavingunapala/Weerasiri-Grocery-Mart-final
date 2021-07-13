//Selecting elements from DOM
const nav = document.querySelector(".nav-links");
const menuOpen = document.querySelector("#menu");
const menuClose = document.querySelector("#close");
const links = nav.querySelectorAll("li a");

//Setting up menu click
menuOpen.addEventListener("click", () => {
  nav.classList.toggle("nav-open");
  setTimeout(() => {
    menuClose.style.display = "block";
  }, 100);
});

//Setting up menu close click
menuClose.addEventListener("click", () => {
  nav.classList.toggle("nav-open");
  menuClose.style.display = "none";
});

//Setting up navigation menu clicks
links.forEach((link) => {
  link.addEventListener("click", () => {
    nav.classList.toggle("nav-open");
    menuClose.style.display = "none";
  });
});

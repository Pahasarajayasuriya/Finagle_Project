// let navbar = document.querySelector(".navbar");

// document.querySelector("#menu-btn").onclick = () => {
//   navbar.classList.toggle("active");
// };

// window.onscroll = () => {
//   navbar.classList.remove("active");
// };

// let slides = document.querySelectorAll(".home .slides-container .slide");
// let index = 0;

// function next() {
//   slides[index].classList.remove("active");
//   index = (index + 1) % slides.length;
//   slides[index].classList.add("active");
// }

// function prev() {
//   slides[index].classList.remove("active");
//   index = (index - 1 + slides.length) % slides.length;
//   slides[index].classList.add("active");
// }

document.addEventListener("DOMContentLoaded", function () {
  var navbar = document.querySelector(".navbar");

  window.addEventListener("scroll", function () {
      if (window.scrollY > 0) {
          navbar.style.backgroundColor = "white";
      } else {
          navbar.style.backgroundColor = "transparent";
      }
  });
});
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
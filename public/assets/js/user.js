document.addEventListener("DOMContentLoaded", function () {
   

    var navbar = document.querySelector(".navbar");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 0) {
            navbar.style.backgroundColor = "white";
        } else {
            navbar.style.backgroundColor = "transparent";
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        const prevButton = document.querySelector('.arrow-btn.left');
        const nextButton = document.querySelector('.arrow-btn.right');
        const productContainer = document.querySelector('.newly-added .row');
    
        const totalProducts = productContainer.childElementCount;
        let currentIndex = 0;
    
        function showProduct() {
            const productHeight = productContainer.children[0].offsetHeight;
            const newPosition = -currentIndex * productHeight;
            productContainer.style.top = newPosition + 'px';
        }
    
        function prevProduct() {
            if (currentIndex > 0) {
                currentIndex -= 1;
                showProduct();
            }
        }
    
        function nextProduct() {
            if (currentIndex + 1 < totalProducts) {
                currentIndex += 1;
                showProduct();
            }
        }
    
        // Add event listeners
        prevButton.addEventListener('click', prevProduct);
        nextButton.addEventListener('click', nextProduct);
    
        // Initial display
        showProduct();
    });
    



});



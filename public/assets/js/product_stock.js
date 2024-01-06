document.addEventListener("DOMContentLoaded", function() {
    const plusButtons = document.querySelectorAll(".plus-button");
    const minusButtons = document.querySelectorAll(".minus-button");
    const quantityElements = document.querySelectorAll(".quantity");

    plusButtons.forEach((plusButton, index) => {
        plusButton.addEventListener("click", function() {
            incrementQuantity(index);
        });
    });

    minusButtons.forEach((minusButton, index) => {
        minusButton.addEventListener("click", function() {
            decrementQuantity(index);
        });
    });

    function incrementQuantity(index) {
        let currentQuantity = parseInt(quantityElements[index].innerText);
        quantityElements[index].innerText = currentQuantity + 1;
    }

    function decrementQuantity(index) {
        let currentQuantity = parseInt(quantityElements[index].innerText);
        if (currentQuantity > 0) {
            quantityElements[index].innerText = currentQuantity - 1;
        }
    }
});

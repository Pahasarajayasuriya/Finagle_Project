const cartBtn = document.querySelector(".cart-btn"),
  cartModal = document.querySelector(".cart"),
  backDrop = document.querySelector(".backdrop"),
  closeModalBtn = document.querySelector(".cart-item-confirm");

cartBtn.addEventListener("click", showModal);
closeModalBtn.addEventListener("click", closeModal);
backDrop.addEventListener("click", closeModal);

function showModal() {
  backDrop.style.display = "block";
  cartModal.style.opacity = "1";
  cartModal.style.position = "fixed";
  cartModal.style.top = "21%";
}

function closeModal() {
  backDrop.style.display = "none";
  cartModal.style.opacity = "0";
  cartModal.style.top = "-100%";
}

const productsDOM = document.querySelector(".products-center"),
  cartTotal = document.querySelector(".cart-total"),
  cartItemsCounter = document.querySelector(".cart-items"),
  cartContent = document.querySelector(".cart-content"),
  clearCart = document.querySelector(".clear-cart"),
  searchInput = document.querySelector(".search");

let cart = [];
let buttonsDOM = [];

class UI {
  displayProducts(products) {
    let result = "";
    const groupedProducts = this.groupByCategory(products);

    for (const category in groupedProducts) {
      result += `<h2>${category}</h2>`;
      groupedProducts[category].forEach((item) => {
        result += `
      <div class="product">
        <div class="img-container">
          <img class="product-img" src="${item.image}" alt="${
          item.user_name
        }" />
        </div>
        <div class="product-desc">
          <p class="product-title">${item.user_name}</p>
          <div class="product-description">
            <p class="product-descrip">${item.category}</p>
          </div>
          <div class="product-description">
            <p class="product-descrip">Quantity: ${
              item.quantity > 0
                ? item.quantity
                : '<span class="out-of-stock">Out of stock</span>'
            }</p>
          </div>
          <div class="options">
            <p class="product-price">Rs.${item.price}.00</p>
            <button class="btn add-to-cart" data-id="${item.id}" ${
          item.quantity > 0 ? "" : "disabled"
        }>Add to Cart</button>
          </div>
        </div>
      </div>
    `;
      });
    }
    // Remove the local declaration of productsDOM
    productsDOM.innerHTML = result;

    // Update the method to get cart buttons dynamically
    // this.getCartBtns();
  }

  groupByCategory(products) {
    return products.reduce((grouped, product) => {
      const category = product.category;
      if (!grouped[category]) {
        grouped[category] = [];
      }
      grouped[category].push(product);
      return grouped;
    }, {});
  }
  updateCheckoutButtonState() {
    const checkoutButton = document.getElementById("checkout-button");
    if (cart.length > 0) {
      checkoutButton.removeAttribute("disabled");
    } else {
      checkoutButton.setAttribute("disabled", true);
    }
  }
  getCartBtns() {
    const addCartBtns = [...document.querySelectorAll(".add-to-cart")];
    buttonsDOM = addCartBtns;

    addCartBtns.forEach((btn) => {
      const id = btn.dataset.id;
      const isExist = cart.find((p) => p.id === id);

      if (isExist) {
        btn.textContent = "Added";
        btn.disabled = true;
      }

      btn.addEventListener("click", (e) => {
        const product = Storage.getProducts(id);
        if (product.quantity <= 0) {
          alert("Sorry, this product is out of stock.");
          return;
        }

        e.target.textContent = "Added";
        e.target.disabled = true;

        const addedProduct = { ...product, quantity: 1 };
        cart = [...cart, addedProduct];
        Storage.saveCart(cart);

        this.setCartValue(cart);
        this.addCartItem(addedProduct);
      });
    });
  }

  setCartValue(cart) {
    let tempCartItems = 0;
    let totalWeight = 0;

    const totalPrice = cart.reduce((acc, curr) => {
      tempCartItems += curr.quantity;
      totalWeight += weights[curr.category] * curr.quantity;

      return acc + curr.quantity * curr.price;
    }, 0);

    // Store the total weight in local storage
    localStorage.setItem("totalWeight", totalWeight);

    // Check if the total weight exceeds the limit
    if (totalWeight > 30) {
      Swal.fire({
        title: "Order too large",
        text: "Your order exceeds our delivery limit due to its large size. Please place your order as a pickup order.",
        icon: "warning",
      });
    }

    cartTotal.textContent = `Total price: Rs.${totalPrice.toFixed(2)}`;
    cartItemsCounter.textContent = tempCartItems;
  }

  addCartItem(cartItem) {
    const div = document.createElement("div");
    div.classList.add("cart-item");

    div.innerHTML = `
    <img
      class="cart-item-img"
      src="${cartItem.image}"
    />
  
    <div class="cart-item-desc">
      <h4>${cartItem.user_name}</h4>
      <h5>Rs.${cartItem.price}</h5>
    </div>
  
    <div class="cart-item-controller">
        <i class="ri-arrow-up-s-line arrow-up" data-id=${cartItem.id} ></i>
        <p class="quantity">${cartItem.quantity}</p>
        <i class="ri-arrow-down-s-line arrow-down" data-id=${cartItem.id} ></i>
      </div>
  
    <i class="ri-delete-bin-line trash" data-id=${cartItem.id} ></i>
    `;

    const arrowUp = div.querySelector(".arrow-up");
    arrowUp.addEventListener("click", (event) => {
      const product = Storage.getProducts(cartItem.id);
      if (product.quantity <= cartItem.quantity) {
        Swal.fire({
          title: "The Sorry, you can't add more of this product.",
          icon: "warning",
        });
        return;
      }
      cartItem.quantity++;
      event.target.parentElement.querySelector(".quantity").textContent =
        cartItem.quantity;
      this.setCartValue(cart);
      Storage.saveCart(cart);
    });

    this.updateCheckoutButtonState();
    cartContent.append(div);
  }

  //======> Save information when page refreshed <=====
  setUpApp() {
    //-> get cart from localStorage - update global cart
    cart = Storage.getCart() || [];

    //-> addCartItem to Modal
    cart.forEach((cartItem) => {
      const addedCart = document.querySelector(`[data-id="${cartItem.id}"]`);

      if (addedCart) {
        addedCart.textContent = "Added";
        addedCart.disabled = true;
      }

      //-> display added products in shopping cart
      this.addCartItem(cartItem);
    });

    // Update values: price + item
    this.setCartValue(cart);
  }

  //======> Shopping-Cart functionality <=====
  cartLogic() {
    clearCart.addEventListener("click", () => this.clearCart());

    cartContent.addEventListener("click", (e) => {
      let target = e.target;

      if (target.classList.contains("trash")) {
        removeItemFromCart(target);
      } else if (target.classList.contains("arrow-down")) {
        decreaseQuantity(target);
      }
    });

    const removeItemFromCart = (target) => {
      const removedItem = cart.find(
        (c) => c.id === parseInt(target.dataset.id)
      );

      this.removeItem(removedItem.id);
      Storage.saveCart(cart);
      cartContent.removeChild(target.parentElement);
    };

    const decreaseQuantity = (target) => {
      const subtractedItem = cart.find(
        (c) => c.id === parseInt(target.dataset.id)
      );

      if (subtractedItem.quantity === 1) {
        this.removeItem(subtractedItem.id);
        cartContent.removeChild(target.parentElement.parentElement);
      } else {
        subtractedItem.quantity--;
        target.previousElementSibling.textContent = subtractedItem.quantity;
        this.setCartValue(cart);
        Storage.saveCart(cart);
      }
    };
  }

  clearCart() {
    //-> get all carts and pass id to removeItem()
    cart.forEach((cItem) => this.removeItem(cItem.id));

    //-> remove cart-content children from Modal
    while (cartContent.children.length > 0) {
      cartContent.removeChild(cartContent.children[0]);
    }
    this.updateCheckoutButtonState();
    closeModal();
  }

  removeItem(id) {
    // console.log(id);
    //-> update cart
    cart = cart.filter((c) => c.id !== id);

    //-> update total price & cart items
    this.setCartValue(cart);
    this.updateCheckoutButtonState();
    //-> update localStorage
    Storage.saveCart(cart);

    //-> get carts  and update text and disabled
    const button = buttonsDOM.find(
      (btn) => parseInt(btn.dataset.id) === parseInt(id)
    );

    button.textContent = "Add to Cart";
    button.disabled = false;
  }

  //======> Search Products <======
  searchItem() {
    searchInput.addEventListener("input", (e) => {
      const searchValue = e.target.value.toLowerCase();

      const filteredProducts = productsData.filter((product) => {
        return product.user_name.toLowerCase().includes(searchValue);
      });

      if (filteredProducts.length === 0) {
        // Display the error message when no matching products are found
        this.displayErrorMessage("No products found.");
      } else {
        // Clear the error message when products are found
        this.clearErrorMessage();
      }

      this.displayProducts(filteredProducts);
      this.getCartBtns();
    });
  }

  displayErrorMessage(message) {
    const errorMessageElement = document.querySelector(".search-error");
    errorMessageElement.textContent = message;
    errorMessageElement.style.display = "block"; // Show the error message
  }

  clearErrorMessage() {
    const errorMessageElement = document.querySelector(".search-error");
    errorMessageElement.textContent = "";
    errorMessageElement.style.display = "none"; // Hide the error message
  }
}

/*==================== localStorage ===================*/
class Storage {
  // save loaded products and set "products" on localStorage
  static saveProducts(products) {
    localStorage.setItem("products", JSON.stringify(products));
  }

  static getProducts(id) {
    const _products = JSON.parse(localStorage.getItem("products"));

    // parseInt(): convert string to integer
    return _products.find((p) => p.id === parseInt(id));
  }

  static saveCart(cart) {
    localStorage.setItem("cart", JSON.stringify(cart));
    // console.log(cart);
  }

  static getCart() {
    return JSON.parse(localStorage.getItem("cart"));
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const ui = new UI();
  ui.displayProducts(productsData);
  ui.getCartBtns();
  ui.setUpApp();
  ui.cartLogic();
  ui.searchItem();
  ui.updateCheckoutButtonState();
  Storage.saveProducts(productsData);
});

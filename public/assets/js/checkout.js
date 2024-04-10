const sendAsGiftRadios = document.querySelectorAll(".send-as-gift-radio");
const paymentMethodRadios = document.querySelectorAll(".payment-method-radio");
const paymentDetailsSection = document.getElementById("paymentDetailsSection");
var checkoutForm = document.getElementById("checkoutForm");
const deliveryFee = 250;
var deliveryFeeContainer = document.querySelector(".delivery-fee");

const deliveryRadio = document.querySelector(
  'input[name="delivery_or_pickup"][value="delivery"]'
);
const pickupRadio = document.querySelector(
  'input[name="delivery_or_pickup"][value="pickup"]'
);

const pickupOutletsSection = document.getElementById("pickupOutletsSection");
const deliveryOrdersSection = document.getElementById("deliveryOrdersSection");
const pickupLocation = document.getElementById("pickupLocation");

deliveryRadio.addEventListener("change", enableDeliveryOptions);
pickupRadio.addEventListener("change", enablePickupOptions);

function enableDeliveryOptions() {
  pickupLocation.disabled = true;
  pickupOutletsSection.style.display = "none";
  deliveryOrdersSection.style.display = "block";
  // Add delivery fee to total price
  totalProductPrice += deliveryFee;
  // Update displayed total price
  totalProductPriceContainer.textContent = `Total Product Price: LKR ${totalProductPrice.toFixed(
    2
  )}`;
  // Display delivery fee
  deliveryFeeContainer.textContent = `Delivery Fee: LKR ${deliveryFee.toFixed(
    2
  )}`;
}

function enablePickupOptions() {
  pickupLocation.disabled = false;
  pickupOutletsSection.style.display = "block";
  deliveryOrdersSection.style.display = "none";
  // Remove delivery fee from total price
  totalProductPrice -= deliveryFee;
  // Update displayed total price
  totalProductPriceContainer.textContent = `Total Product Price: LKR ${totalProductPrice.toFixed(
    2
  )}`;
  // Hide delivery fee
  deliveryFeeContainer.textContent = "";
}

sendAsGiftRadios.forEach(function (radio) {
  radio.addEventListener("click", function () {
    sendAsGiftRadios.forEach(function (otherRadio) {
      if (otherRadio !== radio) {
        otherRadio.checked = false;
      }
    });
  });
});

paymentMethodRadios.forEach(function (radio) {
  radio.addEventListener("click", function () {
    paymentMethodRadios.forEach(function (otherRadio) {
      if (otherRadio !== radio) {
        otherRadio.checked = false;
      }
    });
  });
});

paymentMethodRadios.forEach(function (radio) {
  radio.addEventListener("click", function () {
    paymentDetailsSection.style.display =
      radio.value === "card" ? "block" : "none";
  });
});

var map;
var marker;
var infowindow;
var flag = true;

function initMap() {
  map = document.getElementById("map");

  map.addEventListener("mouseover", function () {
    var lat = document.querySelector('input[name="latitude"]').value;
    var lng = document.querySelector('input[name="longitude"]').value;

    if (lat && lng && flag) {
      var position = { lat: parseFloat(lat), lng: parseFloat(lng) };
      map = new google.maps.Map(document.getElementById("map"), {
        center: position,
        zoom: 8,
      });
      marker = new google.maps.Marker({
        position: position,
        map: map,
      });
    } else {
      navigator.geolocation.getCurrentPosition(function (pos, error) {
        if (error) {
          console.log(error);
        } else {
          map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: pos.coords.latitude, lng: pos.coords.longitude },
            zoom: 8,
          });
        }
      });
    }
    flag = false;
  });

  map.addEventListener("click", function (event) {
    if (marker) {
      marker.setMap(null);
    }

    marker = new google.maps.Marker({
      position: event.latLng,
      map: map,
    });

    // infowindow = new google.maps.InfoWindow({
    //     content: lat+','+ lng
    // });

    // infowindow.open(map, marker);

    google.maps.event.addEventListener(marker, "rightclick", function () {
      marker.setMap(null);
    });

    lat = event.latLng.lat();
    lng = event.latLng.lng();

    document.querySelector('input[name="latitude"]').value = lat;
    document.querySelector('input[name="longitude"]').value = lng;
  });
}
initMap();

// Summary of the cart items
var cartItems = localStorage.getItem("cart");
cartItems = cartItems ? JSON.parse(cartItems) : [];
console.log(cartItems);

function clearLocalStorage() {
  localStorage.removeItem("cart");
}

// Get reference to the cart summary list and total product price container
var cartSummaryList = document.querySelector(".cart-summary-list");
var totalProductPriceContainer = document.querySelector(".total-product-price");

// Clear previous content
cartSummaryList.innerHTML = "";
totalProductPriceContainer.innerHTML = "";

// Initialize total product price
var totalProductPrice = 0;

function displayCartSummary() {
  // Calculate the total cost
  cartItems.forEach(function (item) {
    var totalPriceForItem = item.price * item.quantity;
    totalProductPrice += totalPriceForItem;

    // Create a list item to display the item information
    var listItem = document.createElement("li");

    listItem.innerHTML = `
      <div class="product-details">
          <div class="product-image">
              <img src="${item.image}" alt="${
      item.user_name
    }" class="product-image"/>
          </div>
          <div class="other-details">
              <p class="user-name">${item.user_name}</p>
              <p class="quantity">${item.quantity}</p>
              <p class="total-price">${totalPriceForItem.toFixed(2)}</p>
          </div>
      </div>
      `;

    // Append the list item to the cart summary list
    cartSummaryList.appendChild(listItem);
  });

  // Add delivery fee to total price if delivery option is selected
  if (deliveryRadio.checked) {
    totalProductPrice += deliveryFee;
    // Display delivery fee
    deliveryFeeContainer.textContent = `Delivery Fee: LKR ${deliveryFee.toFixed(
      2
    )}`;
  }

  // Display the total product price
  totalProductPriceContainer.textContent = `Total Product Price: LKR ${totalProductPrice.toFixed(
    2
  )}`;
}

displayCartSummary();

checkoutForm.addEventListener("submit", function (event) {
  // Prevent the form from being submitted immediately
  event.preventDefault();

  // Add delivery fee to total cost if delivery option is selected
  var totalCost = totalProductPrice;
  // Set the total cost value
  document.getElementById("totalCost").value = totalCost.toFixed(2);

  // Remove old hidden inputs
  var oldInputs = document.querySelectorAll(".hidden-input");
  oldInputs.forEach(function (input) {
    input.remove();
  });

  // Add product_id and quantity as hidden inputs to the form
  cartItems.forEach(function (item, index) {
    var productIdInput = document.createElement("input");
    productIdInput.type = "hidden";
    productIdInput.name = "product_ids[]";
    productIdInput.value = item.id;
    productIdInput.classList.add("hidden-input");
    checkoutForm.appendChild(productIdInput);

    var quantityInput = document.createElement("input");
    quantityInput.type = "hidden";
    quantityInput.name = "quantities[]";
    quantityInput.value = item.quantity;
    quantityInput.classList.add("hidden-input");
    checkoutForm.appendChild(quantityInput);
  });

  // Submit the form
  checkoutForm.submit();
});

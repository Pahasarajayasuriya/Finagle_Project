const sendAsGiftRadios = document.querySelectorAll(".send-as-gift-radio");
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
  // Do not subtract delivery fee from total price
  // Update displayed total price
  totalProductPriceContainer.textContent = `Total Product Price: LKR ${totalProductPrice.toFixed(
    2
  )}`;
  // Hide delivery fee
  deliveryFeeContainer.textContent = "";
}


var map;
var marker;
var infowindow;
var flag = true;

function initMap() {
  var lat, lng; // Declare lat and lng here

  navigator.geolocation.getCurrentPosition(
    function (pos) {
      lat = pos.coords.latitude;
      lng = pos.coords.longitude;
      map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: lat, lng: lng },
        zoom: 8,
      });

      // Update the hidden input fields for latitude and longitude
      document.querySelector('input[name="latitude"]').value = lat;
      document.querySelector('input[name="longitude"]').value = lng;
      // Create a marker at the user's current location
      marker = new google.maps.Marker({
        position: { lat: lat, lng: lng },
        map: map,
      });

      // Create the autocomplete object, restricting the search predictions to
      // geographical location types.
      var autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("check_address"),
        {
          types: ["geocode"],
          componentRestrictions: {
            country: "LK",
          },
        }
      );

      // When the user selects an address from the drop-down, populate the
      // address fields in the form and place a marker on the map at the address.
      autocomplete.addListener("place_changed", function () {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
          window.alert("No details available for input: '" + place.name + "'");
          return;
        }

        // Set the position of the marker using the place ID and location.
        lat = place.geometry.location.lat();
        lng = place.geometry.location.lng();
        var position = { lat: lat, lng: lng };
        map.setCenter(position);
        marker.setPosition(position);

        // Update the hidden input fields for latitude and longitude
        document.querySelector('input[name="latitude"]').value = lat;
        document.querySelector('input[name="longitude"]').value = lng;
      });

      map.addListener("mouseover", function () {
        lat = document.querySelector('input[name="latitude"]').value;
        lng = document.querySelector('input[name="longitude"]').value;

        if (lat && lng && flag) {
          var position = { lat: parseFloat(lat), lng: parseFloat(lng) };
          map.setCenter(position);
          marker.setPosition(position); // Set the position of the marker
        }
        flag = false;
      });

      map.addListener("click", function (event) {
        if (marker) {
          marker.setMap(null);
        }

        marker = new google.maps.Marker({
          position: event.latLng,
          map: map,
        });

        google.maps.event.addListener(marker, "rightclick", function () {
          marker.setMap(null);
        });

        lat = event.latLng.lat();
        lng = event.latLng.lng();

        document.querySelector('input[name="latitude"]').value = lat;
        document.querySelector('input[name="longitude"]').value = lng;
      });
    },
    function (error) {
      console.log("Error occurred. Error code: " + error.code);
    }
  );
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

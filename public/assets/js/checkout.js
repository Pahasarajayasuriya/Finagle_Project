const sendAsGiftRadios = document.querySelectorAll(".send-as-gift-radio");
const paymentMethodRadios = document.querySelectorAll(".payment-method-radio");
const paymentDetailsSection = document.getElementById("paymentDetailsSection");

const deliveryRadio = document.querySelector(
  'input[name="delivery-pickup"][value="delivery"]'
);
const pickupRadio = document.querySelector(
  'input[name="delivery-pickup"][value="pickup"]'
);

const pickupOutletsSection = document.getElementById("pickupOutletsSection");
const deliveryOrdersSection = document.getElementById("deliveryOrdersSection");
const pickupLocation = document.getElementById("pickupLocation");

deliveryRadio.addEventListener("change", enableDeliveryOptions);
pickupRadio.addEventListener("change", enablePickupOptions);

function enableDeliveryOptions() {
  pickupLocation.disabled = true;
  pickupOutletsSection.style.display = "none"; // Hide pickup outlets list
  deliveryOrdersSection.style.display = "block"; // Show delivery orders section
}

function enablePickupOptions() {
  pickupLocation.disabled = false;
  pickupOutletsSection.style.display = "block"; // Show pickup outlets list
  deliveryOrdersSection.style.display = "none"; // Hide delivery orders section
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
    // Toggle the selection when the user clicks on a radio button
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


// Get reference to the cart summary list and total product price container
var cartSummaryList = document.querySelector('.cart-summary-list');
var totalProductPriceContainer = document.querySelector('.total-product-price');

// Clear previous content
cartSummaryList.innerHTML = '';
totalProductPriceContainer.innerHTML = '';

// Initialize total product price
var totalProductPrice = 0;

// Loop through each item in the cart
cartItems.forEach(function (item) {
  // Calculate total price for the current item
  var totalPriceForItem = item.price * item.quantity;

  // Add the total price for the current item to the overall total product price
  totalProductPrice += totalPriceForItem;

  // Create a list item to display the item information
  var listItem = document.createElement('li');

  listItem.innerHTML = `
   <div class="product-details">
    <div class="product-image">
        <img src="${item.image}" alt="${item.user_name}" class="product-image"/>
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


// Display the total product price

totalProductPriceContainer.innerHTML = `
 <div class="total-price-container">
  <div class="total-label">TOTAL:</div>
  <div class="price-label">LKR ${totalProductPrice.toFixed(2)}</div>
 </div>
`;
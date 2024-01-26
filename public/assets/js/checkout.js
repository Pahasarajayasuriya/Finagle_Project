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
  // closeViewBtn = document.getElementById("closeViewBtn");
  // closeViewBtn.addEventListener('click', function () {
  //     if(marker){
  //         marker.setMap(null);
  //     }
  // });
}
// document.addEventListener("DOMContentLoaded", function () {
//   initMap();
// });
initMap();
const deliveryRadio = document.querySelector(
  'input[name="delivery-pickup"][value="delivery"]'
);
const pickupRadio = document.querySelector(
  'input[name="delivery-pickup"][value="pickup"]'
);

const sendAsGiftRadios = document.querySelectorAll('.send-as-gift-radio');
const paymentMethodRadios = document.querySelectorAll('.payment-method-radio');
const paymentDetailsSection = document.getElementById('paymentDetailsSection');

const pickupLocation = document.getElementById("pickupLocation");

deliveryRadio.addEventListener("change", enableDeliveryOptions);
pickupRadio.addEventListener("change", enablePickupOptions);

function enableDeliveryOptions() {
  pickupLocation.disabled = true;
}

function enablePickupOptions() {
  pickupLocation.disabled = false;
}

sendAsGiftRadios.forEach(function(radio) {
    radio.addEventListener('click', function() {
        sendAsGiftRadios.forEach(function(otherRadio) {
            if (otherRadio !== radio) {
                otherRadio.checked = false;
            }
        });
    });
});

paymentMethodRadios.forEach(function(radio) {
    radio.addEventListener('click', function() {
        // Toggle the selection when the user clicks on a radio button
        paymentMethodRadios.forEach(function(otherRadio) {
            if (otherRadio !== radio) {
                otherRadio.checked = false;
            }
        });
    });
});

paymentMethodRadios.forEach(function(radio) {
    radio.addEventListener('click', function() {
        paymentDetailsSection.style.display = radio.value === 'card' ? 'block' : 'none';
    });
});
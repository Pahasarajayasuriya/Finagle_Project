function changeQuantity(productId, action) {
  var quantityElement = document.getElementById('quantity_' + productId);
  
  var productQtyInput = document.getElementById('updated_quantity_' + productId)

  var currentQuantity = parseInt(quantityElement.innerHTML);

  // Update the frontend display
  if (action === 'increase') {
      quantityElement.innerHTML = currentQuantity + 1;
      productQtyInput.value = currentQuantity + 1;

  } else if (action === 'decrease' && currentQuantity > 0) {
      quantityElement.innerHTML = currentQuantity - 1;
      productQtyInput.value = currentQuantity - 1;
  }

  updateQuantityInDatabase(productId, quantityElement.innerHTML);

}

document.addEventListener('input', function() {
  
  var productId = this.getAttribute('data-product-id');
  console.log(productId);

  var newQuantity = parseInt(this.innerHTML);

  if (!isNaN(newQuantity)) {
      updateQuantityInDatabase(productId, newQuantity);
  } else {
      alert('Please enter a valid quantity.');
      this.innerHTML = this.getAttribute('data-original-value'); 
  }
});

element.addEventListener('focus', function() {
  this.setAttribute('data-original-value', this.innerHTML);
});




function updateQuantities() {
  var updatedQuantities = {};
  var quantityElements = document.querySelectorAll('.quantity');

  // Loop through all quantity elements to gather updated quantities
  quantityElements.forEach(function(element) {
      var productId = element.getAttribute('data-product-id');
      var newQuantity = parseInt(element.innerHTML);

      // Ensure the new quantity is a valid number
      if (!isNaN(newQuantity)) {
          updatedQuantities[productId] = newQuantity;
      }
  });

  // Send the updated quantities to the server
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
          if (xhr.status === 200) {
              // Handle the response from the backend if needed
              console.log(xhr.responseText);
          } else {
              console.error('Failed to update quantities.');
          }
      }
  };

  xhr.open("POST", "update_quantities.php", true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(updatedQuantities));
}

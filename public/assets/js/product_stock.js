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

function updateQuantityInDatabase(productId, newQuantity) {
  // Use AJAX to send the updated quantity to the backend
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          // Handle the response from the backend if needed
          console.log(xhr.responseText);
      }
  };

  xhr.open("POST", "update_quantity.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("productId=" + productId + "&newQuantity=" + newQuantity);
}
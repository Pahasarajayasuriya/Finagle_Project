// Get the order ID from the global orderId variable
var orderId = orderId;
// console.log(orderId);
const one = document.querySelector(".progress.one");
const two = document.querySelector(".progress.two");
const three = document.querySelector(".progress.three");
const four = document.querySelector(".progress.four");

function updateProgressBar() {
  fetch(
    "http://localhost/finagle/public/progressbar/getOrderStatusJson?orderId=" +
      orderId
  )
    .then((response) => response.text()) // Get the response as text
    .then((text) => {
      // console.log(text); // Log the response text

      // Try to parse the response text as JSON
      try {
        const data = JSON.parse(text);
        const currentOrderStatus = data.orderStatus.toLowerCase(); // Get the order status from the JSON data
        // console.log(currentOrderStatus);

        // Reset the progress bar
        one.classList.remove("active");
        two.classList.remove("active");
        three.classList.remove("active");
        four.classList.remove("active");

        // Update the progress bar based on the current order status
        switch (currentOrderStatus) {
          case "order placed":
            one.classList.add("active");
            break;
          case "order preparing":
            one.classList.add("active");
            two.classList.add("active");
            break;
          case "order dispatch":
            one.classList.add("active");
            two.classList.add("active");
            three.classList.add("active");
            break;
          case "order delivered":
            one.classList.add("active");
            two.classList.add("active");
            three.classList.add("active");
            four.classList.add("active");
            break;
          case "order cancelled":
            window.location.href = 'http://localhost/finagle/public/ordercancel?orderId=' + orderId;
            break;
        }
      } catch (error) {
        console.error("Error parsing JSON:", error);
      }
    });
}
updateProgressBar(); // Call updateProgressBar immediately

// Call updateProgressBar every 60 seconds
setInterval(updateProgressBar, 60000);

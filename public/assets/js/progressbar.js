const one = document.querySelector(".one");
const two = document.querySelector(".two");
const three = document.querySelector(".three");
const four = document.querySelector(".four");

// This function fetches the current order status from the server and updates the progress bar
function updateProgressBar() {
  fetch('http://localhost/finagle/public/progressbar/getOrderStatusJson')
    .then(response => response.text())  // Get the response as text
    .then(text => {
      console.log(text);  // Log the response text to the console

      // Try to parse the response text as JSON
      try {
        const data = JSON.parse(text);
        const orderStatus = data.orderStatus;

        // Reset the progress bar
        one.classList.remove("active");
        two.classList.remove("active");
        three.classList.remove("active");
        four.classList.remove("active");

        // Update the progress bar based on the current order status
        switch(orderStatus) {
          case 'order placed':
            one.classList.add("active");
            break;
          case 'order preparing':
            one.classList.add("active");
            two.classList.add("active");
            break;
          case 'order dispatch':
            one.classList.add("active");
            two.classList.add("active");
            three.classList.add("active");
            break;
          case 'order delivered':
            one.classList.add("active");
            two.classList.add("active");
            three.classList.add("active");
            four.classList.add("active");
            break;
        }
      } catch (error) {
        console.error('Error parsing JSON:', error);
      }
    });
}
updateProgressBar();  // Call updateProgressBar immediately

// Call updateProgressBar every 60 seconds
setInterval(updateProgressBar, 60000);
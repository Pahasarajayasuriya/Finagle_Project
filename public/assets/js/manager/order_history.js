document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    const orderList = document.getElementById('orderList');

    searchInput.addEventListener('input', () => {
        const searchValue = searchInput.value.toLowerCase();

        // Fetch orders based on the search value (you need to implement this)
        const filteredOrders = fetchFilteredOrders(searchValue);

        // Update the order list with the filtered orders or show a message
        updateOrderList(filteredOrders);
    });

    // Initial fetch and display of all orders
    const allOrders = fetchAllOrders();
    updateOrderList(allOrders);
});

// Function to fetch all orders (you need to implement this)
function fetchAllOrders() {
    // Example: You may fetch orders from a database or an API
    return [
        { orderNumber: '12345', date: 'October 1, 2023', total: 1950.00, status: 'Delivered' },
        { orderNumber: '89566', date: 'October 5, 2023', total: 7500.00, status: 'Delivered' },
        { orderNumber: '56900', date: 'December 7, 2023', total: 3500.00, status: 'Rejected' },
        // Add more orders as needed
    ];
}

// Function to fetch orders based on the search value (you need to implement this)
function fetchFilteredOrders(searchValue) {
    // Example: You may filter orders based on order number
    return fetchAllOrders().filter(order => order.orderNumber.toLowerCase().includes(searchValue));
}

// Function to update the order list on the page
function updateOrderList(orders) {
    const orderList = document.getElementById('orderList');
    orderList.innerHTML = '';

    if (orders.length === 0) {
        const li = document.createElement('li');
        li.textContent = 'Order not found';
        orderList.appendChild(li);
    } else {
        orders.forEach(order => {
            const div = document.createElement('div');
            div.className = 'history-container';

            const statusColor = order.status === 'Delivered' ? 'green' : order.status === 'Rejected' ? 'red' : 'black';

            div.innerHTML = `
                <div class="order">
                    <h3 class="order-id"> Order #${order.orderNumber}</h3>

                  <div class="order-details">
                    <p class="topic">ORDERED ON </p>
                    <h4> ${order.date}</h4>
                    

                    <p class="topic">PRICE </p>
                    <h4> Rs. ${order.total.toFixed(2)}</h4>
                    

                    <p class="topic">STATUS </p>
                    <h4 class="status" style="color: ${statusColor};"> ${order.status}</h4>
                    

                  </div>
                </div>
            `;
            orderList.appendChild(div);
        });
    }
}




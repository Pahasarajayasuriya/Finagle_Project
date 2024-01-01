document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    const advertisementList = document.getElementById('productList');

    searchInput.addEventListener('input', () => {
        const searchValue = searchInput.value.toLowerCase();

        // Fetch branches based on the search value (you need to implement this)
        const filteredProducts = fetchFilteredProducts(searchValue);

        // Update the branch list with the filtered branches
        updateProductsList(filteredProducts);
    });

    // Initial fetch and display of all branches
    const allProducts = fetchAllProducts();
    updateProductsList(allProducts);
});

// Function to fetch all branches (you need to implement this)
function fetchAllProducts() {
    // Example: You may fetch branches from a database or an API
    return [
        {
            id: 1,
            title: "Burger Buns",
            price: 500,
            imageUrl:
              "./images/burger-bun.jpg",
          },
        
          {
            id: 6,
            title: "Sandwitch Bread",
            price: 200,
            imageUrl: "./images/sandwich_bread.jpg",
          },
        
          {
            id: 7,
            title: "Crust Top Bread",
            price: 250,
            imageUrl: "./images/crust-top-bread.jpg",
          },
        
        //   {
        //     id: 8,
        //     title: "Multiseed Low GI Bread",
        //     price: 400,
        //     imageUrl: "./images/multi_seed.jpg",
        //   },
        
        //   {
        //     id: 9,
        //     title: "Kurakkan Enriched Diet Bread",
        //     price: 420,
        //     imageUrl: "./images/diet-bread.jpg",
        //   },
    ];
}


function fetchFilteredProducts(searchValue) {
    return fetchAllProducts().filter(product =>
        product.id.toString().includes(searchValue) ||
        product.title.toLowerCase().includes(searchValue) ||
        product.price.toString().includes(searchValue)
    );
}

function updateProductsList(products) {
    const productList = document.getElementById('productList');
    productList.innerHTML = '';

    if (products.length === 0) {
        const div = document.createElement('div');
        div.textContent = 'Product not found';
        productList.appendChild(div);
    } else {
        const headerDiv = document.createElement('div');
        headerDiv.className = 'advertisement-table';
        headerDiv.innerHTML = `
            <div class="advertisement-header">
                <div class="ad-image"></div>
                <div class="ad-id">ID</div>
                <div class="ad-description">Product Name</div>
                <div class="ad-date">Price</div>
            </div>
        `;
        productList.appendChild(headerDiv);

        products.forEach(product => {

            const div = document.createElement('div');
            div.className = 'advertisement-container';
           
            div.innerHTML = `
                <div class="advertisement-record">
                    <div class="advertisement-image"> <img src="${product.imageUrl}" alt="${product.id}" class="customer-image"></div>
                    <div class="advertisement-id">${product.id}</div>
                    <div class="advertisement-name">${product.title}</div>
                    <div class="advertisement-date">${product.price}</div>
                    <div class="advertisement-actions">
                       <button class="edit-button" onclick="openEditPopupDialog('${product.id}', '${product.title}', '${product.price}')">Edit Product</button>

                    </div>
                    
                </div>
            `;
            productList.appendChild(div);
        });
    }
}


function openReport() {
    const popupContainer = document.getElementById('popupContainer');
    const overlay = document.getElementById('overlay');

    popupContainer.classList.add('show');
    overlay.classList.add('show');
}

function closePopup() {
    const popupContainer = document.getElementById('popupContainer');
    const overlay = document.getElementById('overlay');

    popupContainer.classList.remove('show');
    overlay.classList.remove('show');
}

function submitForm() {
    // Add your form submission logic here
    
    // Close the popup and overlay after submitting the form
    closePopup();
}


function openEditPopupDialog( description, end_date) {
    const editDescriptionInput = document.getElementById('editDescription');
    const editEndDateInput = document.getElementById('editEndDate');

    // Populate the edit pop-up with current advertisement details
    editDescriptionInput.value = description;
    editEndDateInput.value = end_date;

    openEditPopupDialog();

}

function openEditPopupDialog() {
    const editPopupContainer = document.getElementById('editPopupContainer');
    const overlay = document.getElementById('overlay');

    editPopupContainer.classList.add('show');
    overlay.classList.add('show');
}



function closeEditPopup() {
    const editPopupContainer = document.getElementById('editPopupContainer');
    const overlay = document.getElementById('overlay');

    editPopupContainer.classList.remove('show');
    overlay.classList.remove('show');
}

function submitEditForm() {
    // Add your logic to submit the edited form
    
    // Close the edit popup and overlay after submitting the form
    closeEditPopup();
}

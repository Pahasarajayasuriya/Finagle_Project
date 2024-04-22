document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('search');
  const branchList = document.getElementById('productList');

  searchInput.addEventListener('input', () => {
      const searchValue = searchInput.value.toLowerCase();

      // Fetch branches based on the search value (you need to implement this)
      const filteredProducts = fetchFilteredProducts(searchValue);

      // Update the branch list with the filtered branches
      updateProductList(filteredProducts);
  });

  // Initial fetch and display of all branches
  const allProducts = fetchAllProducts();
  updateProductList(allProducts);
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
      
        {
          id: 8,
          title: "Multiseed Low GI Bread",
          price: 400,
          imageUrl: "./images/multi_seed.jpg",
        },
      
        {
          id: 9,
          title: "Kurakkan Enriched Diet Bread",
          price: 420,
          imageUrl: "./images/diet-bread.jpg",
        },
      
       
      
       
      
      
  ];
}

// Function to fetch branches based on the search value (you need to implement this)
function fetchFilteredProducts(searchValue) {
  // Example: You may filter branches based on branch name or ID
  return fetchAllProducts().filter((product) =>
      product.title.toLowerCase().includes(searchValue) ||
      product.id.toString().includes(searchValue)
  );
}
// ...

function updateProductList(products) {
  const productList = document.getElementById('productList');
  productList.innerHTML = '';

  if (products.length === 0) {
      const div = document.createElement('div');
      div.textContent = 'Product not found';
      productList.appendChild(div);
  } else {
      products.forEach(product => {
          const div = document.createElement('div');
          div.classList.add("product-container");
          div.innerHTML = `
              <img src="${product.imageUrl}" alt="${product. title}" class="branch-image">
              <div class="branch-details">
                <div class="row">
                  <h3 class="branch-title">${product. title}</h3>
                  <p class="branch-id">ID: ${product.id}</p>
                </div>
                <p class="branch-price">Rs. ${product.price}.00</p>
               
               
              </div>
          `;
          productList.appendChild(div);
      });
  }
}


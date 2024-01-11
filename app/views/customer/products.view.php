<?php
$role = "User";
$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>
<?php
// include_once(__DIR__ . '/../../models/ProductModel.php');

// $productModel = new ProductModel();
// $products = $productModel->getProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/products.css">
    <title>Products</title>

    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
    <!--Fonts-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.3.0/remixicon.css" integrity="sha512-0JEaZ1BDR+FsrPtq5Ap9o05MUwn8lKs2GiCcRVdOH0qDcUcCoMKi8fDVJ9gnG8VN1Mp/vuWw2sMO0SQom5th4g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>
    <?php $this->view('includes/cus_topbar', $data); ?>
    <div class="home-section">
        <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
        <h2 class="section-title">OUR PRODUCTS</h2>
        <div class="divider dark mb-4">
            <div class="icon-wrap">
                <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i> -->
            </div>
        </div>
        <div class="product-search">
            <form action="#">
                <div class="ad-form-input">
                    <input class="search" type="search" id="search" placeholder="Search...">
                    <button type="submit" class="ad-search-btn">
                        <i class='bx bx-search'></i>
                    </button>
                </div>
            </form>

            <div class="cart-btn">
                <span class="nav-icon">
                    <i class="fas fa-shopping-cart"></i>
                </span>
                <div class="cart-items">0</div>
            </div>
            <!-- <div class="cart-button">
                <i class="fas fa-shopping-cart"></i>

            </div> -->
            <div class="search-error"></div>
        </div>
        <div class="products-center">
            <?php foreach ($data['products'] as $product) : ?>
                <div class="product">
                    <div class="img-container">
                        <img class="product-img" src="<?= $product->image ?>" alt="<?= $product->name ?>" />
                    </div>
                    <div class="product-desc">
                        <p class="product-title"><?= $product->name ?></p>
                        <div class="product-description">
                            <p class="product-descrip"><?= $product->category ?></p>
                        </div>
                        <div class="options">
                            <p class="product-price">Rs.<?= $product->price ?>.00</p>
                            <button class="btn add-to-cart" data-id="<?= $product->id ?>">Add to Cart</button>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <section class="cart-modal">
            <div class="backdrop"></div>

            <div class="cart">
                <h3 class="cart-title">Your Cart</h3>

                <!--# cart-body #-->
                <div class="cart-content">
                    <!-- <div class="cart-item">

            <img
              class="cart-item-img"
              src="./images/burger-bun.jpg"
            />

            <div class="cart-item-desc">
              <h4>product title</h4>
              <h5> 120</h5>
            </div>

             <div class="cart-item-controller">
              <i class="ri-arrow-up-s-line arrow-up"  ></i>
              <p>5</p>
              <i class="ri-arrow-down-s-line arrow-down" ></i>
            </div>

            <i class="ri-delete-bin-line trash" ></i>

          
            
          </div> -->
                </div>
                <div class="cart-footer">
                    <div class="">
                        <span class="cart-total">Total price: Rs.90</span>
                    </div>
                    <div class="">
                        <button class="btn clear-cart">Clear</button>
                        <button class="btn cart-item-confirm" id="checkout-button">Checkout</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    <script>
        let cart = [];
        document.getElementById("checkout-button").addEventListener("click", function() {
            // Check if the user is logged in and if there is at least 1 product in the cart
            if (isLoggedIn() && cartHasProducts()) {
                window.location.href = "<?= ROOT ?>/checkout";
            } else {
                // Redirect to the login page if the user is not logged in
                // or display an alert if the cart is empty
                if (!isLoggedIn()) {
                    window.location.href = "<?= ROOT ?>/login";
                } else {
                    alert("Your cart is empty. Please add at least 1 product to proceed to checkout.");
                    // Alternatively, redirect to another page
                     window.location.href = "<?= ROOT ?>/products"; 
                }
            }
        });

        const productsData = <?= json_encode($data['products']) ?>;

        // Function to check if the user is logged in
        function isLoggedIn() {
            // You may need to modify this logic based on how you determine if a user is logged in
            return <?php echo (Auth::logged_in()) ? 'true' : 'false'; ?>;
        }

        // Function to check if the cart has at least 1 product
        function cartHasProducts() {
            // You may need to modify this logic based on how you track cart items
            return (cart.length > 0); // Assuming cart is an array of items
        }
    </script>



    <script type="module" src="<?= ROOT ?>/assets/js/product.js"></script>
</body>

</html>
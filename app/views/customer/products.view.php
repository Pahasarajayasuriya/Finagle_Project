<?php
$role = "User";
$data['role'] = $role;
$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
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

            <div class="search-error"></div>
        </div>
        <div id="message-error-container"></div>



        <div class="categories">
            <div class="category-item"  id="bread" data-category="Bread & Buns">
                <div class="p-4">
                    <i class='bx bx-badge bx-tada'></i>
                    <h5 class="category-title">Bread & Buns</h5>
                </div>
            </div>
            <div class="category-item" id="cakes" data-category="Cakes">
                <div class="p-4">
                    <i class='bx bxs-cake bx-tada'></i>
                    <h5 class="category-title">Cakes</h5>
                </div>
            </div>
            <div class="category-item" id="frozen" data-category="Frozen Foods">
                <div class="p-4">
                    <i class='bx bxs-pizza bx-tada'></i>
                    <h5 class="category-title">Frozen Foods</h5>
                </div>
            </div>
        </div>


        <div class="products-center">
            <?php foreach ($productsByCategory as $category => $products) : ?>
                <div class="category-container">
                    <h2 class="section-title"><?= $category ?></h2>
                    <div class="products">
                        <?php foreach ($products as $product) : ?>
                            <div class="product">
                                <div class="img-container">
                                    <img class="product-img" src="<?= ROOT . '/' . ($product->image) ?>" alt="<?= esc($product->user_name) ?>" />
                                </div>
                                <div class="product-desc">
                                    <p class="product-title"><?= esc($product->user_name) ?></p>
                                    <div class="product-description">
                                        <p class="product-descrip"><?= esc($product->category) ?></p>
                                    </div>
                                    <div class="product-description">
                                        <p class="product-descrip">Quantity: <?= esc($product->quantity) ?></p>
                                    </div>
                                    <div class="options">
                                        <p class="product-price">Rs.<?= esc($product->price) ?>.00</p>
                                        <button class="btn add-to-cart" data-id="<?= $product->id ?>">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
                </div>
                <div class="cart-footer">
                    <div class="">
                        <span class="cart-total">Total price: Rs.00</span>
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
    <!-- HTML structure for the message container -->

    <script>
        const weights = <?= json_encode($data['weights']) ?>;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById("checkout-button").addEventListener("click", function() {
            if (isLoggedIn()) {
                window.location.href = "<?= ROOT ?>/checkout";
            } else {
                displayMessage("Please log in before placing an order");
                setTimeout(function() {
                    window.location.href = "<?= ROOT ?>/login";
                }, 3000);
            }
        });


        const productsData = <?= json_encode($data['products']) ?>;

        function isLoggedIn() {
            return <?php echo (Auth::is_customer()) ? 'true' : 'false'; ?>;
        }


        function displayMessage(message) {
            const messageContainer = document.getElementById("message-error-container");
            messageContainer.innerHTML = message;
            messageContainer.style.display = "block";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module" src="<?= ROOT ?>/assets/js/product.js"></script>
</body>

</html>
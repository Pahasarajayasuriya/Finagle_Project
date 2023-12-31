<?php
$role = "User";
// require_once '../../Components/NavBar/header.php';
// require_once '../../Components/NavBar/NavBar.php';
// require_once '../../Components/NavBar/footer.php';
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

    <!--FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-rwsk1BGvQx5JrLHoi9fj7I01Aph5FfAs91nCl4azgazl7HdjL2vF8A1krkYNTl1f" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>
    <!-- <div class="navbar">
        <div class="logo_icon">
            <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
        </div>
        <div class="navbar-links">
            <a href="signup.php" class="signup">Sign Up</a>
            <span><a href="login.php" class="login">Log In</a></span>
        </div>

    </div> -->
    <?php
    $this->view('includes/cus_topbar', $data);
    ?>

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
                    <input type="search" id="search" placeholder="Search...">
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
        </div>
        <div class="container">
            <div class="products-center">
                <!-- Product-1 -->
                <!-- <div class="product">
                  <div class="img-container">
                    <img
                      class="product-img"
                      src="<?= ROOT ?>/assets/images/burger-bun.jpg"
                      alt="p-1"
                    />
                  </div>

                  <div class="product-desc">
                    <p class="product-title">
                      Burger Buns
                    </p>

                     <div class="options">
                        <p class="product-price">Rs.500</p>
                  

                        <button class="add-to-cart">Add to Cart <i class="fas fa-shopping-cart fa-3x text-primary mb-4"></i></button>
                     </div>
                  </div>
                </div> -->
                <!--  -->
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
              src="<?= ROOT ?>/assets/images/burger-bun.jpg"
            />

            <div class="cart-item-desc">
              <h4>product title</h4>
              <h5> 120</h5>
            </div>

            <div class="cart-item-controller">
              <i class="ri-arrow-up-s-line"></i>
              <p>1</p>
              <i class="ri-arrow-down-s-line"></i>
            </div>

            <i class="ri-delete-bin-line"></i>
            
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
        document.getElementById("checkout-button").addEventListener("click", function() {
            window.location.href = "checkout.php";
        });
    </script>

    <script type="module" src="<?= ROOT ?>/assets/js/product.js"></script>
</body>

</html>
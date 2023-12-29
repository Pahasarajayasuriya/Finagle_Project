<?php
// session_start();
// $_SESSION['role'] = "User";

// include '../includes/header.view.php';
// include '../includes/NavBar.view.php';
// require_once '../includes/footer.view.php';
$role = "User";

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst(App::$page) ?> - <?= APPNAME ?></title>


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


    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user.css">
</head>

<body>
    <div class="navbar">
        <div class="logo_icon">
            <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
        </div>
        <div class="navbar-links">
            <div class="user-buttons">
                <?php if (!Auth::logged_in()) : ?>
                    <a class="signup" href="<?= ROOT ?>/signup">Signup</a>
                    <a class="login" href="<?= ROOT ?>/login">Login</a>
                <?php else : ?>
                    <div class="user_navbar">
                        <div class="dropdown">
                            <button class="dropbtn">Hi, <?= Auth::getUsername() ?>
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                                <a href="<?= ROOT ?>/cus_profile">Profile</a>
                                <a href="<?= ROOT ?>/cus_edit_profile">Edit Profile</a>
                                <a href="<?= ROOT ?>/Logout">Logout</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <style>
        .image-container {
            position: relative;
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: auto;
            display: none;
        }

        .text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            color: #fff;
        }
    </style>

    <div class="home-section">
        <div class="page-container">
            <div class="image-container">
                <img src="<?= ROOT ?>/assets/images/banner.jpg" alt="Background Image">
                <img src="<?= ROOT ?>/assets/images/kotthu-banner.jpg" alt="Background Image">
                <img src="<?= ROOT ?>/assets/images/sandwitches-banner.jpg" alt="Background Image">
                <img src="<?= ROOT ?>/assets/images/pita-bread-banner.jpg" alt="Background Image">
                <div class="text">
                    <h2 class="head_1">Welcome to</h2>
                    <h1 class="head_2">FINAGLE LANKA (PVT) LTD</h1>
                    <div class="arrow">
                        <span class="left"></span>
                        <i class="fas fa-asterisk"></i>
                        <span class="right"></span>
                    </div>

                    <h3 class="text-span">Conveniently Delicious Frozen & Fresh Bakery Products</h3>
                    <div class="button"> <a href="<?= ROOT ?>"><button>Explore</button></a></div>
                </div>
            </div>
            <script>
                let currentIndex = 0;
                const images = document.querySelectorAll('.image-container img');
                const intervalTime = 10000; 

                function showImage(index) {
                    images.forEach((img, i) => {
                        if (i === index) {
                            img.style.display = 'block';
                        } else {
                            img.style.display = 'none';
                        }
                    });
                }

                function nextImage() {
                    currentIndex++;
                    if (currentIndex >= images.length) {
                        currentIndex = 0;
                    }
                    showImage(currentIndex);
                }
                
                nextImage();
                setInterval(nextImage, intervalTime);
            </script>
        </div>
        <div class="row g-4">

            <div class="service-item rounded pt-3">
                <div class="p-4">
                    <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                    <h5 class="service-title">Quality Food</h5>
                    <p class="service-content">Our commitment to quality is woven into every recipe, ensuring a delightful experience for your taste buds.</p>
                </div>
            </div>


            <div class="service-item rounded pt-3">
                <div class="p-4">
                    <i class="fas fa-shopping-cart fa-3x text-primary mb-4"></i>
                    <h5 class="service-title">Online Order</h5>
                    <p class="service-content">Through our seamless online ordering service, we designed to bring your favorite baked delights right to your doorstep.</p>
                </div>
            </div>


            <div class="service-item rounded pt-3">
                <div class="p-4">
                    <i class="fas fa-truck fa-3x text-primary mb-4"></i>
                    <h5 class="service-title">Fast Delivery</h5>
                    <p class="service-content">We are excited to introduce our lightning-fast delivery service, ensuring that your goodies are at your doorstep in no time.</p>
                </div>
            </div>


            <div class="service-item rounded pt-3">
                <div class="p-4">
                    <i class="fas fa-credit-card fa-3x text-primary mb-4"></i>
                    <h5 class="service-title">Easy Payments</h5>
                    <p class="service-content">Your security is our priority. Rest assured that every transaction you make with us is encrypted and secure</p>
                </div>
            </div>

        </div>

        <div class="offer-category">
            <!-- <h2 class="section-title"><strong>Check </strong>OUR CATEGORIES</h2> -->
            <h2 class="section-title"><strong> </strong>SPECIAL OFFERS</h2>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                    <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>

                </div>
            </div>
            <section class="offer_section ">
                <div class="offer_container">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-6  ">
                                <div class="box ">
                                    <div class="img-box">
                                        <img src="https://i.pinimg.com/474x/f3/02/d7/f302d7ea19236892be02fd77a986cd7b.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            Tasty Thursdays
                                        </h5>
                                        <h6>
                                            <span>20%</span> Off
                                        </h6>
                                        <a href="product.php">
                                            Order Now<span> <i class="fas fa-shopping-cart fa-3x text-primary mb-4"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6  ">
                                <div class="box ">
                                    <div class="img-box">
                                        <img src="https://i.pinimg.com/474x/1d/28/c5/1d28c51cfab73dfcd0e3fad6824f4e86.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            Pizza Days
                                        </h5>
                                        <h6>
                                            <span>15%</span> Off
                                        </h6>
                                        <a href="product.php">
                                            Order Now<span> <i class="fas fa-shopping-cart fa-3x text-primary mb-4"></i></span>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>


        <div class="product-category">
            <!-- <h2 class="section-title"><strong>Check </strong>OUR CATEGORIES</h2> -->
            <h2 class="section-title"><strong> </strong>OUR CATEGORIES</h2>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                    <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
                </div>
            </div>

            <div class="separate-category">

                <div class="category">
                    <div class="category-content">
                        <img src="<?= ROOT ?>/assets/images/delicious-bread.jpg" alt="breads" class="category-image">

                        <a href="product.php">
                            <h5 class="category-title">BREAD & BUNS</h5>
                        </a>

                    </div>
                </div>

                <div class="category">
                    <div class="category-content">
                        <img src="<?= ROOT ?>/assets/images/vegi_roti.jpg" alt="frozen" class="category-image">

                        <a href="product.php">
                            <h5 class="category-title">FROZEN FOODS</h5>
                        </a>

                    </div>
                </div>

                <div class="category">
                    <div class="category-content">
                        <img src="<?= ROOT ?>/assets/images/cakes.jpg" alt="cakes" class="category-image">

                        <a href="product.php">
                            <h5 class="category-title"> CAKES</h5>
                        </a>

                    </div>
                </div>
            </div>

            <a href="product.php">
                <div class="view-more">View more</div>
            </a>

            <div class="newly-added">


                <h2 class="section-title"><strong> </strong>NEWLY ADDED</h2>
                <div class="divider dark mb-4">
                    <div class="icon-wrap">
                        <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
                    </div>
                </div>


                <div class="food_section">
                    <div class="row grid">

                        <div class="col-sm-6 col-lg-4 all pizza">
                            <div class="box">

                                <div class="img-box">
                                    <img src="https://i.pinimg.com/474x/46/82/38/4682389000f323e6b4a743a2a183c3aa.jpg" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Vege Stuffed Roti
                                    </h5>
                                    <p>
                                        Flavorful and nutritious dish that combines the goodness of whole wheat flour with a delectable mix of vegetables.
                                    </p>
                                    <div class="options">
                                        <h6>
                                            Rs.1000.00
                                        </h6>
                                        <a href="product.php">
                                            <i class="fas fa-shopping-cart fa-3x text-primary mb-4"></i>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 all pizza">
                            <div class="box">

                                <div class="img-box">
                                    <img src="https://i.pinimg.com/564x/68/2d/71/682d710de798a1c465ac95f55fda8e14.jpg" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Eggnog Cake
                                    </h5>
                                    <p>
                                        This is a festive dessert that captures the rich and creamy flavors of the beloved holiday eggnog.
                                    </p>
                                    <div class="options">
                                        <h6>
                                            Rs.4500.00
                                        </h6>
                                        <a href="product.php">
                                            <i class="fas fa-shopping-cart fa-3x text-primary mb-4"></i>


                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 all burger">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="https://i.pinimg.com/474x/6f/8f/7b/6f8f7b182c2c015bdda4a11c1f9f5426.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            Neapolitan Frozen Pizza
                                        </h5>
                                        <p>
                                            This allows you to savor the authentic taste of Neapolitan pizza with just a few minutes of preparation.
                                        </p>
                                        <div class="options">
                                            <h6>
                                                Rs.3750.00
                                            </h6>
                                            <a href="product.php">
                                                <i class="fas fa-shopping-cart fa-3x text-primary mb-4"></i>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row grid">

                        <div class="col-sm-6 col-lg-4 all pizza">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="https://i.pinimg.com/474x/ad/ca/b2/adcab2d2165598c7208bc2105b266c61.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            Blackstone Burger
                                        </h5>
                                        <p>
                                            Crafted with precision on a Blackstone griddle, this burger boasts a perfect balance of flavors.
                                        </p>
                                        <div class="options">
                                            <h6>
                                                Rs.1700.00
                                            </h6>
                                            <a href="product.php">
                                                <i class="fas fa-shopping-cart fa-3x text-primary mb-4"></i>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4 all pizza">
                            <div class="box">

                                <div class="img-box">
                                    <img src="https://i.pinimg.com/474x/ab/d3/6e/abd36e85ca11276e78c53d02853d88bd.jpg" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Savory Rolls
                                    </h5>
                                    <p>
                                        These delightful rolls are perfect for any occasion, from casual snacks to elegant appetizers.
                                    </p>
                                    <div class="options">
                                        <h6>
                                            Rs.200.00
                                        </h6>
                                        <a href="product.php">
                                            <i class="fas fa-shopping-cart fa-3x text-primary mb-4"></i></span>


                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4 all pizza">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="https://i.pinimg.com/474x/0a/57/9b/0a579b9bdaf19849ca8443ba628e0b6b.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            Chocolate Berry Cake
                                        </h5>
                                        <p>
                                            This dessert is a harmonious blend of flavors, making it a perfect treat for any occasion.
                                        </p>
                                        <div class="options">
                                            <h6>
                                                Rs.5000.00
                                            </h6>
                                            <a href="product.php">
                                                <i class="fas fa-shopping-cart fa-3x text-primary mb-4"></i>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <br>
            <a href="product.php">
                <div class="view-more">View more</div>
            </a>

            <div class="about-us">

                <h2 class="section-title" id="aboutus"><strong> </strong>ABOUT US</h2>
                <div class="divider dark mb-4">
                    <div class="icon-wrap">
                        <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
                    </div>
                </div>

                <div class="about-us-section">
                    <div class="about-img">
                        <div class="img-container-1">
                            <img class="img-1" src="https://www.finagle.lk/images/site-specific/about-us/01_our-story.jpg" alt="">
                            <img class="img-2" src="https://bmkltsly13vb.compat.objectstorage.ap-mumbai-1.oraclecloud.com/cdn.dailymirror.lk/assets/uploads/image_4cb427c61e.jpg" alt="">

                        </div>
                        <div class="img-container-2">
                            <img class="img-3" src="https://media.licdn.com/dms/image/D5622AQFDpnTPgR-H1A/feedshare-shrink_800/0/1686316219976?e=1704326400&v=beta&t=RAbhzyChajbcxVD8A4Tn2Rv8oI1UEWWdxSLkBOgeWjo" alt="">
                            <img class="img-4" src="https://www.finagle.lk/images/site-specific/market-segments/horeca_01.jpg" alt="">

                        </div>


                    </div>
                    <div class="about-content">

                        <h1 class="about-head">Welcome to <i class="fa fa-utensils text-primary me-2"></i> Finagle Lanka </h1>
                        <p class="about-p">In the late 1980s, an entrepreneur's wife in the textile weaving industry started baking cakes in a small Baby Belling oven and sold them in a boutique in Kottawa town. These cakes, known as "Nona Cakes" or "Cakes Baked by the Lady," gained popularity for their quality.<br><br>Recognizing the potential in the baking industry, her husband, Mahinda Ranasinghe, decided to expand the business in 1992. He invested in second-hand European equipment for production, forming the organization "Ran Ovens." <br><br>While the textile industry faced challenges due to liberalized imports, Ran Ovens continued to improve production and distribution with a strong focus on hygiene and quality.

                            In 1999, a joint venture agreement was formed between Finagle-A-Bagel of Boston, USA, and Phoenix Ventures of Sri Lanka with Ran Ovens to establish a state-of-the-art bakery in Sri Lanka, named "Finagle Lanka."</p>



                        <div class="about-exp">
                            <div class="experience">
                                <div class="vertical-line"></div>
                                <div class="exp-title">
                                    <h1 class=""> 15 </h1>
                                </div>
                                <div class="exp-content">
                                    <p class="sub-topic">Years of</p>
                                    <h3 class="ss-topic">EXPERIENCE</h6>

                                </div>

                            </div>

                            <div class="many-branch">
                                <div class="vertical-line"></div>
                                <div class="exp-title">
                                    <h1 class=""> 20 </h1>
                                </div>
                                <div class="exp-content">
                                    <p class="sub-topic">Exporting</p>
                                    <h3 class="ss-topic">COUNTRIES</h6>
                                </div>

                            </div>
                        </div>
                        <a class="read-more" href="process.php">READ MORE</a>
                    </div>

                </div>
            </div>

            <div class="feedback-section">

                <h2 class="section-title"><strong> </strong>CLIENTS' REVIEWS</h2>
                <div class="divider dark mb-4">
                    <div class="icon-wrap">
                        <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
                    </div>
                </div>

                <div class="feedback-container">
                    <div class="feedback">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="review">Super and excellent productions. And my favorite product was roller cake.</p>
                        <div class="client-info">
                            <img src="https://i.pinimg.com/474x/61/23/72/612372dba970fe25663857c585e8d56e.jpg" alt="">
                            <p class="client-name">Mithun Weerasinghe</p>

                        </div>



                    </div>
                    <div class="feedback">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="review">Tasty soft buns for burgers and submarines. Quality is great, love it
                        <p>
                        <div class="client-info">
                            <img src="https://i.pinimg.com/474x/01/cb/08/01cb089df6c94483423dc52f63cf7762.jpg" alt="">
                            <p class="client-name">Pahasara Jayasooriya</p>

                        </div>

                    </div>

                    <div class="feedback">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p class="review">Love the bread and bakery items produced by them. Top quality❤️❤️
                        <p>
                        <div class="client-info">
                            <img src="https://i.pinimg.com/474x/6b/03/09/6b030941295661a780641ea0922d09c6.jpg" alt="">
                            <p class="client-name">Malki Yasodhara</p>

                        </div>

                    </div>

                </div>
</body>

</html>

<?php
// require_once '../../Components/NavBar/Footer/cus_footer.php';
$this->view('includes/cus_footer', $data);
?>
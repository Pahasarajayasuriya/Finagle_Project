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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user.css">
</head>

<body>
    <div class="home-section">
        <div class="logo_body">
            <img class="logo" src="<?= ROOT ?>/assets/images/logo.png" alt="">
        </div>
        <section class="home" id="home">
            <div class="slides-container">
                <div class="slide active">
                    <div class="img">
                        <img decoding="async" src="<?= ROOT ?>/assets/images/banner.jpg" alt="">
                    </div>
                </div>

                <div class="slide">
                    <div class="img">
                        <img decoding="async" src="<?= ROOT ?>/assets/images/kotthu-banner.jpg" alt="">
                    </div>
                </div>

                <!-- <div class="slide">
                    <div class="img">
                        <img decoding="async" src="<?= ROOT ?>/assets/images/pita-bread-banner.jpg" alt="">
                    </div>
                </div>

                <div class="slide">
                    <div class="img">
                        <img decoding="async" src="<?= ROOT ?>/assets/images/sandwitches-banner.jpg" alt="">
                    </div>
                </div> -->
            </div>

            <script>
                let currentIndex = 0;
                const slides = document.querySelectorAll('.slide');

                function showSlide(index) {
                    slides.forEach((slide, i) => {
                        if (i === index) {
                            slide.classList.add('active');
                        } else {
                            slide.classList.remove('active');
                        }
                    });
                }

                function nextSlide() {
                    currentIndex++;
                    if (currentIndex >= slides.length) {
                        currentIndex = 0;
                    }
                    showSlide(currentIndex);
                }

                function prevSlide() {
                    currentIndex--;
                    if (currentIndex < 0) {
                        currentIndex = slides.length - 1;
                    }
                    showSlide(currentIndex);
                }

                setInterval(nextSlide, 10000);
            </script>
        </section>


        <div class="user-buttons">
            <?php if (!Auth::logged_in()) : ?>
                <a href="<?= ROOT ?>/signup">Signup</a>
                <a href="<?= ROOT ?>/login">Login</a>
            <?php else : ?>
                <div class="navbar">
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

        <section class="banner-container">

            <div class="banner">
                <img decoding="async" src="<?= ROOT ?>/assets/images/banner-1.jpg" alt="">
                <div class="content">
                    <span>limited sales</span>
                    <h3>upto 50% off</h3>
                    <a href="product.php" class="btn">shop now</a>
                </div>
            </div>

            <div class="banner">
                <img decoding="async" src="<?= ROOT ?>/assets/images/blog-6.jpg" alt="">
                <div class="content">
                    <span>limited sales</span>
                    <h3>upto 20% off</h3>
                    <a href="product.php" class="btn">shop now</a>
                </div>
            </div>

            <div class="banner">
                <img decoding="async" src="<?= ROOT ?>/assets/images/banner-3.jpg" alt="">
                <div class="content">
                    <span>limited sales</span>
                    <h3>upto 25% off</h3>
                    <a href="product.php" class="btn">shop now</a>
                </div>
            </div>

        </section>




        <div class="heading">
            <h1>our shop</h1>
        </div>

        <section class="category">

            <h1 class="title"> our <span>category</span> <a href="product.php">view all >></a> </h1>

            <div class="box-container">

                <a href="product.php" class="box">
                    <img decoding="async" src="<?= ROOT ?>/assets/images/burger-bun.jpg" alt="">
                    <h3>Bread & Buns</h3>
                </a>

                <a href="product.php" class="box">
                    <img decoding="async" src="<?= ROOT ?>/assets/images/blog-5.jpg" alt="">
                    <h3>Cakes</h3>
                </a>

                <a href="product.php" class="box">
                    <img decoding="async" src="<?= ROOT ?>/assets/images/chicken_bun.jpg" alt="">
                    <h3>Frozen Foods</h3>
                </a>

            </div>

        </section>




        <section class="products" id="newlyadded">

            <h1 class="title"> Newly <span>Added</span> <a href="product.php">view all >></a> </h1>

            <div class="box-container">

                <div class="box">
                    <div class="icons">
                        <!-- <a href="#" class="fas fa-shopping-cart"></a> -->
                        <!-- <a href="#" class="fas fa-heart"></a> -->
                        <a href="product.php" class="fas fa-eye"></a>
                    </div>
                    <div class="img">
                        <img decoding="async" src="<?= ROOT ?>/assets/images/pineapple-gateau-cake.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Pineapple Gateau</h3>
                        <div class="price">Rs.2450</div>
                        <div class="stars">
                            <!-- <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i> -->
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="icons">
                        <!-- <a href="#" class="fas fa-shopping-cart"></a> -->
                        <!-- <a href="#" class="fas fa-heart"></a> -->
                        <a href="product.php" class="fas fa-eye"></a>
                    </div>
                    <div class="img">
                        <img decoding="async" src="<?= ROOT ?>/assets/images/kottu_roti.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Kottu Roti</h3>
                        <div class="price">Rs.800</div>
                        <div class="stars">
                            <!-- <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i> -->
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="icons">
                        <!-- <a href="#" class="fas fa-shopping-cart"></a> -->
                        <!-- <a href="#" class="fas fa-heart"></a> -->
                        <a href="product.php" class="fas fa-eye"></a>
                    </div>
                    <div class="img">
                        <img decoding="async" src="<?= ROOT ?>/assets/images/multi_seed.jpg" alt="">
                    </div>
                    <div class="content">
                        <h3>Multiseed Low GI Bread</h3>
                        <div class="price">Rs.400</div>
                        <div class="stars">
                            <!-- <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div id="aboutus">
            <div class="heading">
                <h1>About us</h1>
            </div>

            <section class="about">
                <div class="img">
                    <img decoding="async" src="<?= ROOT ?>/assets/images/01_our-story.jpg" alt="">
                </div>

                <div class="content">
                    <span>welcome to our products</span>
                    <h3>OUR STORY</h3>
                    <p>In the late 1980s, an entrepreneur's wife in the textile weaving
                        industry started baking cakes in a small Baby Belling Oven and
                        sold them in a boutique in Kottawa town. These cakes, known as
                        "Nona Cakes" or "cakes baked by the lady," gained popularity
                        for their quality. Recognizing the potential in the baking
                        industry, her husband, Mahinda Ranasinghe, decided to expand
                        the business in 1992. He invested in second-hand European
                        equipment for production, forming the organization "Ran Ovens." </p>
                    <p>While the textile industry faced challenges due to liberalized
                        imports, Ran Ovens continued to improve production and distribution
                        with a strong focus on hygiene and quality. In 1999, a joint
                        venture agreement was formed between Finagle-a-Bagel of Boston,
                        USA, and Phoenix Ventures of Sri Lanka with Ran Ovens to establish
                        a state-of-the-art bakery in Sri Lanka, named "Finagle Lanka."
                        Ran Ovens took on the operational management responsibilities,
                        marking the beginning of the Sri Lankan baking revolution.
                        Today, Finagle Lanka is wholly owned by the Ranasinghe Family.</p>
                </div>
            </section>
        </div>

        <div class="heading">
            <h1>client's review</h1>
        </div>

        <section class="info-container">

            <div class="info">
                <img decoding="async" src="<?= ROOT ?>/assets/images/icons-1.png" alt="">
                <div class="content">
                    <h3>fast delivery</h3>
                    <span>within 30 minutes</span>
                </div>
            </div>

            <div class="info">
                <img decoding="async" src="<?= ROOT ?>/assets/images/icons-3.png" alt="">
                <div class="content">
                    <h3>easy payments</h3>
                    <span>cash or credit</span>
                </div>
            </div>

        </section>



        <section class="review">

            <div class="box" id="review">
                <div class="user">
                    <img decoding="async" src="<?= ROOT ?>/assets/images/pic-1.png" alt="">
                    <div class="info">
                        <h3>pahasara jayasuriya</h3>
                    </div>
                </div>
                <p>Tasty soft buns for burgers and submarines.
                    Quality is great.</p>
            </div>

            <div class="box">
                <div class="user">
                    <img decoding="async" src="<?= ROOT ?>/assets/images/pic-2.png" alt="">
                    <div class="info">
                        <h3>malki pushpakumara</h3>
                    </div>
                </div>
                <p>Love it. Love the bread and bakery items produce by them. Top quality....❤❤</p>
            </div>

            <div class="box">
                <div class="user">
                    <img decoding="async" src="<?= ROOT ?>/assets/images/pic-3.png" alt="">
                    <div class="info">
                        <h3>mithun weerasinghe</h3>
                    </div>
                </div>
                <p>Super and excellent productions. And my favorite product was roller cake</p>
            </div>

            <div class="box">
                <div class="user">
                    <img decoding="async" src="<?= ROOT ?>/assets/images/pic-4.png" alt="">
                    <div class="info">
                        <h3>senuri hettiarachchi</h3>
                    </div>
                </div>
                <p>Great food and quality is ensured by the process and management.
                </p>
            </div>

            <div class="box">
                <div class="user">
                    <img decoding="async" src="<?= ROOT ?>/assets/images/pic-5.png" alt="">
                    <div class="info">
                        <h3>dilshan akalanka</h3>
                    </div>
                </div>
                <p>Good place for employers. They produce healthy bakery food.</p>
            </div>

            <div class="box">
                <div class="user">
                    <img decoding="async" src="<?= ROOT ?>/assets/images/pic-6.png" alt="">
                    <div class="info">
                        <h3>mihiri samarasekara</h3>
                    </div>
                </div>
                <p>Best manufacturer of bakery items in srilanka </p>
            </div>

        </section>


        <div class="heading" id="contactus">
            <h1>Contact us</h1>
        </div>

        <section class="contact">
            <div class="icons-container">

                <div class="icons">
                    <i class="fas fa-phone"></i>
                    <h3>our number</h3>
                    <p>+94 (0) 11 223 6976</p>
                </div>

                <div class="icons">
                    <i class="fas fa-envelope"></i>
                    <h3>our email</h3>
                    <p>admin@finagle.lk</p>
                </div>

                <div class="icons">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>our address</h3>
                    <p>A14-15, Industrial Estate, Ekala, Ja-ela, Sri Lanka.</p>
                </div>

            </div>
        </section>

        <div class="space"></div>



        <!-- <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h3>quick links</h3>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Home</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i>Products</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i>About</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Review</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i>Exports</a>
                    <a href="#"> <i class="fas fa-arrow-right"></i>Contact</a>
                </div>

                <div class="box">
                    <h3>products</h3>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Bread & Buns </a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Cakes </a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Frozen Foods </a>
                </div>

                <div class="box">
                    <h3>branches</h3>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Pelawatta </a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Ja-Ela </a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Nugegoda </a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Jawatta - Colombo 05 </a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Kollupitiya - Colombo 03 </a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Dehiwala </a>
                    <a href="#"> <i class="fas fa-arrow-right"></i> Borella </a>
                </div>

                <div class="box">
                    <h3>follow us</h3>
                    <a href="https://www.facebook.com/finaglelanka/"> <i class="fab fa-facebook-f"></i> facebook </a>
                    <a href="https://www.instagram.com/finagle_lanka/"> <i class="fab fa-instagram"></i> instagram </a>
                    <a href="https://www.youtube.com/channel/UCmW9-WuMsWq8peGj7-5ybcA"> <i class="fab fa-youtube"></i> youtube </a>
                </div>
            </div>
        </section>

        <section class="credit">Copyright <i class="fa-regular fa-copyright"></i> Finagle Lanka (Pvt) Ltd || all rights reserved</section> -->
        <script src="<?= ROOT ?>/assets/js/user.js" defer data-deferred="1"></script>
    </div>
</body>

</html>

<?php
// require_once '../../Components/NavBar/Footer/cus_footer.php';
$this->view('includes/cus_footer', $data);
?>
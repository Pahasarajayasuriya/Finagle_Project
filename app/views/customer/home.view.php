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
    <?php $this->view('includes/cus_topbar', $data); ?>

    <div class="home-section">
        <div class="page-container">
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
                        <div class="button"> <a href="<?= ROOT ?>/home"><button>Explore</button></a></div>
                    </div>
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
                            <?php foreach ($advertisements as $advertisement) : ?>
                                <div class="col-md-6">
                                    <div class="box">
                                        <div class="img-box">
                                            <img src="<?= $advertisement->image ?>" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <h5>
                                                <?= $advertisement->description ?>
                                            </h5>
                                            <div style="position: relative; top: 40px; right: -100px;">
                                                <a href="<?= ROOT ?>/products">
                                                    Order Now<span> <i class="fas fa-shopping-cart fa-3x text-primary mb-4"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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

                        <a href="<?= ROOT ?>/products#bread">
                            <h5 class="category-title">BREAD & BUNS</h5>
                        </a>

                    </div>
                </div>

                <div class="category">
                    <div class="category-content">
                        <img src="<?= ROOT ?>/assets/images/fish_patties.jpg" alt="frozen" class="category-image">

                        <a href="<?= ROOT ?>/products#frozen">
                            <h5 class="category-title">FROZEN FOODS</h5>
                        </a>

                    </div>
                </div>

                <div class="category">
                    <div class="category-content">
                        <img src="<?= ROOT ?>/assets/images/cakes.jpg" alt="cakes" class="category-image">

                        <a href="<?= ROOT ?>/products#cakes">
                            <h5 class="category-title"> CAKES</h5>
                        </a>

                    </div>
                </div>
            </div>

            <a href="<?= ROOT ?>/products">
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
                    <button class="arrow-btn left" onclick="prevProducts()">&#10094;</button>
                    <div class="row grid">
                        <?php foreach ($newlyAdded as $product) : ?>
                            <div class="col-sm-6 col-lg-4 all pizza">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="<?= $product->image ?>" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            <?= $product->user_name ?>
                                        </h5>
                                        <p>
                                            <?= $product->description ?>
                                        </p>
                                        <div class="options">
                                            <h6>
                                                Rs.<?= $product->price ?>
                                            </h6>
                                            <a href="<?= ROOT ?>/products">
                                                <i class="fas fa-shopping-cart fa-3x text-primary mb-4"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
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
                            <img class="img-3" src="https://lh3.googleusercontent.com/p/AF1QipMRpMNJLbc9yGciZgvXzr4Y32F3pZBYMwuPtTzZ=s680-w680-h510" alt="">
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
                        <a class="read-more" href="<?= ROOT ?>/process">READ MORE</a>
                    </div>

                </div>
            </div>
            <div class="exports">

                <h2 class="section-title" id="exports"><strong> </strong>EXPORT MARKETS</h2>
                <div class="divider dark mb-4">
                    <div class="icon-wrap">
                        <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
                    </div>
                </div>

                <div class="export-section">
                    <div class="export-img">
                        <img src="<?= ROOT ?>/assets/images/exports.jpg" alt="export Img" />
                    </div>

                    <div class="export-content">
                        <p class="export-p">Exports of frozen baked products is another of our success stories. Exports of our baked
                            goods commenced several years back. We initially targeted hotels, restaurants and retail
                            outlets in those countries. Starting with the Maldives and Seychelles, we expanded our
                            export horizons to the USA, Australia, the United Kingdom, and Hong Kong a few years later.
                            The expatriate Sri Lankan community in those countries were targeted with typical Sri Lankan products.
                            Our current list of countries in our Exports Account are USA, Australia, Maldives,
                            New Zealand & South Korea.
                            Our efforts were crowned with success. What commenced with one 20’ FCL Freezer
                            Container in every quarter is now increased to two to three 20’ FCL Freezer Containers
                            a month. For the long term, we intend to further penetrate the local communities of
                            those countries as well. Currently, we are the only organization to offer a complete
                            package of baked products for exports. </p>
                    </div>
                </div>
            </div>
            <div class="certificates">

                <h2 class="section-title" id="exports">QUALITY CERTIFICATIONS</h2>
                <div class="divider dark mb-4">
                    <div class="icon-wrap">
                        <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
                    </div>
                </div>

                <div class="certificate-section">
                    <div class="c1">

                        <div class="outer">
                            <div class="img-01">
                                <img src="<?= ROOT ?>/assets/images/fssc-22000.png" alt="">



                            </div>
                        </div>
                        <p>FSSC 22000 <br>Certification</p>

                    </div>

                    <div class="c1">
                        <div class="outer">
                            <div class="img-01">
                                <img src="<?= ROOT ?>/assets/images/gmp.jpg" alt="">

                            </div>
                        </div>
                        <p>GMP <br>Certification</p>
                    </div>

                    <div class="c1">
                        <div class="outer">
                            <div class="img-01">
                                <img src="<?= ROOT ?>/assets/images/ISO-22000.png" alt="">

                            </div>
                        </div>
                        <p>ISO 22000 <br> Certification</p>
                    </div>

                    <div class="c1">
                        <div class="outer">
                            <div class="img-01">
                                <img src="<?= ROOT ?>/assets/images/HACCP.jpg" alt="">

                            </div>
                        </div>
                        <p>HACCP <br> Certification</p>
                    </div>



                </div>
                <br><br>



                <div class="feedback-section">
                    <h2 class="section-title"><strong> </strong>CLIENTS' REVIEWS</h2>
                    <div class="divider dark mb-4">
                        <div class="icon-wrap">
                            <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
                        </div>
                    </div>


                    <div class="feedback-container">
                        <?php foreach ($reviews as $review) : ?>
                            <div class="feedback">
                                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                                <p class="review"><?= htmlspecialchars($review->review) ?></p>
                                <div class="client-info">
                                    <img src='<?= esc($review->image) ?>' alt="">
                                    <p class="client-name"><?= htmlspecialchars($review->userName) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>




                </div>

            </div>
            <script src="<?= ROOT ?>/assets/js/user.js"></script>
            <?php $this->view('includes/cus_footer', $data); ?>
</body>
</div>
</div>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/cus_footer.css">
</head>

<body>
    <div class="footer-section">
        <div class="quick-links">
            <h3>QUICK LINKS</h3>
            <div class="link-quick">

                <i class="fas fa-arrow-right"></i> <a href="<?= ROOT ?>#aboutus" class="a-link"> About us </a><br>


                <i class="fas fa-arrow-right"></i> <a href="<?= ROOT ?>/products" class="a-link">Products</a><br>


                <i class="fas fa-arrow-right"></i> <a href="<?= ROOT ?>/complaint" class="a-link">Put a Complaint</a><br>


                <i class="fas fa-arrow-right"></i> <a href="" class="a-link">Distributions</a><br>
                <?php if (Auth::is_admin()) : ?>
                    <i class="fas fa-arrow-right"></i> <a href="<?= ROOT ?>/admin_products" class="a-link">Admin</a><br>
                <?php endif; ?>





            </div>



        </div>
        <div class="product-links">
            <h3>PRODUCTS</h3>
            <div class="link-product">

                <i class="fas fa-arrow-right"></i> <a href="<?= ROOT ?>/products" class="a-link">Bread & Buns</a><br>


                <i class="fas fa-arrow-right"></i> <a href="<?= ROOT ?>/products" class="a-link">Frozen Products</a><br>

                <i class="fas fa-arrow-right"></i> <a href="<?= ROOT ?>/products" class="a-link">Cakes</a><br>

            </div>
        </div>

        <div class="contact-link">
            <div class="contact-us" id="contactus">
                <h3>CONTACT US</h3>

            </div>

            <div class="link-contact">

                <p><i class="fa fa-map-marker-alt me-3"></i> A14-15, Industrial Estate, Ekala, Ja-ela, Sri Lanka.</p>

                <p><i class="fa fa-phone-alt me-3"></i> +94 11 223 6976</p>

                <p><i class="fa fa-envelope me-3"></i> admin@finagle.lk </p>

            </div>
            <div class="social-links">
                <a class="social-btn" href="https://www.facebook.com/finaglelanka/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="social-btn" href="https://www.youtube.com/@finaglelanka9579" target="_blank"><i class="fab fa-youtube"></i></a>
                <a class="social-btn" href="https://lk.linkedin.com/company/finaglelanka" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a class="social-btn" href="https://www.instagram.com/finagle_lanka/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>

        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <div class="newsletter-link">
            <h3>NEWS LETTER</h3>
            <form action="" method="post">
                <div class="newsletter">
                    <div class="link-newsletter">
                        <input class="email-input" type="email" name="email" placeholder="Enter your email" required>
                        <button type="submit" class="send">SEND</button>
                    </div>
                    <div class="confirm">
                        <input type="checkbox" id="consentCheckbox" name="consent" required>
                        <label for="consentCheckbox" class="confirm-content">I consent to receiving email<br> communications.</label>
                    </div>
                </div>
            </form>
            <div class="copyright">
                <section class="credit">Copyright &copy; Finagle Lanka (Pvt) Ltd || all rights reserved</section>
            </div>
        </div>
    </div>
    <!-- <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            fetch(this.action, {
                    method: 'POST',
                    body: new FormData(this)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        swal({
                            title: "Success!",
                            text: "Subscription successful",
                            icon: "success",
                            button: {
                                text: "OK",
                                closeModal: true,
                                className: "red-button"
                            }
                        });
                        document.querySelector('.email-input').value = '';
                    } else {
                        // Handle error...
                    }
                });
        });
    </script>
    <style>
        .red-button {
            background-color: red;
            color: white;
        }

        .red-button:hover {
            background-color: lightcoral !important;
        }
    </style> -->
</body>

</html>
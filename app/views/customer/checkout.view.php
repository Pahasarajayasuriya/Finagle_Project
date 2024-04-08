<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/checkout.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/boxicons/2.1.0/css/boxicons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <title><?= APPNAME ?>- Checkout</title>

</head>

<body>
    <input name="latitude" type="hidden" required />
    <input name="longitude" type="hidden" required />
    <div class="check_container">
        <form method="POST" id="checkoutForm">
            <div class="check_row">
                <div class="check_col">
                    <div class="recipe_head">

                        <i class='bx bxs-calendar-check' style="margin-top: 10px;"></i>
                        <p class="recipe_head_1">ORDER<span> CHECKOUT</span></p>
                    </div>
                    <input type="hidden" id="totalCost" name="total_cost" value="">
                    <div class="check_inline">
                        <label class="check_name" for="check_name" name='name'>Name</label>
                        <input class="check_input" name='name' value="<?= set_value('name') ?>" type="text" id="check_name" name="check_name">
                        <?php if (!empty($errors['name'])) : ?>
                            <div class="invalid"><?= $errors['name'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="check_inline">
                        <label class="check_name" for="check_comemail" name='email'>E-mail</label>
                        <input class="check_input" name='email' value="<?= set_value('email') ?>" type="email" id="check_comemail" name="check_comemail">
                        <?php if (!empty($errors['email'])) : ?>
                            <div class="invalid"><?= $errors['email'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="check_inline">
                        <label class="check_name" for="check_phoneno" name='phone_number'>Phone Number</label>
                        <input class="check_input" name='phone_number' value="<?= set_value('phone_number') ?>" type="text" id="check_phoneno" name="check_phoneno">
                        <?php if (!empty($errors['phone_number'])) : ?>
                            <div class="invalid"><?= $errors['phone_number'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="check_inline">
                        <label class="check_name" for="check_option">Delivery or Pickup:</label>
                        <input type="radio" id="delivery" name="delivery_or_pickup" value="delivery">
                        <label class="check_radio" for="delivery"> Delivery </label>

                        <input type="radio" id="pickup" name="delivery_or_pickup" value="pickup">
                        <label class="check_radio" for="pickup"> Pickup </label>
                    </div>

                    <div class="check_inline" id="deliveryOrdersSection" style="display: none;">
                        <label class="check_name" for="delivery_orders"><b>For Delivery Orders:</b></label>
                        <div id="map" style="height: 300px; width: 100%;">
                            <a class="change_address" href="#">Choose Address</a>
                        </div>
                    </div>

                    <div id="pickupOutletsSection" class="check_inline" style="display: none;">
                        <label class="check_name" for="pickup_orders"><b>For Pickup Orders:</b></label>
                        <select id="pickupLocation" name="pickup_location" disabled>
                            <option class="branch_select">Pelawatta</option>
                            <option class="branch_select">Ja-Ela</option>
                            <option class="branch_select">Nugegoda</option>
                            <option class="branch_select">Jawatta</option>
                            <option class="branch_select">Kollupitiya</option>
                            <option class="branch_select">Dehiwala</option>
                            <option class="branch_select">Borella</option>
                        </select>
                    </div>



                    <div class="check_flex">
                        <div class="check_inputBox">
                            <label class="check_name" for="order_data" name='delivery_date'>Date:</label>
                            <input class="check_input" type="date" name='delivery_date' value="<?= set_value('delivery_date') ?>">
                            <?php if (!empty($errors['delivery_date'])) : ?>
                                <div class="invalid"><?= $errors['delivery_date'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="check_inputBox">
                            <label class="check_name" for="order_time" name='delivery_time'>Time:</label>
                            <input class="check_input" type="time" name='delivery_time' value="<?= set_value('delivery_time') ?>">
                            <?php if (!empty($errors['delivery_time'])) : ?>
                                <div class="invalid"><?= $errors['delivery_time'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="check_inline">
                        <label class="check_name" for="check_gift" name='is_gift'>Send as a gift:</label>
                        <input type="radio" id="send-gift-yes" name="is_gift" value="yes" class="send-as-gift-radio">
                        <label class="check_radio" for="send-gift-yes"> Yes </label>

                        <input type="radio" id="send-gift-no" name="is_gift" value="no" class="send-as-gift-radio">
                        <label class="check_radio" for="send-gift-no"> No </label>
                    </div>

                    <div class="check_inline" id="note">
                        <label class="check_name" id="order_note" name='note'>Note:</label><br><br>


                        <textarea class="check_input" id="note" name="note" value="<?= set_value('note') ?>"></textarea>
                    </div>

                </div>
                <div class="check_inline" id="payment">
                    <label class="check_name" for="check_payment">Payment Method :</label>
                    <input type="radio" id="payment-card" name="payment_method" value="card" class="payment-method-radio">
                    <label class="check_radio_1" for="payment-card"> Credit or Debit card </label>

                    <input type="radio" id="payment-cash" name="payment_method" value="cash" class="payment-method-radio">
                    <label class="check_radio_1" for="payment-cash"> Cash payment </label>

                </div>



                <div class="check_col" id="paymentDetailsSection">
                    <br>
                    <h3 class="check_title">payment</h3>

                    <div class="check_inline">
                        <label class="check_name" for="order_note">Cards Accepted:</label>
                        <img class="payment_methods" src="<?= ROOT ?>/assets/images/card_img.png" alt="">
                    </div>

                    <div class="check_inline">
                        <label class="check_name" for="check_name">Name on card :</label>
                        <input class="check_input" type="text" id="check_name" name="check_name" placeholder="Mr. Pahasara Jayasuriya">
                    </div>

                    <div class="check_inline">
                        <label class="check_name" for="check_no">Credit Card number :</label>
                        <input class="check_input" type="text" id="check_no" name="check_name" placeholder="1111-2222-3333-4444">
                    </div>

                    <div class="check_flex">
                        <div class="check_inputBox">
                            <label class="check_name" for="check_month">Exp Month:</label>

                            <input class="check_input" type="text" placeholder="January">
                        </div>
                        <div class="check_inputBox">
                            <label class="check_name" for="check_year">Exp Year:</label>
                            <input class="check_input" type="text" placeholder="2024">
                        </div>
                        <div class="check_inputBox">
                            <label class="check_name" for="check_CVV">CVV :</label>
                            <input class="check_input" type="text" placeholder="123">
                        </div>
                    </div>
                </div>
            </div>


            <button class="check_submit-btn" id="p_checkout-button">Proceed to Checkout</button>

            <!-- <script>
                document.getElementById("p_checkout-button").addEventListener("click", function() {
                    event.preventDefault();
                    window.location.href = "progressbar.php";
                });
            </script> -->


        </form>

        <div class="summary-container">
            <h3>CART SUMMARY</h3>
            <ul class="cart-summary-list"></ul>
            <div class="total-product-price"></div>
        </div>

        <div class="back-icon" id="back-button">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>

        </div>



        <script>
            document.getElementById("back-button").addEventListener("click", function() {
                window.location.href = "<?= ROOT ?>/products"
            });
        </script>
    </div>
    <script src="<?= ROOT ?>/assets/js/checkout.js"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3KoOPDxuE9bSb6J__Wn_tz18S3IdBNIw&loading=async&callback=initMap"></script>
</body>

</html>
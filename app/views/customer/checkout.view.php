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
    <?php
    $this->view('includes/cus_topbar', $data);
    ?>
    
    <div class="check_container">
        <form method="POST" id="checkoutForm">
            <input name="latitude" type="hidden" />
            <input name="longitude" type="hidden" />
            <input type="hidden" id="branches" value="<?php echo htmlspecialchars(json_encode($data['branches'])); ?>">
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
                        <div class="check_inline">
                            <label class="check_name" for="check_address" name='address'>location</label>
                            <input class="check_input" value="<?= set_value('address') ?>" type="text" id="check_address" name="check_address" placeholder="Type address...">
                            <?php if (!empty($errors['address'])) : ?>
                                <div class="invalid"><?= $errors['address'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div id="map" style="height: 300px; width: 100%;">
                            <a class="change_address" href="#">Choose Address</a>
                        </div>
                    </div>
                    <input type="hidden" name="pickup_location" id="pickup_location">
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
                    <label class="check_radio_1" for="payment-card"> Online payment </label>

                    <input type="radio" id="payment-cash" name="payment_method" value="cash" class="payment-method-radio">
                    <label class="check_radio_1" for="payment-cash"> Cash payment </label>

                </div>
                <div class="check_col" id="paymentDetailsSection">
                </div>
            </div>

            <br><br><br>
            <button class="check_submit-btn" id="p_checkout-button">Place Order</button>
        </form>
        <div class="summary-container">
            <h3>CART SUMMARY</h3>
            <ul class="cart-summary-list"></ul>
            <div class="delivery-fee"></div>
            <div class="total-product-price"></div>
        </div>

        <div class="back-icon" id="back-button">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.getElementById("payment-card").addEventListener("change", function() {
                if (this.checked) {
                    Swal.fire({
                        title: "Pay here",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Pay here"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            paymentGateWay();
                        }
                    });
                }
            });
        </script>

        <script>
            document.getElementById("back-button").addEventListener("click", function() {
                window.location.href = "<?= ROOT ?>/products"
            });
        </script>

        <script>
            var ROOT = "<?= ROOT ?>";
        </script>
        <script>
            function paymentGateWay() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = () => {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        console.log(xhttp.responseText);
                        var obj = JSON.parse(xhttp.responseText);

                        payhere.onCompleted = function onCompleted(orderId) {
                            console.log("Payment completed. OrderID:" + orderId);
                            // Send a POST request to the new endpoint
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", '<?= ROOT ?>/Checkout/saveCardPayment', true);
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.onreadystatechange = function() {
                                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                                    // The request has been completed successfully
                                    console.log(this.responseText);
                                } else if (this.readyState === XMLHttpRequest.DONE) {
                                    // The request has been completed but the status is not 200
                                    console.error("There was an error. Status: " + this.status);
                                }
                            }
                            xhr.send("orderId=" + orderId);
                        };


                        // Payment window closed
                        payhere.onDismissed = function onDismissed() {
                            // Note: Prompt user to pay again or show an error page
                            console.log("Payment dismissed");
                        };

                        // Error occurred
                        payhere.onError = function onError(error) {
                            // Note: show an error page
                            console.log("Error:" + error);
                        };

                        // Put the payment variables here
                        var payment = {
                            "sandbox": true,
                            "merchant_id": "1226489", // Replace your Merchant ID
                            "return_url": "http://localhost/finagle/public/checkout", // Important
                            "cancel_url": "http://localhost/finagle/public/checkout", // Important
                            "notify_url": "http://sample.com/notify",
                            "order_id": obj['order_id'],
                            "items": obj['item'],
                            "amount": obj['amount'],
                            "currency": obj['currency'],
                            "hash": obj['hash'], // *Replace with generated hash retrieved from backend
                            "first_name": obj['first_name'],
                            "last_name": obj['last_name'],
                            "email": obj['email'],
                            "phone": obj['phone'],
                            "address": obj['address'],
                            "city": obj['city'],
                            "country": "Sri Lanka",
                            "delivery_address": "No. 46, Galle road, Kalutara South",
                            "delivery_city": "Kalutara",
                            "delivery_country": "Sri Lanka",
                            "custom_1": "",
                            "custom_2": ""
                        };

                        payhere.startPayment(payment);
                    }
                };
                xhttp.open("GET", '<?= ROOT ?>/Checkout/Payherprocess', true);
                xhttp.send();
            }
        </script>

    </div>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3KoOPDxuE9bSb6J__Wn_tz18S3IdBNIw&loading=async&libraries=places&callback=initMap"></script>
    <script src="<?= ROOT ?>/assets/js/checkout.js"></script>
</body>

</html>
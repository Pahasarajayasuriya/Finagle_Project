
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/checkout.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/boxicons/2.1.0/css/boxicons.min.css">
    

    <title>Payment</title>

</head>

<body>

    <div class="check_container">
        <form action="">
            <div class="check_row">
                <div class="check_col">
                    <div class="recipe_head">
                        
                        <i class='bx bxs-calendar-check' style="margin-top: 10px;"></i>
                        <p class="recipe_head_1">ORDER<span> CHECKOUT</span></p>
                    </div>
              

                    <div class="check_inline">
                        <label class="check_name" for="check_name">Full Name</label>
                        <input class="check_input" type="text" id="check_name" name="check_name">
                    </div>
                    <div class="check_inline">
                        <label class="check_name" for="check_comemail">E-mail</label>
                        <input class="check_input" type="email" id="check_comemail" name="check_comemail">
                    </div>
                    <div class="check_inline">
                        <label class="check_name" for="check_phoneno">Phone Number</label>
                        <input class="check_input" type="text" id="check_phoneno" name="check_phoneno">
                    </div>

                    <div class="check_inline">
                        <label class="check_name" for="check_option">Delivery or Pickup:</label>
                        <label class="check_radio">
                            <input  type="radio" name="delivery-pickup" value="delivery"> Delivery
                        </label>
                        <label class="check_radio">
                            <input type="radio" name="delivery-pickup" value="pickup"> Pickup
                        </label>

                    </div>

                    <div class="check_inline">
                        <label class="check_name" for="delivery_orders"><b>For Delivery Orders:</b></label>
                       
                        <a class="change_address" href="#">Choose Address</a>
                    </div>

                    <div class="check_inline" >
                    <label class="check_name" for="pickup_orders"><b>For Pickup Orders:</b></label>
                    <select >
                            <option class="branch_select" value="branch1">Pelawatta</option>
                            <option class="branch_select" value="branch2">Ja-Ela</option>
                            <option class="branch_select" value="branch3">Nugegoda</option>
                            <option class="branch_select"value="branch3">Jawatta</option>
                            <option class="branch_select" value="branch3">Kollupitiya</option>
                            <option class="branch_select"value="branch3">Dehiwala</option>
                            <option class="branch_select"value="branch3">Borella</option>
                    </select>
                    </div>

               

                    <div class="check_flex"> 
                        <div class="check_inputBox">
                            <label class="check_name" for="order_data">Date:</label>
                    
                            <input  class="check_input" type="date">
                        </div>
                        <div class="check_inputBox">
                            <label class="check_name" for="order_timr">Time:</label>
                            <input class="check_input" type="time">
                        </div>
                    </div> 
                  
                    <div class="check_inline">
                        <label class="check_name" for="check_gift">Send as a gift:</label>
                        <label class="check_radio">
                            <input  type="radio" name="gift" value="yes"> Yes
                        </label>
                        <label class="check_radio">
                            <input type="radio" name="not gift" value="no"> No
                        </label>

                    </div>
                    
                    <div class="check_inline">
                        <label class="check_name" for="order_note">Note:</label><br><br>
    
                        <textarea class="check_input" id="note" name="note"></textarea>
                    </div>

                </div>
                <div class="check_inline">
                        <label class="check_name" for="check_payment">Payment Method :</label>
                        <label class="check_radio_1">
                            <input  type="radio" name="card" value="card"> Credit or Debit card
                        </label>
                        <label class="check_radio_1">
                            <input type="radio" name="cash" value="cash"> Cash payment
                        </label>

                    </div>

                    

                <div class="check_col">
                <br>
                    <h3 class="check_title">payment</h3>

                    <div class="check_inline">
                        <label class="check_name" for="order_note">Cards Accepted:</label>
                        <img class="payment_methods" src="../../img/card_img.png" alt="">
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
                    
                            <input  class="check_input" type="text" placeholder="January">
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

            <script>
                document.getElementById("p_checkout-button").addEventListener("click", function() {
                    event.preventDefault();
                    window.location.href = "progressbar.php";
                });
            </script>


        </form>
        <button class="check_back-btn" id="back-button">Back</button>

        <script>
            document.getElementById("back-button").addEventListener("click", function() {
                window.location.href = "<?= ROOT ?>/products"
            });
        </script>
    </div>

</body>

</html>
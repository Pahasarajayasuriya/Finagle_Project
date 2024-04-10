<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Order Details Display</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />


</head>

<body>


  <div id="viewOrderDetails" class="modal">
    <div class="modal-content">

      <i class='bx bx-cart bx-fade-right' style='color:#fd0303'></i>

       <?php
      if (isset($data)) {
     
        foreach ($data as $val) {

      ?> 

          <h2 id="order-id">Order ID: <?= $val->id ?></h2>
          <div class="delivery-info">


            <div class="delivery-loc"><i class="fas fa-map-marker-alt"></i> <?= $val->delivery_address ?></div>
            <div class="delivery-loc"><i class="fas fa-phone"></i> <?= $val->phone_number ?></div>
          </div>

          <button class="pay-status">
            <?php
            if ($val->payment_method == "card") {
              echo "Paid";
            } else {
              echo "Not Paid";
            }
            ?>

           </button>

          <br>


          <div class="details" id="details">

            <div class="product-item">
              <div class="product-name" id="product-name">Chocolate Cake</div>
              <div class="product-qty" id="product-qty">2</div>
              <div class="product-price" id="product-price">Rs.2500.00</div>
            </div>

            <div class="product-item">
              <div class="product-name" id="product-name">Sandwitch Bread</div>
              <div class="product-qty" id="product-qty">3</div>
              <div class="product-price" id="product-price">Rs.1000.00</div>
            </div>



            <hr>
            <div class="product-summery">
              <div class="total-amount">Total Amount : Rs.5500</div>
            </div>

            <hr>

          </div>

          <button class="button" id="confirmDetails" onclick="hidePopup('viewOrderDetails')">OK</button>
          <button class="button" id="cancelDetails" onclick="hidePopup('viewOrderDetails')">Cancel</button>


      <?php

        }
      }
      ?>

      <!-- <button class="button" id="cancelDelete">Cancel</button> -->
    </div>
  </div>

  <div id="viewOrderConfirm" class="modal">
    <div class="modal-content">


      <h2 id="order-id">Order Delivery Confirmation</h2>

      <i class='bx bx-alarm-exclamation bx-fade-left' style='color:#fd0303'></i>



      <h3>Has the order been successfully delivered?</h3>


      <!-- <form method="POST">
                    <input type="hidden" name="order_status" value="delivered">
                    <input type="hidden" name="id" value="<?= $element->id ?>">
                    <button name="delivered_btn" class="delivered-btn">Delivered</button> 
                    
          </form>  -->

      <button class="button" id="confirmDetails" onclick="hidePopup('viewOrderConfirm')">Yes</button>
      <button class="button" id="cancelDetails" onclick="hidePopup('viewOrderConfirm')">No</button>
    </div>
  </div>


  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }



    .modal-content {
      border-radius: 10px;
      background-color: #fefefe;
      margin: 10% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 50%;
      text-align: center;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: rgb(172, 0, 0);
      text-decoration: none;
      cursor: pointer;
    }

    .icon-warn {
      margin-left: 27px;
      font-size: 7rem;
      display: flexbox;
      justify-content: center;
      align-items: center;
    }

    .bx.bx-alarm-exclamation.bx-fade-left {
      margin-left: 27px;
      font-size: 7rem;
      display: flexbox;
      justify-content: center;
      align-items: center;
      margin-top: 30px;

    }

    .delivery-info {
      display: flex;
      justify-content: space-between;
      /* gap: 40px; */
    }

    .delivery-loc {
      display: flex;
      /* text-align: center; */
      gap: 10px;
      margin-left: 50px;
      margin-right: 50px;
      color: #889;
      font-size: 14px;
      /* align-self: center; */
      margin-top: 20px;
    }

    .pay-status {
      width: 100px;
      height: 30px;
      font-size: 16px;
      display: inline-block;
      padding: 5px;
      border-radius: 5px;
      cursor: pointer;
      border: none;
      outline: none;
      color: white;
      transition: 0.3s ease-in;
      margin-top: 10px;
      text-align: center;
      align-items: center;
      background-color: rgb(16, 187, 0);
      margin: 10px;

    }

    .product-item {
      display: flex;
      text-align: center;
      gap: 10px;
      margin-left: 100px;
      color: black;
      font-size: 14px;
      align-self: center;
      padding: 10px;


    }

    .product-name {
      min-width: 200px;
    }

    .product-qty {
      max-width: 20px;
    }

    .product-price {
      min-width: 200px;

    }

    .total-amount {
      display: flex;
      text-align: center;
      gap: 10px;
      margin-left: 180px;
      color: black;
      font-size: 16px;
      /* align-self: center; */
      padding: 10px;
      font-weight: bold;

    }

    .button {
      width: 100px;
      height: 37px;
      font-size: 16px;
      display: inline-block;
      padding: 5px;
      border-radius: 5px;
      cursor: pointer;
      border: none;
      outline: none;
      color: #fff;
      transition: 0.3s ease-in;
      margin-top: 20px;
      text-align: center;
      align-items: center;
    }

    .details {
      text-align: center;
    }

    #confirmDetails {
      margin-right: 10px;
      background-color: #000000;
    }

    #cancelDetails {
      background-color: #f44336;
    }

    #confirmDetails:hover {
      background-color: rgb(16, 187, 0);
    }

    #cancelDetails:hover {
      background-color: rgb(255, 0, 0);
    }
  </style>

</body>

</html>
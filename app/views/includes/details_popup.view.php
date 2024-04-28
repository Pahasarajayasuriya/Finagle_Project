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

      <h2 id="order-id">Order ID: &nbsp; <span id="view-order-id"></span> </h2>
      <div class="delivery-info">

      
        <div class="delivery-loc"><i class="fas fa-map-marker-alt"></i><span id="user-location"></span> </div>
        <!-- <div class="delivery-loc"><i class="fas fa-phone"></i> <span id="user-phone"></span> </div> -->
      </div>
  
      <button class="pay-status" id="pay-status-btn"><span id="pay-status"></span></button>

      <br>

      <div class="details" id="details">

      <div id="order-details">

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
        
      </div>

        <hr>
        <div class="product-summery">
          <div class="total-amount">Total Amount : Rs.<span id="total_cost"></span> </div>
        </div>

        <div class="product-note">
          <div class="order-note"><i class='bx bxs-book-heart' style='color:#f50000' ></i>  <span id="note"></span> </div>
        </div>



        

      </div>

      <button class="ok-button" id="confirmDetails" onclick="hidePopup('viewOrderDetails')">OK</button>
      


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

    .bx-cart {
      margin-left: 27px;
      font-size: 3rem;
      display: flexbox;
      justify-content: center;
      align-items: center;

    }

    .delivery-loc {
      display: flex;
      text-align: center;
      gap: 10px;
      margin-left: 170px;
      color: #888;
      font-size: 14px;
      align-self: center;
      margin-top: 10px;
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
      background-color: #8e6d6d;
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
      text-align: right;
      gap: 10px;
      margin-left: 350px;
      color: black;
      font-size: 16px;
      /* align-self: center; */
      padding: 10px;
      font-weight: bold;

    }

    .ok-button {
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
      margin-top: 10px;
      text-align: center;
      align-items: center;
    }

    .details {
      text-align: center;
    }

    .order-note {
    margin: 20px auto;
    padding: 15px; 
    background-color: white; 
    border-radius: 8px; 
    /* border: 1px solid #ccc; */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 80%; 
    font-size: 14px;
    display: flex; 
    align-items: center; 
  }

  .order-note i{
    font-size: 25px;
    margin-right: 10px;
  }

  .order-note span{
    color: #aaa;
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
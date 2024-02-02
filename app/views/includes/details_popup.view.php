<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Order Details Display</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />


</head>

<body>
   
    
    <div id="viewDetails" class="modal">
      <div class="modal-content">
        <!-- <span><i class="bx bx-x close" style="color: #ff0000"></i></span>
        <div>
             <i class='bx bx-window-close bx-fade-right' style='color:red'  ></i>
           
        </div> -->
        <i class='bx bx-cart bx-fade-right' style='color:#fd0303' ></i>
        <h2>Order ID: 12345</h2>
        <div class="delivery-loc"><i class="fas fa-map-marker-alt"></i> No 34, Flowers road, Colombo 7.</div>
        <button class="pay-status">Paid</button>
            <br><hr>
        

    <div class="details">
        <div class="product-item">
           <div class="product-name">Chocolate Cake</div>
           <div class="product-qty">2</div>
           <div class="product-price">Rs.2500.00</div>
        </div>

        <div class="product-item">
           <div class="product-name">Burger Bun</div>
           <div class="product-qty">5</div>
           <div class="product-price">Rs.500.00</div>
        </div>

        <hr>
        <div class="product-summery">
            <div class="total-amount">Total Amount : Rs.5700</div>
        </div>

        </div>
        
        <button class="button" id="confirmDetails" onclick="hidePopup('viewDetails')">OK</button>
        <button class="button" id="cancelDelete" onclick="hidePopup('viewDetails')">Cancel</button>



        <!-- <button class="button" id="cancelDelete">Cancel</button> -->
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

      .icon-warn{
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

      .delivery-loc{
        display: flex;
        text-align: center;
        gap: 10px;
        margin-left: 170px;
        color: #888;
        font-size: 14px;
        align-self: center;
        margin-top: 10px;
      }

      .pay-status{
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
        background-color:rgb(16, 187, 0);
        margin: 10px;

      }
      .product-item{
        display: flex;
        text-align: center;
        gap: 10px;
        margin-left: 100px;
        color: black;
        font-size: 14px;
        align-self: center;
        padding: 10px;
        

      }
      .product-name{
        min-width: 200px;
      }
  
      .product-qty{
        max-width: 20px;
      }

      .product-price{
        min-width: 200px;

      }

      .total-amount{
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
        margin-top: 10px;
        text-align: center;
        align-items: center;
      }

      .details{
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
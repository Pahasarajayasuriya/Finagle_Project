<?php
$role = "Deliverer";
// require_once '../../Components/NavBar/header.php';
// require_once '../../Components/NavBar/NavBar.php';
// require_once '../../Components/NavBar/footer.php';
$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>Deliverer Assign</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/del_assign.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>


<body>

  <div class="home-section">
<!--               
               <div class="pro_head">
                  <p class="pro_head_1">ASSIGNED <span>ORDERS</span></p>
              </div> -->

    <div class="assign_container">
            
     

      <div class="middle-section">
        <div class="border-box">

          <div class="one">

            <p>Order id : 0345</p><br>
            <hr><br>
            <p><i class="fas fa-map-marker-alt"></i> No 34, Flowers road, Colombo 7.</p><br>
            <hr><br>

            <button class="loc-btn">View Location</button>

          </div>
        </div>

        <div class="border-box">

          <div class="two">
            <table>
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Qty</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Butter cake</td>
                  <td>2</td>
                  <td>Rs.2500.00</td>
                </tr>
                <tr>
                  <td>Frozen pizza</td>
                  <td>1</td>
                  <td>Rs.3000.00</td>
                </tr>
              </tbody>
            </table>
            <hr>
            <br>
            <p class="bill_1">Sub Total <span>Rs.5500.00</span></p>
            <p class="bill_2">Delivery Fee <span>Rs.500.00</span></p>
            <p class="bill_3">Total <span>Rs.6000.00</span></p>


          </div>
        </div>

        <div class="border-box">

          <div class="three">

            <p>Payment Method <span class="black-oval">Card </span> </p>

            <button class="pay-btn">Payment Confirmation</button>
            <br><br>
            <button class="del-btn">Delivered</button>

          </div>
        </div>

      </div>
      <!-- <div class="a_button">
            <button class="availability-button">I'm available</button>
          </div> -->
    </div>
  </div>


  <!-- <script src="daScript.js"></script> -->
</body>

</html>
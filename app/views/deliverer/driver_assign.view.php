<?php
$role = "Deliverer";
// require_once '../../Components/NavBar/header.php';
// require_once '../../Components/NavBar/NavBar.php';
// require_once '../../Components/NavBar/footer.php';

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);


$this->view('includes/orderDetails_popup', $data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>Deliverer Assign</title>

  <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/deliverer/driver_assign.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>


<body>

  <div class="home-section">
    <div class="left-section">
      <h4><i>You have been assigned to.........</i></h4>

      <div class="assigned-orders">


        <?php

        if (!empty($data['ready_order'])) {

          foreach ($data['ready_order'] as $key => $element) {
        ?>
            <div class="order-box">
              <div class="order-header">
                >
                <h3>Order ID: <?= $element->id ?> D</h3>
                <button class="view-details" id="locationButton" onclick="showPopup('viewOrderDetails')">View Details >>>></button>

              </div>
              <hr>


              <div class="addresses">

                <div class="pickup-address">
                  <div class="dot"></div>
                  <p>Pickup from branch</p>
                </div>

                <div class="vertical-line"><br><br></div>

                <div class="delivery-address">
                  <i class="fas fa-map-marker-alt"></i>
                  <p><?= ucfirst($element->delivery_address) ?></p>
                </div>

              </div>
              <div class="footer">
                <div class="call-icon">
                  <a href=""><i class="fa-solid fa-phone"></i></a>

                </div>

                <div class="action-buttons">

                  <button class="view-location-btn" id="locationButton">View Location</button>

                  <!-- <form method="POST">
                    <input type="hidden" name="order_status" value="delivered">
                    <input type="hidden" name="id" value="<?= $element->id ?>">
                    <button name="delivered_btn" class="delivered-btn">Delivered</button> 
                    
                  </form> -->
                  <button class="delivered-btn"  id="locationButton" onclick="showPopup('viewOrderConfirm')"> Delivered</button>
                </div>

              </div>

            </div>
          <?php
          }

        } else {

          ?>
          <h3>No Available Delivery Orders</h3>
        <?php
        }

        ?>
      </div>
    </div>

    <div class="right-section">


      <div class="googlemap" id="map">

      </div>

    </div>
  </div>



  </div>






  <script>
    function showPopup(popupId, id = 0) {

      // console.log(id);
      var popup = document.getElementById(popupId);
      if (popup) {
        popup.style.display = "block";

      }
      data = {
        'order_id': id
      }

      $.ajax({
        type: "POST",
        url: "<?= ROOT ?>/OrderDetail_Popup",
        data: data,
        cache: false,
        success: function(res) {
          var detail = JSON.parse(res);
          // console.log(detail);


          detail.forEach(element => {

            console.log(element)
            createProductItem(element.user_name, element.quantity, element.price)
          });

        },
        error: function(xhr, status, error) {
          // return xhr;
        }
      });

    }


    function hidePopup(popupId) {
      var popup = document.getElementById(popupId);
      if (popup) {
        popup.style.display = "none";
      }
    }
  </script>

  <script>
    // Initialize and display the Google Map
    function initMap() {
      const map = new google.maps.Map(document.getElementById("map"), {
        center: {
          lat: 7.7072567,
          lng: 80.6534611
        }, // Initial center coordinates
        zoom: 7.7, // Initial zoom level
      });
    }
  </script>


  <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3KoOPDxuE9bSb6J__Wn_tz18S3IdBNIw&loading=async&callback=initMap"></script>

  <style>
    #map {
      height: 600px;
      /* Adjust as needed */
      width: 100%;
    }
  </style>


</body>



</html>
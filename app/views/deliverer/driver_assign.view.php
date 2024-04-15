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

        // show($data['total_cost']);

        if (!empty($data['ready_order'])) {

          foreach ($data['ready_order'] as $key => $element) {
        ?>
            <div class="order-box">
              <div class="order-header">
                >
                <h3>Order ID: <?= $element->id ?> D</h3>

                <button type="button" class="view-details" id="locationButton view-details" data-order='<?php echo json_encode($element); ?>' onclick="showPopup(this,'viewOrderDetails')">View Details >>>></button>

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

                  <a href="tel:<?= $element->phone_number ?>"><i class="fa-solid fa-phone"></i></a>

                </div>

                <div class="action-buttons">

                  <button class="view-location-btn" id="locationButton">View Location</button>

                  <form method="POST">
                    <input type="hidden" name="order_status" value="delivered">
                    <input type="hidden" name="id" value="<?= $element->id ?>">
                    <button name="delivered_btn" class="delivered-btn">Delivered</button>

                  </form>
                  <!-- <button class="delivered-btn" id="locationButton" onclick="showPopup(this,'viewOrderConfirm')"> Delivered</button> -->
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

       <?php
     
      $address = "College House, 94 Kumaratunga Munidasa Mawatha, Colombo 00700";

      
      $geocodeUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=AIzaSyB3KoOPDxuE9bSb6J__Wn_tz18S3IdBNIw&loading=async";
      $response = json_decode(file_get_contents($geocodeUrl), true);

      if ($response['status'] == 'OK') {
        $latitude = $response['results'][0]['geometry']['location']['lat'];
        $longitude = $response['results'][0]['geometry']['location']['lng'];
      }
      ?> 


      <div class="googlemap" id="map">

      </div>

    </div>
  </div>



  </div>






  <script>
    var view_details = document.querySelector('view-details');


    function showPopup(button, popupId) {


      data = JSON.parse(button.getAttribute('data-order'));


      var popup = document.getElementById(popupId);

      if (popup) {
        popup.style.display = "block";
      }

      var order_id = document.getElementById('view-order-id');
      var user_location = document.getElementById('user-location');
      var user_phone = document.getElementById('user-phone');
      var pay_status = document.getElementById('pay-status');
      var total_cost = document.getElementById('total_cost');


      console.log(data);
      console.log(data.id);

      order_id.innerHTML = data.id;
      user_location.innerHTML = data.delivery_address;
      user_phone.innerHTML = data.phone_number;
      pay_status.innerHTML = data.payment_method;
      total_cost.innerHTML = data.total_cost;


      if (data.payment_method == 'card') {
        pay_status.innerHTML = ('PAID');

      } else {
        pay_status.innerHTML = ('NOT PAID');


      }

    }


    function hidePopup(popupId) {
      var popup = document.getElementById(popupId);
      if (popup) {
        popup.style.display = "none";
      }
    }
  </script>

  <script>
  

    function initMap() {
      // Create a new map instance
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {
          lat: <?php echo $latitude; ?>,
          lng: <?php echo $longitude; ?>
        },
        zoom: 15 // Adjust the zoom level as needed   zoom: 7.7
      });

      // Add a marker to the map
      var marker = new google.maps.Marker({
        position: {
          lat: <?php echo $latitude; ?>,
          lng: <?php echo $longitude; ?>
        },
        map: map,
        title: 'Customer Address'
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
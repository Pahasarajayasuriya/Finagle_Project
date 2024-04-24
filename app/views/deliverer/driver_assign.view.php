<?php
$role = "Deliverer";
$data['role'] = $role;
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

        if (!empty($ready_order)) {
          //show($data['ready_order']);
          foreach ($ready_order as $key => $element) {
        ?>
            <div class="order-box">
              <div class="order-header">
                
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

                  <!-- <button class="view-location-btn" id="locationButton">View Location</button> -->
                  
                  <!-- <button class="view-location-btn" onclick="addMarker(<?= $element->latitude ?>, <?= $element->longitude ?>)">View Location</button> -->

                  <button class="view-location-btn" onclick="calculateAndDisplayRoute({lat: <?= $element->latitude ?>, lng: <?= $element->longitude ?>})">View Location</button>




                 <!-- <form method="POST">
                    <input type="hidden" name="order_status" value="delivered">
                    <input type="hidden" name="id" value="<?= $element->id ?>">
                    <button name="delivered_btn" class="delivered-btn">Delivered</button>
                  </form>   -->

                  <button  class="delivered-btn" id="locationButton view-details" data-order='<?php echo json_encode($element); ?>' onclick="showPopup(this,'viewOrderConfirm')"> Delivered</button>
               
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

      <div class="googlemap" id="map"></div>

    </div>
  </div>
 </div>

 <style>

  .active{
    background-color: green;
  }
 </style>

  <script>
    // var view_details = document.querySelector('view-details');
    // var view_details = document.querySelector('delivered-btn');


    var data = {};
    
    function showPopup(button, popupId) {
      
      data = {};

      data = JSON.parse(button.getAttribute('data-order'));

      var popup = document.getElementById(popupId);

    //  console.log(data.mult_order);
      
      if (popup) {
        popup.style.display = "block";
      }

      var order_id = document.getElementById('view-order-id');
      var user_location = document.getElementById('user-location');
      var user_phone = document.getElementById('user-phone');

      var pay_status = document.getElementById('pay-status');
      var pay_status_btn = document.getElementById('pay-status-btn');

      var total_cost = document.getElementById('total_cost');

      var delivered_id = document.getElementById('deliver-order-id');
      var order_status = document.getElementById('order_status');

     order_id.innerHTML = data.id;
      user_location.innerHTML = data.delivery_address;
      user_phone.innerHTML = data.phone_number;
      pay_status.innerHTML = data.payment_method;
      total_cost.innerHTML = data.total_cost;

     // delivered_id.innerHTML = data.id;
     // order_status.innerHTML = data.order_status;


      if (data.payment_method == 'card') {
        pay_status.innerHTML = ('PAID');
        pay_status_btn.classList.remove('active');
        
      } else {
        pay_status.innerHTML = ('NOT PAID');
        pay_status_btn.classList.add('active');

      }

      // document.getElementById('order-id-input').value = data.id;

      document.getElementById('order-details').innerHTML = "";

      for (let index = 0; index < data.mult_order.length; index++) {
       // console.log(data.mult_order[index]);

        order_list(data.mult_order[index]);
      }

    }


    function hidePopup(popupId) {
      var popup = document.getElementById(popupId);
      if (popup) {
        popup.style.display = "none";
      }
    }

    function order_list(orders_list) {


      var details = document.getElementById('order-details');
      var newCard = document.createElement("div");
      newCard.className = "product-item";
      
      newCard.innerHTML  = `<div class="product-name" id="product-name">${orders_list.user_name}</div>
          <div class="product-qty" id="product-qty">${orders_list.quantity}</div>
          <div class="product-price" id="product-price">Rs.${orders_list.price}</div>
      `;

      newCard.style.transition = "all 0.5s ease-in-out";
      details.appendChild(newCard);
    }



  </script>


  <script>
    var map;
    var directionsService;
    var directionsRenderer;
 

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 6.9271,
                lng: 79.8612
            },
            zoom: 15
        });

        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);
    }

    function addMarker(latitude, longitude) {
        // Remove existing markers (if any)
        mapMarkers.forEach(function(marker) {
            marker.setMap(null);
        });

        // Create a new marker
        var marker = new google.maps.Marker({
            position: {
                lat: latitude,
                lng: longitude
            },
            map: map,
            title: 'Location'
        });

        // Store the marker in an array for future reference
        mapMarkers.push(marker);

        // Pan the map to the marker's position
        map.panTo(marker.getPosition());
    }


    var mapMarkers = []; // Array to store markers

    function calculateAndDisplayRoute(destination) {
        var request = {
            origin: 'Dr NM Perera Mawatha Rd, Colombo 00800',
            destination: destination,
            travelMode: 'DRIVING'
        };
        directionsService.route(request, function(result, status) {
            if (status == 'OK') {
                directionsRenderer.setDirections(result);
            } else {
                console.error('Error:', status);
            }
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
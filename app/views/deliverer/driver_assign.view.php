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

  <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/deliverer/driver_assign.css">
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>


<body>

  <div class="home-section">
    <h2><i>You have been assigned to.........</i></h2>

    <div class="assigned-orders">


      <div class="order-box">
        <div class="order-header">
          >
          <h3>Order ID: 245 D</h3>
          <button class="view-details" onclick="showPopup('viewDetails')">View Details >>>></button>

        </div>
        <hr>


        <div class="addresses">

          <div class="pickup-address">
            <div class="dot"></div> <!-- Red dot before pickup address -->
            <p>Pickup from branch</p>
          </div>

          <div class="vertical-line"><br><br></div>

          <div class="delivery-address">
            <i class="fas fa-map-marker-alt"></i> <!-- Location icon -->
            <p>No.5, Temple Road,Borella</p>
          </div>

        </div>
        <div class="footer">
          <div class="call-icon">
            <a href=""><i class="fa-solid fa-phone"></i></a>
           
          </div>

          <div class="action-buttons">
            <button class="view-location-btn">View Location</button>
            <button class="delivered-btn">Delivered</button>
          </div>

        </div>

      </div>

      <div class="order-box">
        <div class="order-header">
          >
          <h3>Order ID: 245 D</h3>
          <button class="view-details" onclick="showPopup('viewDetails')">View Details >>>></button>

        </div>
        <hr>


        <div class="addresses">

          <div class="pickup-address">
            <div class="dot"></div> <!-- Red dot before pickup address -->
            <p>Pickup from branch</p>
          </div>

          <div class="vertical-line"><br><br></div>

          <div class="delivery-address">
            <i class="fas fa-map-marker-alt"></i> <!-- Location icon -->
            <p>No.5, Temple Road,Borella</p>
          </div>

        </div>
        <div class="footer">
          <div class="call-icon">
            <a href=""><i class="fa-solid fa-phone"></i></a>
           
          </div>

          <div class="action-buttons">
          <button class="view-location-btn" onclick="showMapPopup()">View Location</button>
            <button class="delivered-btn">Delivered</button>
          </div>

        </div>

      </div>
    </div>
  </div>

  <div id="mapModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeMapPopup()">&times;</span>
      <div id="googleMap" style="width: 100%; height: 400px;"></div>
    </div>
  </div>

  <script>
    function showMapPopup() {
      var modal = document.getElementById("mapModal");
      modal.style.display = "block";
      initializeMap();
    }

    function closeMapPopup() {
      var modal = document.getElementById("mapModal");
      modal.style.display = "none";
    }

    function initializeMap() {
      var mapProp= {
        center:new google.maps.LatLng(51.508742,-0.120850),
        zoom:5,
      };
      var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
  </script>

  
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
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
    }
  </style>


</body>

</html>





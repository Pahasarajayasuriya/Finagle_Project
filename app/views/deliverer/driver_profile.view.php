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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/deliverer/driver_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>

<body>
    <div class="home-section">
      
            
            <div class="pro_card">

              <div class="pro_head">
               <p class="pro_head_1">YOUR  <span> PROFILE</span></p>
              </div>

              <div class="profile-picture">
                <!-- <div class="outer-circle"> -->
                    <div class="inner-circle">
                        
                        <img src="https://i.pinimg.com/474x/39/af/8d/39af8d65e8612ee6d12b94ea81ee5e62.jpg" alt="Profile Picture"> 
                        <i class="fas fa-camera"></i> 
                    </div>
                <!-- </div> -->

                <div class="driver-info">
                  <p class="driver-name">John Doe</p>
                  <p class="joined-date">Joined on January 1, 2022</p>
                </div>

               
            </div>

            <div class="stats-boxes">
                <!-- Orders delivered box -->
                <div class="stats-box">
                    <i class="fas fa-truck"></i>
                    <p class="stats-number">125</p>
                    <p class="stats-text">Orders delivered</p>
                </div>
                <!-- Total earnings box -->
                <div class="stats-box">
                    <i class="fas fa-money-bill"></i>
                    <p class="stats-number">$1500</p>
                    <p class="stats-text">Total Earnings</p>
                </div>
            </div>
           
               
              
            </div>
        
    </div>
</body>

</html>
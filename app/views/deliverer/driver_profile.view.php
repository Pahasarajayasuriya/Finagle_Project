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
                <p class="pro_head_1">YOUR <span> PROFILE</span></p>
            </div>

            <?php
            if (isset($data)) {
                foreach ($data as $val) {
                    // show($val);

            ?>

                    <div class="profile-picture">
                        <!-- <div class="outer-circle"> -->
                        <div class="inner-circle">

                        
                            <img src="<?= ROOT ?>/assets/images/drivers/<?= $val->image ?>"> 
                            <i class="fas fa-camera"></i>
                        </div>
                        <!-- </div> -->

                        <div class="driver-info">
                            <p class="driver-name"><?= $val->name ?></p>
                            <p class="joined-date">Joined Date : <?= $val->joined_date ?></p>
                        </div>


                    </div>
            

            <div class="stats-boxes">
                <!-- Orders delivered box -->
                <div class="stats-box">
                    <i class="fas fa-truck"></i>
                    <p class="stats-number"><?= $val->delivered_orders ?></p>
                    <p class="stats-text">Orders delivered</p>
                </div>
                <!-- Total earnings box -->
                <div class="stats-box">
                    <i class="fas fa-money-bill"></i>
                    <p class="stats-number">Rs.<?= $val->total_earnings ?></p>
                    <p class="stats-text">Total Earnings</p>
                </div>
            </div>

            <?php

                }
            }
            ?>



        </div>

    </div>
</body>

</html>
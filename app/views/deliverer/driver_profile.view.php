<?php
$role = "Deliverer";
$data['role'] = $role;
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
            if (isset($driver_data)) {
                //show($data['driver_data']);
                foreach ($driver_data as $val) {


            ?>

                    <div class="profile-picture">

                        <div class="inner-circle">


                            <img src="<?= ROOT ?>/assets/images/drivers/<?= $val->image ?>">
                            <i class="fas fa-camera"></i>
                        </div>


                        <div class="driver-info">
                            <p class="driver-name"><?= $val->username ?></p>
                            <p class="joined-date">Joined Date : <?= $val->joined_date ?></p>
                        </div>


                    </div>


                    <div class="stats-boxes">
                        <!-- Orders delivered box -->
                        <div class="stats-box">
                            <i class="fas fa-truck"></i>

                            <?php
                            // show($data['$deliveredOrder']);
                            if (isset($deliveredOrder)) {
                                foreach ($deliveredOrder as $delivered_orders) {

                            ?>
                                    <p class="stats-number"><?= $delivered_orders->delivered_count ?></p>


                            <?php
                                }
                            }
                            ?>


                            <p class="stats-text">Orders delivered</p>
                        </div>

                        
                        <!-- Total earnings box -->
                        <div class="stats-box">
                            <i class="fas fa-money-bill"></i>
                          
                            
                            <?php
                            // show($data['$totalEarnings']);
                            if (isset($totalEarnings)) {
                                foreach ($totalEarnings as $total_earnings) {

                            ?>
                                     <p class="stats-number">Rs.<?= $total_earnings->totalCost ?></p>


                            <?php
                                }
                            }
                            ?>

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
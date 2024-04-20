<?php
$role = "Manager";
$data['role'] = $role;
// require_once '../../Components/NavBar/header.php';
// require_once '../../Components/NavBar/NavBar.php';
// require_once '../../Components/NavBar/footer.php';

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);


// show($data);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Deliverers</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/manager/deliverers_view.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-rwsk1BGvQx5JrLHoi9fj7I01Aph5FfAs91nCl4azgazl7HdjL2vF8A1krkYNTl1f" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>


    <div class="home-section">
        <div class="title-profile">

            <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
            <h2 class="section-title">DELIVERERS</h2>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                    <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>  -->
                </div>
            </div>

        </div>

        <?php

            // show($data);
          if (isset($driver)) {
               foreach ($driver as $driver) {
       

          ?>


        <div class="employee-table">
            <div class="table-header">
                <div class="header-item employee-image">
                </div>
                <div class="header-item">Deliverer ID</div>
                <div class="header-item">Name</div>
                <div class="header-item">Rating</div>
                <div class="header-item">Goals Assignment</div>
            </div>

            

            <div class="employee-record">
                <div class="employee-image"><img src="" alt="Deliverer 1"></div>
                <div class="employee-id"><?= $driver->id ?></div>
                <div class="employee-name"><?= $driver->username ?></div>
                <div class="employee-name"><?= $driver->email ?></div>


                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label class="star" for="star5">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label class="star" for="star4">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label class="star" for="star3">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label class="star" for="star2">&#9733;</label>
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label class="star" for="star1">&#9733;</label>
                </div>


                
                <textarea class="goal-assignment" id="pro_complaint" name="pro_complaint"></textarea>
            </div>

            <?php
                }
            }
            ?>
        </div>
        
        <script src="<?= ROOT ?>/assets/js/manager_deliverer.js"></script>

    </div>
</body>
</html>

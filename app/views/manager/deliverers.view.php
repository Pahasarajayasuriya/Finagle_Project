

<?php
$role = "Manager";
$data['role'] = $role;

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);

?>

<!DOCTYPE html>
<html lang="en">

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
    <?php $this->view('includes/emp_topbar', $data); ?>

    <div class="home-section">

    
        <div class="title-profile">
            <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
            <p class="section-title">DELIVERERS<span> DETAILS</span></p>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i> -->
                 </div>
            </div>
        </div>

    <br>
        <div class="employee-table">


            <div class="table-header">
                <div class="header-item employee-image">
                    <!-- <img src="https://cdn-icons-png.flaticon.com/128/64/64572.png" alt="Employee image" class="employee-icon"> -->
                   
                </div>
                <div class="header-item">Deliverer ID</div>
                <div class="header-item">User Name</div>
                <div class="header-item">Email</div>
                <div class="header-item">Branch</div>
            </div>
            <?php
            if (isset($driver)) {
                foreach ($driver as $driver) {

            ?>
                    <div class="employee-record">
                    <div class="employee-image"><img src="<?= ROOT ?>/assets/images/drivers/<?= $driver->image ?>" alt="Employee 1"></div>
                        <div class="employee-id"><?= $driver->id ?></div>
                        <div class="employee-name"><?= $driver->username ?></div>
                        <div class="employee-email"><?= $driver->email ?></div>
                        <div class="employee-name"><?= $driver->branch ?></div>
                    </div>
            <?php
                }
            }
            ?>

        </div>

    </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {


            var navbar = document.querySelector(".navbar");

            window.addEventListener("scroll", function() {
                if (window.scrollY > 0) {
                    navbar.style.backgroundColor = "white";
                } else {
                    navbar.style.backgroundColor = "transparent";
                }
            });
        });
    </script>
</body>

</html>
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
    <title>Branches</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/manager/branch_view.css">
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
            <h2 class="section-title">BRANCHES</h2>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                    <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>  -->
                </div>
            </div>

        </div>

        <div class="branches">
            <?php

            // show($data);
            if (isset($branch)) {
                foreach ($branch as $branch) {
                    // Create a DateTime object from the time string
                    //$open_time = DateTime::createFromFormat('H:i:s.u', $branch->open_time)->format('h:i A');

                    //$close_time = DateTime::createFromFormat('H:i:s.u', $branch->close_time)->format('h:i A');

                    // Format the time as AM/PM with hours and minutes
                     //$formattedTime = $time->format('h:i A');

            ?>

                    <div class="branch-container">

                        <img src="https://lh3.googleusercontent.com/p/AF1QipNFVt_67WFrJbjsHEQfxY691SYz3wxrn1Ioq5KC=s1360-w1360-h1020" alt="branch.name" class="branch-image">
                        <div class="branch-details">
                            <div class="row">
                                <h3 class="branch-title"><?= $branch->name ?></h3>
                                <p class="branch-id">ID: <?= $branch->id ?> </p>
                            </div>
                            <div class="sub-details">
                                <p class="branch-location">
                                    <img src="https://cdn-icons-png.flaticon.com/128/535/535188.png" alt="Location Icon" class="location-icon">
                                    <?= $branch->address ?>
                                </p>
                                <br>

                                <p class="branch-hours">
                                    <img src="https://cdn-icons-png.flaticon.com/128/2838/2838773.png" alt="Clock Icon" class="clock-icon">
                                    Open at <?= $branch->open_time ?> <br>
                                    <img src="https://cdn-icons-png.flaticon.com/128/2838/2838773.png" alt="Clock Icon" class="clock-icon">
                                    Close at <?= $branch->close_time ?>
                                </p>

                            </div>


                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>

    <br><br>
    <div class="logout-button">
        <button>Back</button>
    </div>
    </div>
</body>

</html>
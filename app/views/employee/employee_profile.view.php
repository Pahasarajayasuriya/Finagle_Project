<?php
$role = "Employee";
// require_once '../../Components/NavBar/header.php';
// require_once '../../Components/NavBar/NavBar.php';
// require_once '../../Components/NavBar/footer.php';

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee Profile</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/employee/employee_profile.css">
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
        <h2 class="section-title">BRANCH EMPLOYEES</h2>
        <div class="divider dark mb-4">
            <div class="icon-wrap">
                <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>  -->
            </div>
        </div>
        
     </div>
        
    <div class="sections">
          <div class="profile-table"> 


            <div class="profile-header">
                <div class="pro-image"></div>
                <div class="pro-id"> Username</div>
                <div class="pro-description">Name</div>
                <div class="pro-date">Joined Date</div>
            </div>

            <div class="profile-container">

            <div class="profile-record">
                 <div class="profile-image"> 
                    <img src="https://i.pinimg.com/474x/e0/4c/38/e04c383ed661003b1a599bb877eff836.jpg" alt="Employee 1" >
                 </div>
               
                    <p class='profile-id'>E100</p>
                    <p class='profile-name'>Dilum Induwara</p>
                    <div class="profile-date">18-09-2020</div>
                

                   
            </div>

            <div class="profile-record">
              <div class="profile-image"> 
                     <img src="https://i.pinimg.com/474x/b8/5e/9d/b85e9df9e9b75bcce3a767eb894ef153.jpg" alt="Employee 2">
              </div>
            
                    <p class='profile-id'>E140</p>
                    <p class='profile-name'>Mithun Weerasinghe</p>
                    <div class="profile-date">03-12-2020</div>
              
              
            </div>

            <div class="profile-record">
               <div class="profile-image"> 
                     <img src="https://i.pinimg.com/564x/6b/b6/60/6bb6600e01459e62f16363626ff9d515.jpg" alt="Employee 3" >
               </div>
               
                    <p class='profile-id'>E200</p>
                    <p class='profile-name'>   Dilshan Akalanka</p>
                    <div class="profile-date">08-09-2022</div>
           
               
            </div>
        </div>
        </div>

        <!-- <div class="insights">
                    <div class="goals-container">
                        <h2>Goals</h2>
                       
                        <ul class="white-frame">
                            <li><input type="checkbox" id="goal1" name="goal1"><label for="goal1">Achieve a 99% accuracy rate in order fulfillment</label></li>
                            <li><input type="checkbox" id="goal2" name="goal2"><label for="goal2">Achieve a 95% on-time delivery rate.</label></li>
                            <li><input type="checkbox" id="goal3" name="goal3"><label for="goal3">Increase average order value by 15% through selling </label></li>
                        </ul>

                    </div>

        </div> -->

    </div>

    <div class="logout-button">
            <button><b>Log Out</b></button>
    </div>
</div>
</body>

</html>
<?php
        $role = "Manager";
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
     
    <title>Order history</title> 
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/manager/order_history.css">

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
           <h2 class="section-title">ORDERHISTRY</h2>
           <div class="divider dark mb-4">
               <div class="icon-wrap">
                  <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>  -->
               </div>
           </div>

        </div>

         <div class="search-container">
             <div class="branch_head">
                 <p class="branch_head_1">ORDER<span> HISTORY</span></p>
             </div>

             <form action="#">
                 <div class="form-input">
                     <input type="search" id="search" placeholder="Search...">
                     <button type="submit" class="search-btn">
                         <i class='bx bx-search'></i>
                     </button>
                 </div>
             </form>

         </div>
         <div class="order-list" id="orderList"></div>

         <button class="back-button" id="back-button">Back</button>

         <script>
             document.getElementById("back-button").addEventListener("click", function() {
                 window.location.href = "manager_profile.php"
             });
         </script>

        
        <script src="<?= ROOT ?>/assets/js/manager/order_history.js"></script>
     </div>
 </body>

 </html>
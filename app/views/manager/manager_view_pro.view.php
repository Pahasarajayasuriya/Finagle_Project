<?php
         $role = "Manager";
         $data['role'] = $role;
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
     <title>View Products</title>
     <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/manager/view_products.css">
 </head>

 <body>
     <div class="home-section">
         <div class="search-container">
             <div class="branch_head">
                 <p class="branch_head_1">PROD<span>UCTS</span></p>
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
         <div class="products" id="productList"></div>

         <?php if (!empty($data['rows'])): ?>
        <?php foreach ($rows as $row): ?>

         <button class="back-button" id="back-button">Back</button>

         <script>
             document.getElementById("back-button").addEventListener("click", function() {
                 window.location.href = "manager_profile.php"
             });
         </script>

         <script src="<?= ROOT ?>/assets/js/manager/view_products.js"></script>

         <?php endforeach; ?>
    <?php else: ?>
        <p>No product found.</p>
    <?php endif; ?>
    
     </div>
 </body>

 </html>
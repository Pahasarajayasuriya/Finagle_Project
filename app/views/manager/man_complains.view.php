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
     <title>View Complaints</title>
     <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/manager/view_complains.css">
 </head>

 <body>
     <div class="home-section">
         <div class="search-container">
             <div class="branch_head">
                 <p class="branch_head_1">CUSTOMER<span> COMPLAINTS</span></p>
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
         <div class="complaint-list" id="complaintList">   
    <?php if (!empty($data['rows'])): ?>
        <?php foreach ($rows as $row): ?>
            <div class="complaint">
                <h4 class="order-id">Complaint ID: <?= esc($row->id) ?></h4>

                <div class="order-details">
                    <p class="topic">CUSTOMER NAME</p>
                    <h4><?= esc($row->name) ?></h4>

                    <p class="topic">COMPLAINT</p>
                    <h4><?= esc($row->complaint) ?></h4>

                    <p class="topic">TELEPHONE NUMBER</p>
                    <h4><?= esc($row->teleno) ?></h4>

                    <p class="topic">Email</p>
                    <h4><?= esc($row->email) ?></h4>
                </div>

                <div class="button-container">
                    <button class="response-button" onclick="redirectToResponsePage()">Response</button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No complaints found.</p>
    <?php endif; ?>
</div>



         <button class="back-button" id="back-button">Back</button>

         <script>
             document.getElementById("back-button").addEventListener("click", function() {
                 window.location.href = "manager_profile.php"
             });
         </script>

        
        <script src="<?= ROOT ?>/assets/js/manager/view_complainsj.js"></script>
     </div>
 </body>

 </html>
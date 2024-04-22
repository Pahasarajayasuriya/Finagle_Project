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
     <title>Employee Details</title>
     <link rel="stylesheet" href="<?= ROOT ?>/assets/css/manager/view_employee.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezDI7Ff3qRfBBZ2eHtL8eR7uh1lVC06fD0BiPfVkK40XAxC+bVti1IvDHti/E80R" crossorigin="anonymous">

 </head>

 <body>
 <div class="home-section">
     <div class="branch_head">
         <p class="branch_head_1">EMPLOYEE<span> DETAILS</span></p>
     </div>

     <div class="employee-table">

     <?php

        //   show($data);
          if (isset($employee)) {
               foreach ($employee as $employee) {
       
          ?>

         <div class="table-header">
             <div class="header-item employee-image">
                <!-- <img src="https://cdn-icons-png.flaticon.com/128/64/64572.png" alt="Employee image" class="employee-icon"> -->
            </div> 
             <div class="header-item">Employee ID</div>
             <div class="header-item">User Name</div>
             <div class="header-item">Goals Assignment</div>
         </div>

         <div class="employee-record">
             <div class="employee-image"><img src="https://i.pinimg.com/474x/12/75/40/127540404fd8f8b0e423a8e599245701.jpg" alt="Employee 1"></div>
             <div class="employee-id"><?= $employee->id ?></div>
             <div class="employee-name"><?= $employee->username ?></div>
             <textarea class="goal-assignment" id="pro_complaint" name="pro_complaint"></textarea>
         </div>

         <!--<div class="employee-record">
             <div class="employee-image"><img src="https://i.pinimg.com/474x/9f/09/38/9f09388dcd0de53f806a8685ef39a6a8.jpg" alt="Employee 1"></div>
             <div class="employee-id">EMP002</div>
             <div class="employee-name">Jane Smith</div>
             <textarea class="goal-assignment" id="pro_complaint" name="pro_complaint"></textarea>
         
            
         </div>
         <div class="employee-record">
             <div class="employee-image"><img src="https://i.pinimg.com/564x/e4/c5/9f/e4c59fdbb41ccd0f87dc0be871d91d98.jpg" alt="Employee 1"></div>
             <div class="employee-id">EMP003</div>
             <div class="employee-name">Amur Sulthan</div>
             <textarea class="goal-assignment" id="pro_complaint" name="pro_complaint"></textarea>
         
            
         </div> -->


         

         <?php
                }
            }
            ?>

        </div>
         
     </div>
 </div>
 </body>

 </html>
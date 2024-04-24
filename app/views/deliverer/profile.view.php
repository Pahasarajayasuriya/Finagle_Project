<?php
$role = "Deliverer";
//require_once 'E:/Flutter Package/xampp/htdocs/Latest FrontEnd/header.php';
//require_once 'E:/Flutter Package/xampp/htdocs/Latest FrontEnd/NavBar.php';
//require_once 'E:/Flutter Package/xampp/htdocs/Latest FrontEnd/footer.php';

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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/del_profile.css">
</head>

<body>
    <div class="home-section">
        <div class="pro_container">
            
            <div class="pro_card">
              <div class="pro_head">
               <p class="pro_head_1">YOUR  <span> ACCOUNT</span></p>
              </div>
           
                <p class="pro_details"><strong>Username:</strong> pahasara01</p>
                <p class="pro_details"><strong>Name:</strong> Pahasara</p>
                <p class="pro_details"><strong>E-mail:</strong> pahasara@mail.com</p>
                <p class="pro_details"><strong>Phone No:</strong> 0772815328</p>
                <p class="pro_details"><strong>Goals:</strong> Deliver all the orders within 30 minutes</p>
                <br>
                
                <!-- <form action="edit_profile.php">
                    <button type="submit" class="pro_btn">Edit Your Profile</button>
                </form>  -->
            </div>
        </div>
    </div>
</body>

</html>
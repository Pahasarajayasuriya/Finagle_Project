<?php
$role = "User";
// require_once '../includes/header.view.php';
// require_once '../views/includes/NavBar.view.php';
// require_once '../views/includes/footer.view.php';
$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   <title> Profile - <?= APPNAME ?> </title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/cus_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php if(!empty($row)):?>
<div class="home-section">
 <div class="pro_container">
   <input type="checkbox" id="switch">
  <div class="pro_outer">
    <div class="pro_content">
      <label for="switch">
        <span class="pro_toggle">
          <span class="pro_circle"></span>
        </span>
      </label>
      <div class="pro_details">
        <div class="pro_name">Your Account</div>
        <div class="pro_buttons">
            <p class="pro_details"><strong>Username: </strong><?=esc($row->username)?></p>
            <p class="pro_details"><strong>E-mail: </strong><?=esc($row->email)?></p>
            <p class="pro_details"><strong>Phone No: </strong><?=esc($row->teleno)?></p>
        </div>
      </div>
  </div>
 </div>
</div>
</div>
<?php else:?>
  <h1>&emsp;&emsp;&emsp;&emsp;&emsp;The profile was not found!</h1>
<?php endif;?>
</body>
</html>
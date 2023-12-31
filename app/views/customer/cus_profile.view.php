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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
  <!--Fonts-->


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


</head>

<body>
  <?php
  // require_once '../../Components/NavBar/Footer/cus_footer.php';
  $this->view('includes/cus_topbar', $data);
  ?>

  <?php if (!empty($row)) : ?>
    <div class="home-section">

      <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
      <h2 class="section-title">YOUR ACCOUNT</h2>
      <div class="divider dark mb-4">
        <div class="icon-wrap">
          <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i> -->
        </div>
      </div>
      <div class="pro_container">
        <div class="pro_outer">
          <div class="pro_content">
            <!-- <div class="pro_avatar_container">
                         <img src="<?= esc($row->avatar) ?>" alt="Profile Image"> 
                        <img src="https://i.pinimg.com/474x/93/b0/fb/93b0fb91379b2d660cb741a7b51b829c.jpg" alt="Profile Image">
                        <a class="change_avatar" href="#">Change Avatar</a>
                    </div> -->

            <div class="pro_buttons">
              <div class="profile-detail">
                <div class="pro_details"><strong>USERNAME : </strong></div>
                <div class="user-detail"><?= esc($row->username) ?></div>
                <br><br>

              </div>
              <div class="profile-detail">
                <div class="pro_details"><strong>E-MAIL : </strong></div>
                <div class="user-detail"><?= esc($row->email) ?></div>


              </div>
              <br><br>
              <div class="profile-detail">
                <div class="pro_details"><strong>CONTACT NO. : </strong></div>
                <div class="user-detail"><?= esc($row->teleno) ?></div>


              </div>

            </div>



          </div>
        </div>
      </div>
    </div>

  <?php else : ?>
    <h1>&emsp;&emsp;&emsp;&emsp;&emsp;The profile was not found!</h1>
  <?php endif; ?>

  <!-- 

<?php if (!empty($row)) : ?>
<div class="home-section">
 <div class="pro_container">
  <div class="pro_outer">
    <div class="pro_content">
      <div class="pro_details">
        <div class="pro_name">Your Account</div>

        <div class="pro_buttons">
            <p class="pro_details"><strong>Username: </strong><?= esc($row->username) ?></p>
            <p class="pro_details"><strong>E-mail: </strong><?= esc($row->email) ?></p>
            <p class="pro_details"><strong>Phone No: </strong><?= esc($row->teleno) ?></p>
        </div>
      </div>
  </div>
 </div>
</div>
</div>
<?php else : ?>
  <h1>&emsp;&emsp;&emsp;&emsp;&emsp;The profile was not found!</h1>
<?php endif; ?> -->

</body>

</html>
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager Profile</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/manager/view_profile.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


</head>

<body>
  <div class="home-section">

       <?php $this->view('includes/emp_topbar', $data); ?>


        <div class="title-profile">
            <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i>
            <p class="section-title">YOUR<span> PROFILE</span></p>
            <div class="divider dark mb-4">
                <div class="icon-wrap">
                <!-- <i class="fas fa-bread-slice fa-3x text-primary mb-4"></i> -->
                 </div>
            </div>
        </div>


    <div class="pro_container">

      <?php if (!empty($data['rows'])) : ?>
        <?php foreach ($rows as $row) : ?>

          <form action="view_profile.php" method="POST">
            <div class="pro_form-group">
              <div class="avatar-container">
                <div class="username">
                  <h3>Hi, <?= esc($row->username) ?></h3>
                </div>
                 <img src=' <?= ROOT ?>/assets/images/Emp_profiles/<?= $row->image ?>'>
                <!-- <img src="<?= esc($row->image) ?>" alt="Profile Image"> -->
              </div>
            </div>
          </form>


          <div class="personal-info-section">
            <h2 class="pro_font">Personal Information</h2><br>
            <div class="pro_card">
              <form action="view_profile.php" method="POST">
                <div class="pro_form-group">
                  <div class="pro_inline">
                    <div class="pro_name">
                      <label class="pro_label" for="pro_username">Username</label>
                      <div class="pro_input" id="pro_username" name="pro_username"><?= esc($row->username) ?></div>
                    </div>
                  </div>

                </div>


                <div class="pro_form-group">
                  <div class="pro_inline">
                    <div class="pro_name">
                      <label class="pro_label" for="pro_email">Email</label>
                      <div class="pro_input" id="pro_email" name="pro_email"><?= esc($row->email) ?></div>
                    </div>
                    <div class="pro_name">
                      <label class="pro_label" for="pro_phone">Phone No</label>
                      <div class="pro_input" id="pro_phone" name="pro_phone"><?= esc($row->teleno) ?></div>
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div>

        <?php endforeach; ?>
      <?php else : ?>
        <p>Profile not found.</p>
      <?php endif; ?>


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
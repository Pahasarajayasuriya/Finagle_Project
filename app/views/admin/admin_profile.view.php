<?php
$role = "Admin";
$data['role'] = $role;
//require_once '../../Components/NavBar/header.php';
//require_once '../../Components/NavBar/NavBar.php';
//require_once '../../Components/NavBar/footer.php';

$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>Admin Profile</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/admin_profile.css">
  <script src="script.js" defer></script>
</head>

<body>
  <div class="home-section">

    <div class="pro_container">

  <?php if (!empty($data['rows'])): ?>
    <?php foreach ($rows as $row): ?>  
     
      <form action="view_profile.php" method="POST">
        <div class="pro_form-group">
          <div class="avatar-container">
            <div class="username">
              
              <h4><?= esc($row->username) ?></h4>
            </div>

            
          </div>

        </div>
      </form>


      <div class="personal-info-section">
        <h2 class="pro_font">Personal Information</h2>
        <div class="pro_card">
          <form action="<?= ROOT?>./admin_profile" method="POST">

            <div class="pro_form-group">
              <div class="pro_inline">
                <div class="pro_name">
                  <label class="pro_label" for="pro_username">Username</label>
                  <input class="pro_input" type="text" id="pro_username" name="username" value=<?= esc($row->username) ?>>
                </div>

                <div class="pro_name">
                  <label class="pro_label" for="pro_name">Email</label>
                  <input class="pro_input" type="text" id="pro_name" name="email" value=<?= esc($row->email) ?>>
                </div>

              </div>

            </div>


            <div class="pro_form-group">
              <div class="pro_inline">
                <div class="pro_name">
                  <label class="pro_label" for="pro_email">New Password</label>
                  <input class="pro_input" type="email" id="pro_email" name="password" >
                </div>
                <div class="pro_name">
                  <label class="pro_label" for="pro_phone">Retype New Password</label>
                  <input class="pro_input" type="text" id="pro_phone" name="re_password" >
                </div>
              </div>
            </div>

            <input type="hidden" name="id" value=<?= esc($row->id) ?>>

            <div class="button-container">
              <button type="submit" class="submit-button">Submit</button>
            </div>

          </form>
        </div>
      </div>

    <?php endforeach; ?>
    <?php else: ?>
        <p>Profile not found.</p>
    <?php endif; ?>


    </div>
  </div>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/cus_topbar.css">
</head>

<body>
<div class="navbar">
        <div class="logo_icon">
            <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
        </div>
        <div class="navbar-links">
            <div class="user-buttons">
                <?php if (!Auth::logged_in()) : ?>
                    <a class="signup" href="<?= ROOT ?>/signup">Signup</a>
                    <a class="login" href="<?= ROOT ?>/login">Login</a>
                <?php else : ?>
                    <div class="user_navbar">
                        <div class="dropdown">
                            <button class="dropbtn">Hi, <?= Auth::getUsername() ?>
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                                <a href="<?= ROOT ?>/cus_profile">Profile</a>
                                <a href="<?= ROOT ?>/cus_edit_profile">Edit Profile</a>
                                <a href="<?= ROOT ?>/Logout">Logout</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</body>
</html>
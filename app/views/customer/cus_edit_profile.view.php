<?php
$role = "User";
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
    <meta name="viewport" content="width=device-width">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/cus_edit_profile.css">
</head>

<body>
<div class="home-section">
        <div class="pro_container">
            <h1 class="pro_font">
                Edit Profile
            </h1>
            <div class="pro_card">
                <form  method="post">
                    <div class="pro_form-group">
                        <label class="pro_name" for="pro_username">Username</label>
                        <input class="pro_input" type="text" id="username" name="username" value="<?=set_value('username',$row->username)?>">
                    </div>
                    <div class="pro_form-group">
                        <label class="pro_name" for="pro_email">E-mail</label>
                        <input class="pro_input" type="email" id="email" name="email" value="<?=set_value('email',$row->email)?>">
                    </div>
                    <div class="pro_form-group">
                        <label class="pro_name" for="pro_phone">Phone No</label>
                        <input class="pro_input" type="text" id="teleno" name="teleno" value="<?=set_value('teleno',$row->teleno)?>">
                    </div>
                    <div class="pro_form-group">
                        <label class="pro_name" for="pro_address">Address</label>
                        <input class="pro_input" type="text" id="pro_address" name="address" value="<?=set_value('address',$row->address)?>">
                    </div>
                    <div class="pro_form-group">
                        <label class="pro_name" for="pro_phone">Current Password</label>
                        <input class="pro_input" type="password" id="pro_phone" name="password">
                    </div>
                    <div class="pro_form-group">
                        <label class="pro_name" for="pro_phone">New Password</label>
                        <input class="pro_input" type="password" id="pro_phone" name="newpassword">
                    </div>
                    <div class="pro_form-group">
                        <label class="pro_name" for="pro_phone">Re-enter Password</label>
                        <input class="pro_input" type="password" id="pro_phone" name="renewpassword">
                    </div>
                    
                    <div class="pro_button">
                        <p>&emsp;</p>
                        <a href="<?=ROOT?>/home">
                            <button type="button" class="pro_btn">Back</button></a>
                        <p>&emsp;</p>
                        <a href="<?=ROOT?>/home">
                            <button type="submit" class="pro_btn">Save Changes</button></a>

                    </div>
                </form>
            </div>
        </div>
</div>
</body>

</html>

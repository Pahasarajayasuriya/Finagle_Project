<?php
$role = "User";
$data['role'] = $role;
$this->view('includes/header', $data);
$this->view('includes/NavBar', $data);
$this->view('includes/footer', $data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Complains</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/complaint.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/boxicons/2.0.7/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>


<body>
    <div class="home-section">
        <div class="pro_container">
            <div class="com_head">

                <p class="com_head_1">COMPL<span>AINTS</span></p>
            </div>

            <div class="pro_card">
                <form action="<?= ROOT ?>/complaint" method="POST">
                    <div class="pro_inline">
                        <label class="pro_name" for="pro_username">Enter Your Name</label>
                        <input class="pro_input" type="text" id="pro_name" name="name" value="<?= Auth::is_customer() ? Auth::getName() : '' ?>" required>
                        <?php if (!empty($errors['name'])) : ?>
                            <div class="invalid"><?= $errors['name'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="pro_inline">
                        <label class="pro_name" for="pro_phoneno">Enter Your Phone Number</label>
                        <input class="pro_input" type="text" id="pro_phoneno" name="teleno" value="<?= Auth::is_customer() ? Auth::getTeleno() : '' ?>" required>
                        <?php if (!empty($errors['teleno'])) : ?>
                            <div class="invalid"><?= $errors['teleno'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="pro_inline">
                        <label class="pro_name" for="pro_comemail">Enter Your E-mail</label>
                        <input class="pro_input" type="email" id="pro_comemail" name="email" value="<?= Auth::is_customer() ? Auth::getEmail() : '' ?>" required>
                        <?php if (!empty($errors['email'])) : ?>
                            <div class="invalid"><?= $errors['email'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="pro_inline">
                        <label class="pro_name" for="pro_complaint">Enter Your Complaint</label>
                        <textarea class="pro_input" id="pro_complaint" name="complaint" required><?= set_value('complaint') ?></textarea>
                        <?php if (!empty($errors['complaint'])) : ?>
                            <div class="invalid"><?= $errors['complaint'] ?></div>
                        <?php endif; ?>
                    </div>


                    <div class="pro_button">
                        <p>&emsp;</p>

                        <button type="submit" class="pro_btn">Submit</button>

                    </div>
                </form>
            </div>
        </div>
        <?php $this->view('includes/cus_footer', $data); ?>
    </div>
</body>

</html>

<?php
$this->view('includes/cus_topbar', $data);
?>
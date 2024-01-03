<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Finagle Lanka(PVT) Ltd</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup.css">
    <!---we had linked our css file----->
</head>

<body>

    <section>
        <form method="post">
            <h1>Register</h1>
            <div class="inputbox">
                <ion-icon name=""></ion-icon>
                <input value="<?= set_value('username') ?>" type="text" name="username" id="username" required>
                <label for="">Username </label>

                <?php if (!empty($errors['username'])) : ?>
                    <div class="invalid"><?= $errors['username'] ?></div>
                <?php endif; ?>
            </div>
            <div class="inputbox">
                <ion-icon name=""></ion-icon>
                <input value="<?= set_value('email') ?>" type="email" name="email" id="name" required>
                <label for="">Your Email </label>

                <?php if (!empty($errors['email'])) : ?>
                    <div class="invalid"><?= $errors['email'] ?></div>
                <?php endif; ?>
            </div>
            <div class="inputbox">
                <ion-icon name=""></ion-icon>
                <input value="<?= set_value('password') ?>" type="password" name="password" id="password" required>
                <label for="">Create Password</label>

                <?php if (!empty($errors['password'])) : ?>
                    <div class="invalid"><?= $errors['password'] ?></div>
                <?php endif; ?>
            </div>
            <div class="inputbox">
                <ion-icon name=""></ion-icon>
                <input value="<?= set_value('repassword') ?>" type="password" name="repassword" id="repassword" required>
                <label for="">Confirm Password</label>

                <?php if (!empty($errors['password'])) : ?>
                    <div class="invalid"><?= $errors['password'] ?></div>
                <?php endif; ?>
            </div>
            <div class="inputbox">
                <ion-icon name=""></ion-icon>
                <input value="<?= set_value('teleno') ?>" type="phoneno." name="teleno" id="teleno" required>
                <label for="">Contact Number </label>

                <?php if (!empty($errors['teleno'])) : ?>
                    <div class="invalid"><?= $errors['teleno'] ?></div>
                <?php endif; ?>
            </div>

            <button>Sign Up</button>
            <div class="register">
                <p>Already have an account? <a href="<?= ROOT ?>/login">Sign In</a></p>
            </div>
        </form>
    </section>
</body>

</html>



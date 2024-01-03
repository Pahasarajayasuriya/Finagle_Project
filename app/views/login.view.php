<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Finagle Lanka(PVT) Ltd</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/login.css">
    <!---we had linked our css file----->
</head>

<body>
    <section>
        <form method="post">
            <h1>Login</h1>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input value="<?= set_value('email')?>" name="email" type="email" required1>
                <label for="">Email </label>

                <?php if (!empty($errors['email'])) : ?>
                    <div class="invalid"><?= $errors['email'] ?></div>
                <?php endif; ?>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input value="<?= set_value('password')?>" name="password" type="password" required1>
                <label for="">Password</label>
            </div>
            <div class="forget">
                <label for=""><input type="checkbox">Remember Me</label>
                <a href="#">Forget Password</a>
            </div>

            <?php if (message()) : ?>
                <div class="loginmsg"><?= message('', true) ?></div>
            <?php endif; ?>


            <button>Log in</button>
            <div class="register">
                <p>Don't have a account <a href="<?= ROOT ?>/signup">Register</a></p>
            </div>
        </form>
    </section>
</body>

</html>

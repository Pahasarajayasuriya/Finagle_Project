<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-rwsk1BGvQx5JrLHoi9fj7I01Aph5FfAs91nCl4azgazl7HdjL2vF8A1krkYNTl1f" crossorigin="anonymous"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>Reset Password</title>
</head>

<body>
    <div class="login_container">
        <div class="image_container">
            <img src="https://i.pinimg.com/564x/e5/e2/3a/e5e23aa6ee2fbcfac5e5e183183a2dde.jpg" width="420px" height="100%" alt="Login Image">
        </div>
        <div class="form-container">
            <section>
                <form method="post">
                    <h1>Reset Password</h1>
                        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                        <div class="inputbox">
                            <i class="fas fa-lock"></i>
                            <input value="<?= set_value('password') ?>" type="password" name="password" id="password" placeholder="New Password">
                            <?php if (!empty($errors['password'])) : ?>
                                <div class="invalid"><?= $errors['password'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="inputbox">
                            <i class="fas fa-lock"></i>
                            <input value="<?= set_value('repassword') ?>" type="password" name="repassword" id="repassword" placeholder="Confirm Password">
                            <?php if (!empty($errors['password'])) : ?>
                                <div class="invalid"><?= $errors['password'] ?></div>
                            <?php endif; ?>
                            </div>
                    <button name="send" id="send">Send</button>
                </form>
            </section>
        </div>
    </div>

</body>


</html>
<!DOCTYPE html>
<html lang="en">

<?php

// use Infobip\Configuration;
// use Infobip\Api\SmsApi;
// use Infobip\Model\SmsDestination;
// use Infobip\Model\SmsTextualMessage;
// use Infobip\Model\SmsAdvancedTextualRequest;

// require __DIR__ . '/../../vendor/autoload.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sendotp'])) {
//     $number = "+94" . $_POST['teleno'];
//     $name = $_POST['username'];
//     $otp = mt_rand(100000, 999999);
//     setcookie("otp", $otp);
//     $message = "Hey " . $name . ", Your OTP is " . $otp;

//     $baseUrl = 'dk6m5l.api.infobip.com';
//     $apiKey = '041f721ec5960fc5e9234eb5e99a15e8-cbc0ce26-5198-421d-9d16-6097956576d8';

//     $configuration = new Configuration(host: $baseUrl, apiKey: $apiKey);
//     $api = new SmsApi(config: $configuration);
//     $destination = new SmsDestination(to: $number);
//     $message = new SmsTextualMessage(
//         destinations: [$destination],
//         text: $message,
//         from: "Finagle"
//     );
//     $request = new SmsAdvancedTextualRequest(
//         messages: [$message]
//     );
//     $response = $api->sendSmsMessage($request);
//     header("Location: " . ROOT . "/otp");
//     exit;
// }

// if (isset($_POST['ver'])) {
//     $verotp = $_POST['otp'];
//     if ($verotp == $_COOKIE['otp']) {
//         echo ("OTP verified successfully");
//     } else {
//         echo ("Invalid OTP");
//     }
// }
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-rwsk1BGvQx5JrLHoi9fj7I01Aph5FfAs91nCl4azgazl7HdjL2vF8A1krkYNTl1f" crossorigin="anonymous"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>SignUp</title>
</head>

<body>
    <div class="set1" id="set1">
        <div class="login_container">
            <div class="image_container">
                <img src="https://i.pinimg.com/564x/e5/e2/3a/e5e23aa6ee2fbcfac5e5e183183a2dde.jpg" width="420px" height="100%" alt="Login Image">
            </div>
            <div class="form-container">
                <section>
                    <form method="post">
                        <h1>Register</h1>

                        <div class="inputbox">
                            <i class="fas fa-user"></i>
                            <input value="<?= set_value('username') ?>" type="text" name="username" id="username" placeholder="Username" required>


                            <?php if (!empty($errors['username'])) : ?>
                                <div class="invalid"><?= $errors['username'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="inputbox">
                            <i class="fas fa-envelope"></i>
                            <input value="<?= set_value('email') ?>" type="email" name="email" id="name" placeholder="Email" required>

                            <?php if (!empty($errors['email'])) : ?>
                                <div class="invalid"><?= $errors['email'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="inputbox">
                            <i class="fas fa-phone"></i>
                            <input value="<?= set_value('teleno') ?>" type="phoneno." name="teleno" id="teleno" placeholder="Contact Number" required>

                            <?php if (!empty($errors['teleno'])) : ?>
                                <div class="invalid"><?= $errors['teleno'] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="inputbox">
                            <i class="fas fa-lock"></i>
                            <input value="<?= set_value('password') ?>" type="password" name="password" id="password" placeholder="Create Password">
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
                        <button name="sendotp">Send OTP</button>
                        <div class="register">
                            <p>Already have an account? <a href="<?= ROOT ?>/login">Sign In</a></p>
                        </div>
            </div>
            </form>
            </section>
        </div>
    </div>
    <div class="set2" id="set2" style="display: none;">
        <div class="login_container">
            <div class="image_container">
                <img src="https://i.pinimg.com/564x/e5/e2/3a/e5e23aa6ee2fbcfac5e5e183183a2dde.jpg" width="420px" height="100%" alt="Login Image">
            </div>
            <div class="form-container">
                <section>
                    <form method="post">
                        <h1>Register</h1>
                        <div class="inputbox">
                            <i class="fas fa-lock"></i>
                            <input type="text" name="otp" id="otp" placeholder="Verify OTP" required>
                        </div>
                        <button name="ver">Verify</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script>
        // Get references to the set 1 and set 2 sections
        const set1 = document.getElementById('set1');
        const set2 = document.getElementById('set2');

        // Get reference to the "Send OTP" button
        const sendOtpButton = document.querySelector('button[name="sendotp"]');

        // Add event listener to the "Send OTP" button
        sendOtpButton.addEventListener('click', function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            // Hide set 1 and display set 2
            set1.style.display = 'none';
            set2.style.display = 'block';
        });
    </script>

</body>

</html>
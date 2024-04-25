<?php
class Signup extends Controller
{
    public function index()
    {
        $data['errors'] = [];
        $user = new User();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST['role'] = 'customer';

            // Check if the form is submitted with the intention of sending OTP
            if (isset($_POST['sendotp'])) {
                // Validate user input
                if ($user->validate($_POST)) {
                    $_POST['role'] = 'customer';
                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    require __DIR__ . '/../../vendor/autoload.php';

                    // Generate OTP
                    $number = "+94" . $_POST['teleno'];
                    $name = $_POST['username'];
                    $otp = mt_rand(100000, 999999);
                    setcookie("otp", $otp);

                    // Send OTP via Infobip SMS API
                    $baseUrl = 'y3gglg.api.infobip.com';
                    $apiKey = 'ddddb288e7f9487f802e22ed0224fd22-305ecbf6-f2b7-4034-9fce-ae1db598ae83';
                    $configuration = new Infobip\Configuration(host: $baseUrl, apiKey: $apiKey);
                    $api = new Infobip\Api\SmsApi(config: $configuration);
                    $destination = new Infobip\Model\SmsDestination(to: $number);
                    $message = new Infobip\Model\SmsTextualMessage(
                        destinations: [$destination],
                        text: "Hey $name, Your OTP is $otp",
                        from: "Finagle"
                    );
                    $request = new Infobip\Model\SmsAdvancedTextualRequest(messages: [$message]);
                    $response = $api->sendSmsMessage($request);
					$_SESSION['signup_data'] = $_POST;
					$_SESSION['otp'] = $otp;
                    // Redirect to OTP verification page
					$_SESSION['otp_sent'] = true;
                    redirect('otp');
                }
            }
        }

        $data['errors'] = $user->errors;
        $data['title'] = "Signup";

        $this->view('signup', $data);
    }
}

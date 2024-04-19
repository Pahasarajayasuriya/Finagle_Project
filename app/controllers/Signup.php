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
                    $baseUrl = '6glnnd.api.infobip.com';
                    $apiKey = '48aec9f721e803db63f659fc3c34b046-a8406dfc-7c8e-4452-9ef9-19152170386c';
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

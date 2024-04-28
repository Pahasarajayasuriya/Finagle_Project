<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require __DIR__ . '/../../vendor/phpmailer/src/PHPMailer.php';
// require __DIR__ . '/../../vendor/phpmailer/src/SMTP.php';
// require __DIR__ . '/../../vendor/phpmailer/src/Exception.php';

require __DIR__ . '/../../vendor/autoload.php';

class ForgotPassword extends Controller
{
    public function index()
    {
        $message = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $forgotPasswordModel = new ForgotPasswordModel();
            $result = $forgotPasswordModel->generateResetToken($email);
            // var_dump($result);
            $phpmailer = new PHPMailer(true);
            try {
                // Server settings
                $phpmailer->isSMTP();
                $phpmailer->Host = "smtp.gmail.com";
                $phpmailer->SMTPSecure = 'ssl';
                $phpmailer->SMTPAuth = true;
                $phpmailer->Port = 465;
                $phpmailer->Username = 'finaglelankapvt@gmail.com';
                $phpmailer->Password = 'fgrhniuuyyglbxhf';
                $phpmailer->isHtml(true);

                // Email content
                $phpmailer->setFrom('2021cs087@stu.ucsc.cmb.ac.lk', 'Finagle Lanka');
                $phpmailer->addAddress($email);
                $phpmailer->Subject = 'Reset Password';
                $resetLink = ROOT . '/send_password?token=' . $result;
                $phpmailer->Body = "Click <a href=\"$resetLink\">here</a> to reset your password.";
                $phpmailer->send();

                $message = "Please check your email.";
            } catch (Exception $e) {
                $message = "Message could not be sent. Please try again later.";
            }
        }

        if (!empty($_GET['message'])) {
            $message = urldecode($_GET['message']);
        }

        $data['title'] = "Forgot password";
        $data['message'] = $message;
        $this->view('forgotpassword', $data);
    }
}

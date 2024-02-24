<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


class ForgotPassword extends Controller
{
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $forgotPasswordModel = new ForgotPasswordModel();
            $result = $forgotPasswordModel->generateResetToken($email);
                    $phpmailer = new PHPMailer(true);
                    try {
                        // Server settings
                        $phpmailer->isSMTP();
                        $phpmailer->Host = "smtp.gmail.com";
                        $phpmailer->SMTPSecure = 'ssl';
                        $phpmailer->SMTPAuth = true;
                        $phpmailer->Port = 465;
                        $phpmailer->Username = '2021cs087@stu.ucsc.cmb.ac.lk';
                        $phpmailer->Password = 'soevefjawduuahin';
                        $phpmailer->isHtml(true);


                        // Email content
                        $phpmailer->setFrom('2021cs087@stu.ucsc.cmb.ac.lk', 'Finagle Lanka');
                        $phpmailer->addAddress($email);
                        $phpmailer->Subject = 'Reset Password';
                        $phpmailer->Body = <<<END
    Click <a href="http://example.com/reset-password.php?token=$result">here</a> to reset your password.
END;
                        $phpmailer->send();
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
                    }
        }


        $data['title'] = "Forgot password";
        $this->view('forgotpassword', $data);
    }
}

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require __DIR__ . '/../../vendor/phpmailer/src/PHPMailer.php';
// require __DIR__ . '/../../vendor/phpmailer/src/SMTP.php';
// require __DIR__ . '/../../vendor/phpmailer/src/Exception.php';

require __DIR__ . '/../../vendor/autoload.php';
class Man_complains extends Controller
{
    public function index()
    {
        $complaint = new ComplaintModel;
        $data['rows'] = $complaint->all();

        $this->view('manager/man_complains', $data);
    }

    public function sendEmail()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $email = $data['email'];
        $response = $data['response'];
show($email);
show($response);
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
            $phpmailer->Subject = 'Response to your complaint';
            $phpmailer->Body = $response;
            $phpmailer->send();

            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['success' => false]);
        }
    }
}

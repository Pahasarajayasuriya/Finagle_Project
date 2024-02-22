<?php

class Send_password extends Controller
{
    public function index()
    {
        $data['title'] = "Send password";
        $this->view('send_password', $data);
    }
    // public function generateResetToken()
    // {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $email = $_POST["email"];

    //         $userModel = new ForgotPassword();
    //         $userModel->generateResetToken($email);

    //         echo "Reset token generated successfully.";
    //     } else {
    //         echo "Invalid request method.";
    //     }
    // }
}

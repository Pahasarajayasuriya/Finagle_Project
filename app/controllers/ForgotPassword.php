<?php

class ForgotPassword extends Controller
{
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $forgotPasswordModel = new ForgotPasswordModel();
            $forgotPasswordModel->generateResetToken($email);
        }
        $data['title'] = "Forgot password";
        $this->view('forgotpassword', $data);
    }
}

<?php
class Send_password extends Controller
{
    public function index()
    {
        $token = isset($_GET["token"]) ? $_GET["token"] : null;

        if ($token === null) {
            die("Token not found");
        }

        $send_password_model = new Send_passwordModel();

        // Check if token is valid
        $tokenValidationMessage = $send_password_model->isTokenExpired($token);
        if ($tokenValidationMessage !== null) {
            die($tokenValidationMessage);
        }

        // Continue with controller logic
        $data['title'] = "Send password";
        $this->view('send_password', $data);
    }
}



<?php

class Send_password extends Controller
{
    public function index() {

        $data['errors'] = [];
        $send_password_model = new Send_passwordModel();
        $token = isset($_GET["token"]) ? $_GET["token"] : null;

        if ($token === null) {
            die("Token not found");
        }

        // Check if token is valid
        $tokenValidationMessage = $send_password_model->isTokenExpired($token);
        if ($tokenValidationMessage !== null) {
            die($tokenValidationMessage);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($send_password_model->validate($_POST)) {
                $user = $send_password_model->getUserByResetToken($token);
                if ($user) {
                    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $success = $send_password_model->updatePasswordAndToken($password_hash, $user["id"]);
                    if ($success) {
                        redirect('login');
                    } else {
                        die("Password update failed");
                    }
                } else {
                    die("User not found for the provided token");
                }
            } else {
                $data['errors'] = $send_password_model->errors;
            }
        }

        $data['title'] = "Send password";
        $this->view('send_password', $data);
    }
}

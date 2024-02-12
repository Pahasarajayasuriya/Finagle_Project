<?php

class Otp extends Controller
{
    public function index()
    {
        $user = new User();
  
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ver'])) {
            $verotp = $_POST['otp'];
            if ($verotp == $_COOKIE['otp']) {
    

                if ($user->validate($_COOKIE)) {
                    $_COOKIE['role'] = 'customer';
                    $_COOKIE['password'] = password_hash($_COOKIE['password'], PASSWORD_DEFAULT);
                    $user->insert($_COOKIE);
                    $successMessage = '<div style="color: #008000;">Your profile was successfully created!</div>';
                    message("$successMessage");
                    redirect('login');
                }
            } else {
     
                echo "Invalid OTP";
            }
        } 
        
            $data['title'] = "OTP";
            $this->view('otp', $data);
    }
}

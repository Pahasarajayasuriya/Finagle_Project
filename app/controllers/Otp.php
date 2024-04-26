<?php
class Otp extends Controller
{
    public function index()
    {
        $data['title'] = "OTP";

        // Retrieve validated user input data from session
        $signup_data = $_SESSION['signup_data'] ?? [];

        // Check if OTP is submitted
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ver'])) {
            $verotp = $_POST['otp'];
            if ($verotp == $_SESSION['otp']) {
                // OTP verification successful, proceed with registration
                $user = new User();
                $_POST['password'] = password_hash($signup_data['password'], PASSWORD_DEFAULT); // Use the password from stored data
                $user->insert($signup_data); // Insert stored user input data
                // $successMessage = '<div id="success-message" style="color: #008000;">Your account was successfully created!</div>';
                // message($successMessage);
                // $_SESSION['user_id'] = $user->getLastInsertId();
                // Fetch the newly created user's data
                $newUser = $user->first(['email' => $signup_data['email']]);
                // Authenticate the new user
                Auth::authenticate($newUser);
                redirect('home');
            } else {
                // Invalid OTP
                $data['errors']['otp'] = 'Invalid OTP'; // Set error message
                $this->view('otp', $data); // Render the OTP verification form with error message
                return;
            }
        }

        // Display OTP verification form
        $this->view('otp', $data);
    }
}

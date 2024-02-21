<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
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
                $successMessage = '<div id="success-message" style="color: #008000;">Your account was successfully created!</div>';
                message($successMessage);
                redirect('login');
            } else {
                // Invalid OTP
                $invalidMessage = '<div id="invalid-message" style="color: #FF0000;">Invalid OTP</div>';
                message($invalidMessage);
                $this->view('otp', $data);
                return;
            }
        }

        // Display OTP verification form
        $this->view('otp', $data);
    }
}
?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var successMessage = document.getElementById('success-message');
            var invalidMessage = document.getElementById('invalid-message');

            // Hide the success message after 4 seconds
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 4000);
            }

            // Hide the invalid message after 4 seconds
            if (invalidMessage) {
                setTimeout(function() {
                    invalidMessage.style.display = 'none';
                }, 4000);
            }
        });
    </script>
</body>

</html>
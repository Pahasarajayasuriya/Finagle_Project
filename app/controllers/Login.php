<?php 
class Login extends Controller
{
    public function index()
    {
        $data['errors'] = [];
        $data['title'] = "Login";
        $user = new User();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $row = $user->first([
                'email' => $_POST['email']
            ]);
            if ($row) {
                show(password_verify($_POST['password'], $row->password));

                if (password_verify($_POST['password'], $row->password)) {
                    // Authenticate
                    Auth::authenticate($row);

                    // Remember me functionality
                    if (isset($_POST['remember'])) {
                        $email = trim($_POST['email']);
                        $remember = $_POST['remember'];
                        $_SESSION['email'] = $email;
                        setcookie("remember_email", $email, time() + 3600 * 24 * 5);
                        setcookie("remember", $remember, time() + 3600 * 24 * 5);
                    } else {
                        setcookie("remember_email", "", time() - 36000);
                        setcookie("remember", "", time() - 3600);
                    }

                    // Redirect based on user role
                    if (Auth::is_admin()) {
                        redirect("Admin_products");
                    } elseif (Auth::is_customer()) {
                        redirect("home");
                    } elseif (Auth::is_employee()) {
                        redirect("emp_profile");
                    } elseif (Auth::is_manager()) {
                        redirect("manager_profile");
                    } elseif (Auth::is_deliverer()) {
                        redirect("deliverer_profile");
                    } else {
                        redirect("login");
                    }
                }
            }

            $data['errors']['email'] = "Wrong email or password";
        }

        $this->view('login', $data);
    }
}

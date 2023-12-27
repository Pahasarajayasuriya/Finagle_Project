<?php

class Cus_edit_profile extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $user = new User();
        $data['row'] = $row = $user->first(['id' => $id]);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
            // Check if the new password and re-entered password are provided
            $newPassword = $_POST['newpassword'] ?? '';
            $confirmPassword = $_POST['renewpassword'] ?? '';

            if (!empty($newPassword)) {
                // Check if the current password is correct
                $currentPassword = $_POST['password'] ?? '';

                if (!password_verify($currentPassword, $row->password)) {
                    // If the current password is incorrect, display an error
                    echo '<div style="color: #d9534f; background-color: #f2dede; border: 1px solid #ebccd1; padding: 10px; margin: 10px 0; border-radius: 4px;">Incorrect current password. Please try again.</div>';
                    return;
                }

                // Check if the new password and re-entered password are equal
                if ($newPassword !== $confirmPassword) {
                    // If the passwords don't match, display an error
                    echo '<div style="color: #d9534f; background-color: #f2dede; border: 1px solid #ebccd1; padding: 10px; margin: 10px 0; border-radius: 4px;">New password and confirm password do not match. Please try again.</div>';
                    return;
                }

                // Update the password with the new hashed password
                $_POST['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
            } else {
                // If new password is empty, unset it to keep the existing password
                unset($_POST['password']);
            }

            // Update other user information
            $user->update($id, $_POST);
            redirect('cus_profile/' . $id);
        }

        $data['title'] = "Edit Profile";
        $this->view('customer/cus_edit_profile', $data);
    }
}

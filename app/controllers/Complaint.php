<?php

class Complaint extends Controller
{
    public function index()
    {
        $data['errors'] = [];

        $complaintModel = new ComplaintModel();
        $user = new User();
        $userdata = $user->all();

        // Check if a session is already active
        if (session_status() == PHP_SESSION_NONE) {
            // If not, start a new session
            session_start();
        }

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatedData = $complaintModel->validate($_POST);
            if ($validatedData) {
                $complaintModel->insert($validatedData);

                // Store the success message in the session
                $_SESSION['complaint_submitted'] = true;

                // Redirect to clear the POST data
                redirect("home");
            }
        }

        // Check if there is a success message in the session
        if (isset($_SESSION['successMessage'])) {
            $data['successMessage'] = $_SESSION['successMessage'];
            // Remove the success message from the session to show it only once
            unset($_SESSION['successMessage']);
        }

        // Close the session
        session_write_close();
        $data['userdata'] = $userdata;
        // show($userdata);
        $data['errors'] = $complaintModel->errors;
        $data['title'] = "Complaint";
        $this->view('customer/complaint', $data);
    }
}

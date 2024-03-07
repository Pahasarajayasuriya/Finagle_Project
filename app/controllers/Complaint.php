<?php

class Complaint extends Controller
{
    public function index()
    {
        $data['errors'] = [];

        $complaintModel = new ComplaintModel();
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatedData = $complaintModel->validate($_POST);
            if ($validatedData) {
                $complaintModel->insert($validatedData);

                // Encode the success message in the URL
                $successMessage = urlencode("Complaint submitted successfully!");

                // Redirect to clear the POST data and include the success message
                redirect("complaint?success=$successMessage");
            }
        }

        // Check if there is a success message in the URL
        if (!empty($_GET['success'])) {
            $data['successMessage'] = urldecode($_GET['success']);
        }
        $data['errors'] = $complaintModel->errors;
        $data['title'] = "Complaint";
        $this->view('customer/complaint', $data);
    }
}

<?php

class Complaint extends Controller
{
    public function index()
    {
        $data['title'] = "Complaint";
      

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $complaintModel = new ComplaintModel();
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

        $this->view('customer/complaint', $data);
    }
}

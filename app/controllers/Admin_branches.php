<?php

class Admin_branches extends Controller
{
    public function index()
    {

        $admin_branch_model = new admin_branchesModel();
        $data['rows'] = $admin_branch_model->get_all();
        // show($data);
        $data['errors'] = [];
        // show($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate and sanitize input data
            $validatedData = $admin_branch_model->validate($_POST);

            // show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    // Insert the product into the database
                    $admin_branch_model->insert($_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_branches');
                } else {
                    // Handle image upload failure

                    echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_branch_model->errors;

            // }
        }

        $data['title'] = "admin_branch";
        $this->view('admin/admin_branches', $data);

    }

    public function delete_branch($id)
    {
        $admin_branch_model = new admin_branchModel();
        $admin_branch_model->delete_branch($id);
        redirect('admin_branches');
    }
}
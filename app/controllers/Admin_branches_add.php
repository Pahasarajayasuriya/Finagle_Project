<?php

class Admin_branches_add extends Controller
{
    public function index()
    {

        $admin_branch_model = new admin_branchesModel();
        $data['rows'] = $admin_branch_model->get_all();
        //show($data);
        $data['errors'] = [];
        //show($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            // Validate and sanitize input data
            $validatedData = $admin_branch_model->validate($_POST);

            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    $_POST['latitude'] = floatval($_POST['latitude']);
                    $_POST['longitude'] = floatval($_POST['longitude']);
                    // Insert the product into the database
                    $admin_branch_model->insert($_POST);
                    //show($_POST);
                    // Redirect to avoid form resubmission
                    redirect('admin_branches');
            }else {
                // Handle validation errors
                $data['errors'] = $admin_branch_model->errors;

            }
        }

        if (!empty($data['errors'])){
            //$param['id']=$id;
            //$data['rows'] = $admin_branch_model->get_all();
            //$data['errors']['teleno']="hello";
            //show($data['errors']);
            $this->view('admin/admin_branches_add',$data);
        }

        else{
            //show($data['errors']);
            $data['title'] = "admin_branch";
            $this->view('admin/admin_branches_add', $data);
        };

    }

}
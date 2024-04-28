<?php

class Admin_branches extends Controller
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
                // show($_POST);
                $admin_branch_model->insert($_POST);

                // Redirect to avoid form resubmission
                redirect('admin_branches');
            }
        } else {
            // Handle validation errors
            $data['errors'] = $admin_branch_model->errors;

            // }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Validate and sanitize input data
            $validatedData = $admin_branch_model->validate($_POST);
            //show($data);
            //show($validatedData);
            if ($validatedData) {
                //show($_POST);
                $id = $_POST['id'];
                unset($_POST['id']);
                unset($_POST['update']);
                show($_POST);
                // UPdate the DB
                $admin_branch_model->update($id, $_POST);

                // Redirect to avoid form resubmission
                redirect('admin_branches');
            } else {
                // Handle image upload failure

                // echo "Image Upload Failed.";
            }
        } else {
            // Handle validation errors
            $data['errors'] = $admin_branch_model->errors;

            // }
        }

        $data['title'] = "admin_branch";
        $this->view('admin/admin_branches', $data);
    }

    public function delete_branch($name)
    {
        $admin_branch_model = new admin_branchesModel();
        $admin_branch_model->del_branch($name);
        redirect('admin_branches');
    }

    public function update_branch($id)
    {
        $param['id'] = $id;
        $admin_branch_model = new admin_branchesModel();
        $data['rows'] = $admin_branch_model->get_all();
        // show($data) row is an array;
        $data['row'] = $admin_branch_model->where($param);
        $data['errors'] = [];
        $this->view('admin/admin_branches_update', $data);
    }
}

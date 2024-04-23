<?php

class Admin_managers extends Controller
{
    public function index()
    {

        $admin_manager_model = new admin_managersModel();
        $data['rows'] = $admin_manager_model->get_all();
        //show($data);
        $data['errors'] = [];
        //show($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            // Validate and sanitize input data
            $validatedData = $admin_manager_model->validate($_POST);

            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    // Insert the product into the database
                    $admin_manager_model->insert($_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_managers');
                } else {
                    // Handle image upload failure

                    //echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_manager_model->errors;

            // }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Validate and sanitize input data
            $validatedData = $admin_manager_model->validate($_POST);
            //show($data);
            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    $id=$_POST['id'];
                    unset($_POST['id']);
                    unset($_POST['update']);
                    show($_POST);
                    // UPdate the DB
                    $admin_manager_model->update($id,$_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_managers');
                } else {
                    // Handle image upload failure

                    echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_manager_model->errors;

            // }
        }

        $data['title'] = "admin_manager";
        $this->view('admin/admin_managers', $data);

    }

    public function delete_manager($id)
    {
        $admin_manager_model = new admin_managersModel();
        $admin_manager_model->del_manager($id);
        redirect('admin_managers');
    }

    public function update_manager($id)
    {
        $param['id']=$id;
        $admin_manager_model = new admin_managersModel();
        $data['rows'] = $admin_manager_model->get_all();
        // show($data) row is an array;
        $data['row']=$admin_manager_model->where($param);
        $data['errors'] = [];
        $this->view('admin/admin_managers_update',$data);

    }
}
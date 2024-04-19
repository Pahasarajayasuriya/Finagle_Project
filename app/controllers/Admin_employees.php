<?php

class Admin_employees extends Controller
{
    public function index()
    {

        $admin_employee_model = new admin_employeesModel();
        $data['rows'] = $admin_employee_model->get_all();
        //show($data);
        $data['errors'] = [];
        //show($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            // Validate and sanitize input data
            $validatedData = $admin_employee_model->validate($_POST);

            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    // Insert the product into the database
                    $admin_employee_model->insert($_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_employees');
                } else {
                    // Handle image upload failure

                    //echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_employee_model->errors;

            // }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Validate and sanitize input data
            $validatedData = $admin_employee_model->validate($_POST);
            //show($data);
            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    $id=$_POST['id'];
                    unset($_POST['id']);
                    unset($_POST['update']);
                    show($_POST);
                    // UPdate the DB
                    $admin_employee_model->update($id,$_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_employees');
                } else {
                    // Handle image upload failure

                    echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_employee_model->errors;

            // }
        }

        $data['title'] = "admin_employee";
        $this->view('admin/admin_employees', $data);

    }

    public function delete_branch($id)
    {
        $admin_employee_model = new admin_employeesModel();
        $admin_employee_model->del_branch($id);
        redirect('admin_employees');
    }

    public function update_branch($id)
    {
        $param['id']=$id;
        $admin_employee_model = new admin_employeesModel();
        $data['rows'] = $admin_employee_model->get_all();
        // show($data) row is an array;
        $data['row']=$admin_employee_model->where($param);
        $data['errors'] = [];
        $this->view('admin/admin_employees_update',$data);

    }
}
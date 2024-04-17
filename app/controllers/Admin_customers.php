<?php

class Admin_customers extends Controller
{
    public function index()
    {

        $admin_customer_model = new admin_customersModel();
        $data['rows'] = $admin_customer_model->get_all();
        //show($data);
        $data['errors'] = [];
        //show($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            // Validate and sanitize input data
            $validatedData = $admin_customer_model->validate($_POST);

            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    // Insert the product into the database
                    $admin_customer_model->insert($_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_customers');
                } else {
                    // Handle image upload failure

                    //echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_customer_model->errors;

            // }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Validate and sanitize input data
            $validatedData = $admin_customer_model->validate($_POST);
            //show($data);
            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    $id=$_POST['id'];
                    unset($_POST['id']);
                    unset($_POST['update']);
                    show($_POST);
                    // UPdate the DB
                    $admin_customer_model->update($id,$_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_customers');
                } else {
                    // Handle image upload failure

                    echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_customer_model->errors;

            // }
        }

        $data['title'] = "admin_customer";
        $this->view('admin/admin_customers', $data);

    }

    public function delete_branch($id)
    {
        $admin_customer_model = new admin_customersModel();
        $admin_customer_model->del_branch($id);
        redirect('admin_customers');
    }

    public function update_branch($id)
    {
        $param['id']=$id;
        $admin_customer_model = new admin_customersModel();
        $data['rows'] = $admin_customer_model->get_all();
        // show($data) row is an array;
        $data['row']=$admin_customer_model->where($param);
        $data['errors'] = [];
        $this->view('admin/admin_customers_update',$data);

    }
}
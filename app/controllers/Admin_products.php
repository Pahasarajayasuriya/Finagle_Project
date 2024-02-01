<?php

class Admin_products extends Controller
{
    public function index()
    {

        $admin_product_model = new admin_productsModel();
        $data['rows'] = $admin_product_model->get_all();
        //show($data);
        $data['errors'] = [];
        //show($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            // Validate and sanitize input data
            $validatedData = $admin_product_model->validate($_POST);

            show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    // Insert the product into the database
                    $admin_product_model->insert($_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_products');
                } else {
                    // Handle image upload failure

                    echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_product_model->errors;

            // }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Validate and sanitize input data
            $validatedData = $admin_product_model->validate($_POST);
            //show($data);
            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    $id=$_POST['id'];
                    unset($_POST['id']);
                    unset($_POST['update']);
                    show($_POST);
                    // UPdate the DB
                    $admin_product_model->update($id,$_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_products');
                } else {
                    // Handle image upload failure

                    //echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_product_model->errors;

            // }
        }

        $data['title'] = "admin_products";
        $this->view('admin/admin_products', $data);

    }

    public function delete_product($id)
    {
        $admin_product_model = new admin_productsModel();
        $admin_product_model->del_product($id);
        redirect('admin_products');
    }

    public function update_product($id)
    {
        //get the ID and call the view which have UI to update the datas and that view will send a post request to index function
        $param['id']=$id;
        $admin_product_model = new admin_productsModel();
        $data['rows'] = $admin_product_model->get_all();
        // show($data) row is an array;
        $data['row']=$admin_product_model->where($param);
        $data['errors'] = [];
        $this->view('admin/admin_products_update',$data);

    }
}
<?php

class Admin_products_add extends Controller
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

            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    // Insert the product into the database
                    $admin_product_model->insert($_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_products');
            }else {
                // Handle validation errors
                $data['errors'] = $admin_product_model->errors;

            }
        }

        if (!empty($data['errors'])){
            //$param['id']=$id;
            //$data['rows'] = $admin_product_model->get_all();
            //$data['errors']['teleno']="hello";
            //show($data['errors']);
            $this->view('admin/admin_products_add',$data);
        }

        else{
            //show($data['errors']);
            $data['title'] = "admin_product";
            $this->view('admin/admin_products_add', $data);
        };

    }

}
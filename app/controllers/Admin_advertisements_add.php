<?php

class Admin_advertisements_add extends Controller
{
    public function index()
    {

        $admin_advertisement_model = new admin_advertisementsModel();
        $data['rows'] = $admin_advertisement_model->get_all();
        //show($data);
        $data['errors'] = [];
        //show($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            // Validate and sanitize input data
            $validatedData = $admin_advertisement_model->validate($_POST);

            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    // Insert the product into the database
                    $admin_advertisement_model->insert($_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_advertisements');
            }else {
                // Handle validation errors
                $data['errors'] = $admin_advertisement_model->errors;

            }
        }

        if (!empty($data['errors'])){
            //$param['id']=$id;
            //$data['rows'] = $admin_advertisement_model->get_all();
            //$data['errors']['teleno']="hello";
            //show($data['errors']);
            $this->view('admin/admin_advertisements_add',$data);
        }

        else{
            //show($data['errors']);
            $data['title'] = "admin_advertisement";
            $this->view('admin/admin_advertisements_add', $data);
        };

    }

}
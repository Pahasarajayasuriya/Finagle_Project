<?php

class Admin_advertisements extends Controller
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
                    show($_FILES['image']);
                    die;
                    //$admin_advertisement_model->insert($_POST);

                    // Redirect to avoid form resubmission
                    //redirect('admin_advertisements');
                } else {
                    // Handle image upload failure

                    echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_advertisement_model->errors;

            // }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Validate and sanitize input data
            $validatedData = $admin_advertisement_model->validate($_POST);
            //show($data);
            //show($validatedData);
            if ($validatedData) {
                    //show($_POST);
                    $id=$_POST['id'];
                    unset($_POST['id']);
                    unset($_POST['update']);
                    show($_POST);
                    // UPdate the DB
                    $admin_advertisement_model->update($id,$_POST);

                    // Redirect to avoid form resubmission
                    redirect('admin_advertisements');
                } else {
                    // Handle image upload failure

                    //echo "Image Upload Failed.";
                }
            } else {
                // Handle validation errors
                $data['errors'] = $admin_advertisement_model->errors;

            // }
        }

        $data['title'] = "admin_advertisements";
        $this->view('admin/admin_advertisements', $data);

    }

    public function delete_advertisement($id)
    {
        $admin_advertisement_model = new admin_advertisementsModel();
        $admin_advertisement_model->del_advertisement($id);
        redirect('admin_advertisements');
    }

    public function update_advertisement($id)
    {
        //get the ID and call the view which have UI to update the datas and that view will send a post request to index function
        $param['id']=$id;
        $admin_advertisement_model = new admin_advertisementsModel();
        $data['rows'] = $admin_advertisement_model->get_all();
        // show($data) row is an array;
        $data['row']=$admin_advertisement_model->where($param);
        $data['errors'] = [];
        $this->view('admin/admin_advertisements_update',$data);

    }
}